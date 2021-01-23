<?php

namespace Devlau\Runrunit\Resources;

class TaskType extends Resource
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
    public $standardEffort;

    /**
     * @var  int
     */
    public $standardEffortTime;

    /**
     * @var  int
     */
    public $avgDelivery;

    /**
     * @var  string
     */
    public $color;

    /**
     * @var  bool
     */
    public $isVisible;

    /**
     * @var  bool
     */
    public $isPublic;

    /**
     * @var  bool
     */
    public $isDefault;

    /**
     * @var  array
     */
    public $permissions;
}
