<?php

namespace Devlau\Runrunit\Resources;

class Client extends Resource
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
    public $customField;

    /**
     * @var  bool
     */
    public $isVisible;

    /**
     * @var  int
     */
    public $budgetedHoursMonth;

    /**
     * @var  float
     */
    public $budgetedCostMonth;

    /**
     * @var  int
     */
    public $projectsCount;

    /**
     * @var  int
     */
    public $timeWorked;

    /**
     * @var  int
     */
    public $timePendingNotAssigned;

    /**
     * @var  int
     */
    public $timePendingQueued;

    /**
     * @var  int
     */
    public $timePending;

    /**
     * @var  int
     */
    public $timeTotal;

    /**
     * @var  float
     */
    public $timeProgress;

    /**
     * @var  float
     */
    public $costWorked;

    /**
     * @var  float
     */
    public $costPending;

    /**
     * @var  float
     */
    public $costTotal;

    /**
     * @var  int
     */
    public $activities_6DaysAgo;

    /**
     * @var  int
     */
    public $activities_5DaysAgo;

    /**
     * @var  int
     */
    public $activities_4DaysAgo;

    /**
     * @var  int
     */
    public $activities_3DaysAgo;

    /**
     * @var  int
     */
    public $activities_2DaysAgo;

    /**
     * @var  int
     */
    public $activities_1DaysAgo;

    /**
     * @var  int
     */
    public $activities_0DaysAgo;

    /**
     * @var  int
     */
    public $activities;

    /**
     * @var  int
     */
    public $timePendingBacklog;

    /**
     * @var  array
     */
    public $projectGroups;

    /**
     * @var  array
     */
    public $projectIds;
}
