<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\Client;

trait ManagesClients
{
    /**
     * Get all clients.
     *
     * @return array
     */
    public function clients()
    {
        return $this->transformCollection(
            $this->get('clients'),
            Client::class
        );
    }

    /**
     * Find client by id.
     *
     * @param int $id
     *
     * @return Client
     */
    public function client($id)
    {
        $client = $this->get("clients/{$id}");

        return new Client($client, $this);
    }

    /**
     * Create new client.
     *
     * @param mixed $payload The name of the client or array with data
     *
     * @return Client
     */
    public function createClient($payload)
    {
        if (!is_array($payload)) {
            $data = [
                "budgeted_cost_month" => 0.0,
                "budgeted_hours_month" => 0,
                "is_visible" => true,
                "name" => $payload,
            ];
        } else {
            $data = $payload;
        }

        $client = $this->post('clients', [
            'json' => [
                'client' => $data
            ]
        ]);

        return new Client($client, $this);
    }
}
