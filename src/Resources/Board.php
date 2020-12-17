<?php

namespace Devlau\Runrunit\Resources;

class Board extends Resource
{
    /**
     * @var  int
     */
    public $id;

    /**
     * @var  string
     */
    public $name;

    /**
     * @var  bool
     */
    public $isPublic;

    /**
     * @var  bool
     */
    public $isDefault;

    /**
     * @var  string
     */
    public $createdAt;

    /**
     * @var  array
     */
    public $permissions;
}
