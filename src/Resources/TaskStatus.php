<?php

namespace Devlau\Runrunit\Resources;

class TaskStatus extends Resource
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
     * @var  string
     */
    public $stageGroup;

    /**
     * @var  int
     */
    public $boardId;

    /**
     * @var  int
     */
    public $position;

    /**
     * @var  bool
     */
    public $isFollowing;

    /**
     * @var  bool
     */
    public $useLatencyTime;

    /**
     * @var  bool
     */
    public $isDefault;

    /**
     * @var  bool
     */
    public $isDelivered;

    /**
     * @var  string
     */
    public $statusGroup;
}
