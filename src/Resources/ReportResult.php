<?php

namespace Devlau\Runrunit\Resources;

class ReportResult extends Resource
{
    /**
     * @var  int
     */
    public $projectId;

    /**
     * @var  string
     */
    public $userId;

    /**
     * @var  int
     */
    public $taskId;

    /**
     * @var  string
     */
    public $projectName;

    /**
     * @var  int
     */
    public $projectSubGroupId;

    /**
     * @var  string
     */
    public $projectSubGroupName;

    /**
     * @var  int
     */
    public $projectGroupId;

    /**
     * @var  string
     */
    public $projectGroupName;

    /**
     * @var  int
     */
    public $clientId;

    /**
     * @var  string
     */
    public $clientName;

    /**
     * @var  string
     */
    public $userName;

    /**
     * @var  string
     */
    public $taskTitle;

    /**
     * @var  array
     */
    public $taskTags;

    /**
     * @var  int
     */
    public $typeId;

    /**
     * @var  string
     */
    public $typeName;

    /**
     * @var  bool
     */
    public $taskIsClosed;

    /**
     * @var  string timestamp
     */
    public $taskDesiredDate;

    /**
     * @var  string timestamp
     */
    public $taskDesiredDateUpdatedAt;

    /**
     * @var  string date
     */
    public $taskCloseDate;

    /**
     * @var  string date
     */
    public $taskStartDate;

    /**
     * @var  bool
     */
    public $taskOnGoing;

    /**
     * @var  string
     */
    public $taskState;

    /**
     * @var  int
     */
    public $taskCurrentEstimateSeconds;

    /**
     * @var  int
     */
    public $automaticTime;

    /**
     * @var  int
     */
    public $manualTime;

    /**
     * @var  int
     */
    public $time;

    /**
     * @var  string date
     */
    public $date;
}
