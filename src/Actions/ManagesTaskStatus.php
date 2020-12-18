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
        $status = $this->get("task_statuses/{$id}");

        return new TaskStatus($status, $this);
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

        $status = $this->post('task_statuses', [
            'json' => [
                'task_status' => $data
            ]
        ]);

        return new TaskStatus($status, $this);
    }
}
