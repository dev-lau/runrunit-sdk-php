<?php

namespace Devlau\Runrunit;

use Psr\Http\Message\ResponseInterface;
use Devlau\Runrunit\Exceptions\NotFoundException;
use Devlau\Runrunit\Exceptions\ValidationException;
use Devlau\Runrunit\Exceptions\FailedActionException;
use Devlau\Runrunit\Exceptions\RateLimitException;

/**
 * Class MakesHttpRequests.
 *
 * @property \GuzzleHttp\Client $guzzle
 */
trait MakesHttpRequests
{
    /**
     * Make a GET request to Runrunit and return the response.
     *
     * @param  string $uri
     * @param array $payload
     *
     * @throws \Devlau\Runrunit\Exceptions\FailedActionException
     * @throws \Devlau\Runrunit\Exceptions\NotFoundException
     * @throws \Devlau\Runrunit\Exceptions\ValidationException
     *
     * @return mixed
     */
    public function get($uri, $payload = [])
    {
        return $this->request('GET', $uri, $payload);
    }

    /**
     * Make a POST request to Runrunit and return the response.
     *
     * @param  string $uri
     * @param  array $payload
     *
     * @throws \Devlau\Runrunit\Exceptions\FailedActionException
     * @throws \Devlau\Runrunit\Exceptions\NotFoundException
     * @throws \Devlau\Runrunit\Exceptions\ValidationException
     *
     * @return mixed
     */
    public function post($uri, array $payload = [])
    {
        return $this->request('POST', $uri, $payload);
    }

    /**
     * Make a PUT request to Runrunit and return the response.
     *
     * @param  string $uri
     * @param  array $payload
     *
     * @throws \Devlau\Runrunit\Exceptions\FailedActionException
     * @throws \Devlau\Runrunit\Exceptions\NotFoundException
     * @throws \Devlau\Runrunit\Exceptions\ValidationException
     *
     * @return mixed
     */
    public function put($uri, array $payload = [])
    {
        return $this->request('PUT', $uri, $payload);
    }

    /**
     * Make a DELETE request to Runrunit and return the response.
     *
     * @param  string $uri
     * @param  array $payload
     *
     * @throws \Devlau\Runrunit\Exceptions\FailedActionException
     * @throws \Devlau\Runrunit\Exceptions\NotFoundException
     * @throws \Devlau\Runrunit\Exceptions\ValidationException
     *
     * @return mixed
     */
    public function delete($uri, array $payload = [])
    {
        return $this->request('DELETE', $uri, $payload);
    }

    /**
     * Make request to Runrunit and return the response.
     *
     * @param  string $verb
     * @param  string $uri
     * @param  array $payload
     *
     * @throws \Devlau\Runrunit\Exceptions\FailedActionException
     * @throws \Devlau\Runrunit\Exceptions\NotFoundException
     * @throws \Devlau\Runrunit\Exceptions\ValidationException
     *
     * @return mixed
     */
    public function request($verb, $uri, array $payload = [])
    {
        $rawResponse = false;

        if (isset($payload['rawResponse'])) {
            $rawResponse = true;
            unset($payload['rawResponse']);
        }

        $response = $this->guzzle->request(
            $verb,
            $uri,
            $payload
        );

        if ($response->getStatusCode() >= 400) {
            return $this->handleRequestError($response);
        }

        if ($rawResponse) return $response;

        $responseBody = (string) $response->getBody();
        $decodedResponse = json_decode($responseBody, true);

        return json_last_error() === JSON_ERROR_NONE
            ? $decodedResponse
            : $responseBody;
    }

    /**
     * @param  \Psr\Http\Message\ResponseInterface $response
     *
     * @throws \Devlau\Runrunit\Exceptions\ValidationException
     * @throws \Devlau\Runrunit\Exceptions\NotFoundException
     * @throws \Devlau\Runrunit\Exceptions\FailedActionException
     * @throws \Exception
     *
     * @return void
     */
    private function handleRequestError(ResponseInterface $response)
    {
        $code = $response->getStatusCode();

        if ($response->getStatusCode() == 422) {
            throw new ValidationException(json_decode((string) $response->getBody(), true), $code);
        }

        if ($response->getStatusCode() == 429) {
            $remaining = $response->getHeader('RateLimit-Remaining');
            $reset = $response->getHeader('RateLimit-Reset');

            throw new RateLimitException(
                is_array($remaining) ? current($remaining) : 0,
                is_array($reset) ? current($reset) : 'unknown',
                $code
            );
        }

        if ($response->getStatusCode() == 404) {
            throw new NotFoundException($code);
        }

        if ($response->getStatusCode() == 400) {
            throw new FailedActionException((string) $response->getBody(), $code);
        }

        throw new \Exception((string) $response->getBody(), $code);
    }
}
