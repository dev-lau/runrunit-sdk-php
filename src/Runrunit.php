<?php

namespace Devlau\Runrunit;

use Devlau\Runrunit\Actions\ManagesBoards;
use Devlau\Runrunit\Actions\ManagesClients;
use Devlau\Runrunit\Actions\ManagesComments;
use Devlau\Runrunit\Actions\ManagesDocuments;
use Devlau\Runrunit\Actions\ManagesProjects;
use Devlau\Runrunit\Actions\ManagesReports;
use Devlau\Runrunit\Actions\ManagesTasks;
use Devlau\Runrunit\Actions\ManagesTaskStatus;
use Devlau\Runrunit\Actions\ManagesTaskTypes;
use Devlau\Runrunit\Actions\ManagesUsers;
use GuzzleHttp\Client as HttpClient;

class Runrunit
{
    use MakesHttpRequests,
        ManagesBoards,
        ManagesClients,
        ManagesComments,
        ManagesDocuments,
        ManagesProjects,
        ManagesReports,
        ManagesTasks,
        ManagesTaskStatus,
        ManagesTaskTypes,
        ManagesUsers;

    /**
     * The Runrunit base url.
     *
     * @var string
     */
    protected $baseUrl = "https://runrun.it/api";

    /**
     * @var string Versão da API
     */
    protected $version = "v1.0";

    /**
     * @var string App Key
     */
    protected $appKey;

    /**
     * @var string User Token
     */
    protected $userToken;

    /**
     * The Guzzle HTTP Client instance.
     *
     * @var \GuzzleHttp\Client
     */
    public $guzzle;

    /**
     * Create a new Runrunit instance.
     *
     * @param string $appKey
     * @param string $userToken
     * @param \GuzzleHttp\Client $guzzle
     */
    public function __construct($appKey, $userToken, HttpClient $guzzle = null)
    {
        $this->appKey = $appKey;
        $this->userToken = $userToken;

        $this->setHttpClient($appKey, $userToken, $guzzle);
    }

    /**
     * Get the complete base uri
     *
     * @return string
     */
    public function getBaseUri()
    {
        return "{$this->baseUrl}/{$this->version}";
    }

    /**
     * Setup the http client
     *
     * @param string $appKey
     * @param string $userToken
     * @param \GuzzleHttp\Client $guzzle
     */
    public function setHttpClient($appKey, $userToken, HttpClient $guzzle = null): void
    {
        $this->guzzle = $guzzle ?: new HttpClient([
            'base_uri' => $this->getBaseUri(),
            'http_errors' => false,
            'allow_redirects' => false,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'App-Key' => $appKey,
                'User-Token' => $userToken,
            ],
        ]);
    }

    /**
     * @param string $userToken
     */
    public function setUserToken($userToken): void
    {
        $this->userToken = $userToken;

        $this->setHttpClient($this->appKey, $this->userToken, $this->guzzle);
    }

    public function getUserToken(): string
    {
        return $this->userToken;
    }

    /**
     * @param string $appKey
     */
    public function setAppKey($appKey): void
    {
        $this->appKey = $appKey;

        $this->setHttpClient($this->appKey, $this->userToken, $this->guzzle);
    }

    public function getAppKey(): string
    {
        return $this->appKey;
    }

    /**
     * Transform the items of the collection to the given class.
     *
     * @param  array $collection
     * @param  string $class
     * @param  string $key
     * @param  array $extraData
     *
     * @return array
     */
    protected function transformCollection($collection, $class, $key = '', $extraData = [])
    {
        return array_map(function ($data) use ($class, $extraData) {
            return new $class($data + $extraData, $this);
        }, $collection[$key] ?? $collection);
    }
}
