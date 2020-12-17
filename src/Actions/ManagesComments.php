<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\Comment;

trait ManagesComments
{
    /**
     * Get all task comments.
     *
     * @param int $id Task id
     *
     * @return array
     */
    public function comments($id)
    {
        return $this->transformCollection(
            $this->get("tasks/{$id}/comments"),
            Comment::class
        );
    }

    /**
     * Find comment by id.
     *
     * @param int $id
     *
     * @return Comment
     */
    public function comment($id)
    {
        $comments = $this->transformCollection(
            $this->get("comments/{$id}"),
            Comment::class
        );

        return array_shift($comments);
    }

    /**
     * Create new comment.
     *
     * @param int  $id  Task ID
     * @param string  $text  Comment content
     *
     * @return Comment
     */
    public function createComment($id, $text)
    {
        $comments = $this->transformCollection(
            $this->post('comments', [
                'task_id' => $id,
                'text' => $text,
            ]),
            Comment::class
        );

        return array_shift($comments);
    }
}
