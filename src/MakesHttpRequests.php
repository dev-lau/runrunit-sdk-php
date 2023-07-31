<?php

namespace Devlau\Runrunit;

use Devlau\Runrunit\Exceptions\FailedActionException;
use Devlau\Runrunit\Exceptions\InternalServerException;
use Devlau\Runrunit\Exceptions\NotFoundException;
use Devlau\Runrunit\Exceptions\RateLimitException;
use Devlau\Runrunit\Exceptions\UnauthorizedException;
use Devlau\Runrunit\Exceptions\ValidationException;
use Psr\Http\Message\ResponseInterface;

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
     * @param  string  $uri
     * @param  array  $payload
     * @return mixed
     *
     * @throws \Devlau\Runrunit\Exceptions\FailedActionException
     * @throws \Devlau\Runrunit\Exceptions\NotFoundException
     * @throws \Devlau\Runrunit\Exceptions\ValidationException
     */
    public function get($uri, $payload = [])
    {
        return $this->request('GET', $uri, $payload);
    }

    /**
     * Make a POST request to Runrunit and return the response.
     *
     * @param  string  $uri
     * @return mixed
     *
     * @throws \Devlau\Runrunit\Exceptions\FailedActionException
     * @throws \Devlau\Runrunit\Exceptions\NotFoundException
     * @throws \Devlau\Runrunit\Exceptions\ValidationException
     */
    public function post($uri, array $payload = [])
    {
        return $this->request('POST', $uri, $payload);
    }

    /**
     * Make a PUT request to Runrunit and return the response.
     *
     * @param  string  $uri
     * @return mixed
     *
     * @throws \Devlau\Runrunit\Exceptions\FailedActionException
     * @throws \Devlau\Runrunit\Exceptions\NotFoundException
     * @throws \Devlau\Runrunit\Exceptions\ValidationException
     */
    public function put($uri, array $payload = [])
    {
        return $this->request('PUT', $uri, $payload);
    }

    /**
     * Make a DELETE request to Runrunit and return the response.
     *
     * @param  string  $uri
     * @return mixed
     *
     * @throws \Devlau\Runrunit\Exceptions\FailedActionException
     * @throws \Devlau\Runrunit\Exceptions\NotFoundException
     * @throws \Devlau\Runrunit\Exceptions\ValidationException
     */
    public function delete($uri, array $payload = [])
    {
        return $this->request('DELETE', $uri, $payload);
    }

    /**
     * Make request to Runrunit and return the response.
     *
     * @param  string  $verb
     * @param  string  $uri
     * @return mixed
     *
     * @throws \Devlau\Runrunit\Exceptions\FailedActionException
     * @throws \Devlau\Runrunit\Exceptions\NotFoundException
     * @throws \Devlau\Runrunit\Exceptions\ValidationException
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

        if ($rawResponse) {
            return $response;
        }

        $responseBody = (string) $response->getBody();
        $decodedResponse = json_decode($responseBody, true);

        return json_last_error() === JSON_ERROR_NONE
            ? $decodedResponse
            : $responseBody;
    }

    /**
     * @return void
     *
     * @throws \Devlau\Runrunit\Exceptions\ValidationException
     * @throws \Devlau\Runrunit\Exceptions\NotFoundException
     * @throws \Devlau\Runrunit\Exceptions\FailedActionException
     * @throws \Exception
     */
    private function handleRequestError(ResponseInterface $response)
    {
        $code = $response->getStatusCode();

        if ($code >= 500) {
            throw new InternalServerException((string) $response->getBody(), $code);
        }

        if ($code == 422) {
            throw new ValidationException(json_decode((string) $response->getBody(), true), $code);
        }

        if ($code == 429) {
            $remaining = $response->getHeader('RateLimit-Remaining');
            $reset = $response->getHeader('RateLimit-Reset');

            throw new RateLimitException(
                is_array($remaining) ? current($remaining) : 0,
                is_array($reset) ? current($reset) : 'unknown',
                $code
            );
        }

        if ($code == 404) {
            throw new NotFoundException($code);
        }

        if ($code == 401) {
            throw new UnauthorizedException((string) $response->getBody(), $code);
        }

        if ($code == 400) {
            throw new FailedActionException((string) $response->getBody(), $code);
        }

        throw new \Exception((string) $response->getBody(), $code);
    }
}
