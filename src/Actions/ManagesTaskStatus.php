<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\TaskStatus;

trait ManagesTaskStatus
{
    /**
     * Get all task statuses.
     *
     * @param array $query Query params to filter response
     *
     * @return array
     */
    public function taskStatuses(array $query = null)
    {
        return $this->transformCollection(
            $this->get('task_statuses', ['query' => $query]),
            TaskStatus::class
        );
    }

    /**
     * Find task by id.
     *
     * @param int $id
     *
     * @return array
     */
    public function taskStatus($id)
    {
        $statuses = $this->transformCollection(
            $this->get("task_statuses/{$id}"),
            TaskStatus::class
        );

        return array_shift($statuses);
    }

    /**
     * Create new status.
     *
     * @param mixed $payload The name of the status or array with data
     *
     * @return TaskStatus
     */
    public function createTaskStatus($payload)
    {
        $data = !is_array($payload) ? ['name' => $payload] : $payload;

        $boards = $this->transformCollection(
            $this->post('task_statuses', ['task_status' => $data]),
            TaskStatus::class
        );

        return array_shift($boards);
    }
}
