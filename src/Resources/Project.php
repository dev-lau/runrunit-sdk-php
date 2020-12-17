<?php

namespace Devlau\Runrunit\Resources;

class Project extends Resource
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
    public $startDate;

    /**
     * @var  string
     */
    public $closeDate;

    /**
     * @var  bool
     */
    public $isClosed;

    /**
     * @var  int
     */
    public $clientId;

    /**
     * @var  int
     */
    public $projectGroupId;

    /**
     * @var  int
     */
    public $projectSubGroupId;

    /**
     * @var  float
     */
    public $budgetedCost;

    /**
     * @var  string
     */
    public $desiredDate;

    /**
     * @var  string
     */
    public $createdAt;

    /**
     * @var  bool
     */
    public $isPublic;

    /**
     * @var  bool
     */
    public $useNewPermissions;

    /**
     * @var  string
     */
    public $clientName;

    /**
     * @var  string
     */
    public $projectGroupName;

    /**
     * @var  bool
     */
    public $projectGroupIsDefault;

    /**
     * @var  string
     */
    public $projectSubGroupName;

    /**
     * @var  bool
     */
    public $projectSubGroupIsDefault;

    /**
     * @var  int
     */
    public $tasksCount;

    /**
     * @var  float
     */
    public $tasksCountProgress;

    /**
     * @var  int
     */
    public $tasksNotAssignedCount;

    /**
     * @var  int
     */
    public $tasksQueuedCount;

    /**
     * @var  int
     */
    public $tasksWorkingOnCount;

    /**
     * @var  int
     */
    public $tasksClosedCount;

    /**
     * @var  int
     */
    public $timeWorked;

    /**
     * @var  int
     */
    public $timePending;

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
    public $timeTotal;

    /**
     * @var  float
     */
    public $timeProgress;

    /**
     * @var  string
     */
    public $overdue;

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
    public $extraCosts;

    /**
     * @var  float
     */
    public $costTotal;

    /**
     * @var  string
     */
    public $overBudget;

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
     * @var  string
     */
    public $estimatedDeliveryDate;

    /**
     * @var  int
     */
    public $activities_7DaysAgo;

    /**
     * @var  int
     */
    public $timePendingBacklog;

    /**
     * @var  int
     */
    public $tasksBacklogCount;

    /**
     * @var  bool
     */
    public $isActive;

    /**
     * @var  array
     */
    public $permissions;
}
