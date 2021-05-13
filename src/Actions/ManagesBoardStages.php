<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\TaskStatus;

trait ManagesBoardStages
{
    /**
     * Get all board stages.
     *
     * @return array
     */
    public function boardStages($id, array $query = null)
    {
        return $this->transformCollection(
            $this->get("boards/{$id}/stages", ['query' => $query]),
            TaskStatus::class
        );
    }
}
