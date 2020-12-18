<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\Board;

trait ManagesBoards
{
    /**
     * Get all boards.
     *
     * @return array
     */
    public function boards()
    {
        return $this->transformCollection(
            $this->get('boards'),
            Board::class
        );
    }

    /**
     * Get board by id.
     *
     * @param int $id
     *
     * @return Board
     */
    public function board($id)
    {
        $board = $this->get("boards/{$id}");

        return new Board($board, $this);
    }

    /**
     * Create new board.
     *
     * @param string $name
     *
     * @return Board
     */
    public function createBoard($name)
    {
        $board = $this->post('boards', [
            'json' => [
                'name' => $name
            ]
        ]);

        return new Board($board, $this);
    }
}
