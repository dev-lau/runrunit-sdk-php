<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\Client;
use Devlau\Runrunit\Resources\ProjectGroup;
use Devlau\Runrunit\Resources\ProjectSubGroup;

trait ManagesClients
{
    /**
     * Get all clients.
     *
     * @return array
     */
    public function clients(array $query = null)
    {
        return $this->transformCollection(
            $this->get('clients', ['query' => $query]),
            Client::class
        );
    }

    /**
     * Find client by id.
     *
     * @param  int  $id
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
     * @param  mixed  $payload The name of the client or array with data
     * @return Client
     */
    public function createClient($payload)
    {
        if (!is_array($payload)) {
            $data = [
                'budgeted_cost_month' => 0.0,
                'budgeted_hours_month' => 0,
                'is_visible' => true,
                'name' => $payload,
            ];
        } else {
            $data = $payload;
        }

        $client = $this->post('clients', [
            'json' => [
                'client' => $data,
            ],
        ]);

        return new Client($client, $this);
    }

    /**
     * Updates a client.
     *
     * @param  mixed  $payload The name of the client or array with data
     * @return Client
     */
    public function updateClient($id, $payload)
    {
        if (!is_array($payload)) {
            $data = [
                'name' => $payload,
            ];
        } else {
            $data = $payload;
        }

        $client = $this->put("clients/{$id}", [
            'json' => [
                'client' => $data,
            ],
        ]);

        return new Client($client, $this);
    }

    public function deleteClient($id): bool
    {
        $this->delete("clients/{$id}");

        return true;
    }

    public function projectGroups($clientId, array $query = null)
    {
        $users = $this->transformCollection(
            $this->get("clients/{$clientId}/project_groups", ['query' => $query]),
            ProjectGroup::class
        );

        return $users;
    }

    public function projectSubGroups($clientId, array $query = null)
    {
        $users = $this->transformCollection(
            $this->get("clients/{$clientId}/project_sub_groups", ['query' => $query]),
            ProjectSubGroup::class
        );

        return $users;
    }
}
