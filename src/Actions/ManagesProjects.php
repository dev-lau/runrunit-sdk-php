<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\Project;
use Devlau\Runrunit\Resources\ProjectDescription;
use Devlau\Runrunit\Resources\User;

trait ManagesProjects
{
    /**
     * Get all projects.
     *
     * @param array $query
     *
     * @return array
     */
    public function projects(array $query = null)
    {
        return $this->transformCollection(
            $this->get('projects', ['query' => $query]),
            Project::class
        );
    }

    /**
     * Find project by id.
     *
     * @param int $id
     * @param array $query
     *
     * @return Project
     */
    public function project($id, array $query = null)
    {
        $project = $this->get("projects/{$id}", ['query' => $query]);

        return new Project($project, $this);
    }

    /**
     * Get project involved users.
     *
     * @param int $id
     * @param array $query
     *
     * @return array
     */
    public function projectInvolvedUsers($id, array $query = null)
    {
        $users = $this->transformCollection(
            $this->get("projects/${id}/involved_users", ['query' => $query]),
            User::class
        );

        return $users;
    }

    /**
     * Create new project.
     *
     * @param array $data
     *
     * @return Project
     */
    public function createProject(array $data)
    {
        $project = $this->post('projects', [
            'json' => [
                'project' => $data
            ]
        ]);

        return new Project($project, $this);
    }

    /**
     * Update a project.
     *
     * @param int $id Project ID
     * @param array $data
     *
     * @return Project
     */
    public function updateProject($id, array $data)
    {
        $project = $this->put("projects/{$id}", [
            'json' => [
                'project' => $data
            ]
        ]);

        return new Project($project, $this);
    }

    /**
     * Get a project description
     *
     * @param int $id Project ID
     *
     * @return ProjectDescription
     */
    public function projectDescription($id)
    {
        $description = $this->get('descriptions', [
            'query' => [
                'project_id' => $id,
            ],
        ]);

        return new ProjectDescription($description, $this);
    }
}
