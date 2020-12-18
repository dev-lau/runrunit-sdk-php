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
        $comment = $this->get("comments/{$id}");

        return new Comment($comment, $this);
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
        $comment = $this->post('comments', [
            'json' => [
                'task_id' => $id,
                'text' => $text,
            ]
        ]);

        return new Comment($comment, $this);
    }
}
