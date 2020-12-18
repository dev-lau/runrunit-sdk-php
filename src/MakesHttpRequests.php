<?php

namespace Devlau\Runrunit;

use Psr\Http\Message\ResponseInterface;
use Devlau\Runrunit\Exceptions\NotFoundException;
use Devlau\Runrunit\Exceptions\ValidationException;
use Devlau\Runrunit\Exceptions\FailedActionException;

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
    private function get($uri, $payload = [])
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
    private function post($uri, array $payload = [])
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
    private function put($uri, array $payload = [])
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
    private function delete($uri, array $payload = [])
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
    private function request($verb, $uri, array $payload = [])
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

        return json_decode($responseBody, true) ?: $responseBody;
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
        if ($response->getStatusCode() == 422) {
            throw new ValidationException(json_decode((string) $response->getBody(), true));
        }

        if ($response->getStatusCode() == 404) {
            throw new NotFoundException();
        }

        if ($response->getStatusCode() == 400) {
            throw new FailedActionException((string) $response->getBody());
        }

        throw new \Exception((string) $response->getBody());
    }
}
