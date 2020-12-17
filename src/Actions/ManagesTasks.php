<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\Task;

trait ManagesTasks
{
    /**
     * Get all tasks.
     *
     * @return array
     */
    public function tasks(array $query = null)
    {
        return $this->transformCollection(
            $this->get('tasks', ['query' => $query]),
            Task::class
        );
    }

    /**
     * Find task by id.
     *
     * @param int $id
     *
     * @return Task
     */
    public function task($id)
    {
        $tasks = $this->transformCollection(
            $this->get("tasks/{$id}"),
            Task::class
        );

        return array_shift($tasks);
    }

    /**
     * Change a Task status to another
     *
     * @param int $id  Task ID
     * @param int $taskStatusId  Task Status ID
     *
     * @return Task
     */
    public function changeTaskStatus($id, $taskStatusId)
    {
        $documents = $this->transformCollection(
            $this->post("tasks/{$id}/change_status", [
                'task_status_id' => $taskStatusId,
            ]),
            Task::class
        );

        return array_shift($documents);
    }

    /**
     * Create new task.
     *
     * @param array $data
     *
     * @return Task
     */
    public function createTask(array $data)
    {
        $tasks = $this->transformCollection(
            $this->post('tasks', ['task' => $data]),
            Task::class
        );

        return array_shift($tasks);
    }
}
