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
        $boards = $this->transformCollection(
            $this->get("boards/{$id}"),
            Board::class
        );

        return array_shift($boards);
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
        $boards = $this->transformCollection(
            $this->post('boards', ['name' => $name]),
            Board::class
        );

        return array_shift($boards);
    }
}
