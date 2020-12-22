<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\User;

trait ManagesUsers
{
    /**
     * Get all users.
     *
     * @return array
     */
    public function users(array $query = null)
    {
        return $this->transformCollection(
            $this->get('users', ['query' => $query]),
            User::class
        );
    }

    /**
     * Find user by id.
     *
     * @param int $id
     *
     * @return User
     */
    public function user($id)
    {
        $user = $this->get("users/{$id}");

        return new User($user, $this);
    }

    /**
     * Create new user.
     *
     * @param array $data
     * @param boolean $makeMyPartner Flag to make the new user a partner of the creating user
     * @param boolean $makeEverybodyMutualPartners Flag to make the new user a mutual partner of everybody in enterprise
     *
     * @return User
     */
    public function createUser(array $data, $makeMyPartner = null, $makeEverybodyMutualPartners = null)
    {
        $user = $this->post('users', [
            'json' => [
                'user' => $data,
                'make_my_partner' => $makeMyPartner,
                'make_everybody_mutual_partners' => $makeEverybodyMutualPartners,
            ]
        ]);

        return new User($user, $this);
    }

    /**
     * Update a user.
     *
     * @param string $id User's ID
     * @param mixed $payload The name of the user or array with data
     *
     * @return User
     */
    public function updateUser($id, $payload)
    {
        $data = !is_array($payload) ? ['name' => $payload] : $payload;

        $user = $this->put("users/{$id}", [
            'json' => [
                'user' => $data,
            ]
        ]);

        return new User($user, $this);
    }
}
