<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\TaskType;

trait ManagesTaskTypes
{
    /**
     * Get all task taskTypes.
     *
     * @param array $query Query params to filter response
     *
     * @return array
     */
    public function taskTypes(array $query = null)
    {
        return $this->transformCollection(
            $this->get('task_types', ['query' => $query]),
            TaskType::class
        );
    }

    /**
     * Find taskType by id.
     *
     * @param int $id
     *
     * @return array
     */
    public function taskType($id)
    {
        $taskType = $this->get("task_types/{$id}");

        return new TaskType($taskType, $this);
    }

    /**
     * Create new taskType.
     *
     * @param mixed $payload The name of the taskType or array with data
     *
     * @return TaskType
     */
    public function createTaskType($payload)
    {
        $data = !is_array($payload) ? ['name' => $payload] : $payload;

        $taskType = $this->post('task_types', [
            'json' => [
                'task_type' => $data
            ]
        ]);

        return new TaskType($taskType, $this);
    }

    /**
     * Update a taskType.
     *
     * @param int $id The taskType ID
     * @param mixed $payload The name of the taskType or array with data
     *
     * @return TaskType
     */
    public function updateTaskType($id, $payload)
    {
        $data = !is_array($payload) ? ['name' => $payload] : $payload;

        $taskType = $this->put("task_types/{$id}", [
            'json' => [
                'task_type' => $data
            ]
        ]);

        return new TaskType($taskType, $this);
    }
}
