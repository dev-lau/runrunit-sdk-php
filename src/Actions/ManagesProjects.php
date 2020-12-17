<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\Project;
use Devlau\Runrunit\Resources\ProjectDescription;

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
        $projects = $this->transformCollection(
            $this->get("projects/{$id}", ['query' => $query]),
            Project::class
        );

        return array_shift($projects);
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
        $projects = $this->transformCollection(
            $this->get("projects/${id}/involved_users", ['query' => $query]),
            User::class
        );

        return $projects;
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
        $projects = $this->transformCollection(
            $this->post('projects', ['project' => $data]),
            Project::class
        );

        return array_shift($projects);
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
        $descriptions = $this->transformCollection(
            $this->get('descriptions', [
                'query' => [
                    'project_id' => $id,
                ],
            ]),
            ProjectDescription::class
        );

        return array_shift($descriptions);
    }
}
