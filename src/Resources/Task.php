<?php

namespace Devlau\Runrunit\Resources;

class Task extends Resource
{
    /**
     * @var  int
     */
    public $id;

    /**
     * @var  string
     */
    public $title;

    /**
     * @var  bool
     */
    public $isWorkingOn;

    /**
     * @var  int
     */
    public $userId;

    /**
     * @var  int
     */
    public $typeId;

    /**
     * @var  int
     */
    public $projectId;

    /**
     * @var  int
     */
    public $teamId;

    /**
     * @var  int
     */
    public $boardId;

    /**
     * @var  int
     */
    public $boardStageId;

    /**
     * @var  int
     */
    public $boardStagePosition;

    /**
     * @var  string
     */
    public $desiredDate;

    /**
     * @var  string
     */
    public $desiredDateWithTime;

    /**
     * @var  string
     */
    public $estimatedStartDate;

    /**
     * @var  string
     */
    public $estimatedDeliveryDate;

    /**
     * @var  string
     */
    public $ganttBarStartDate;

    /**
     * @var  string
     */
    public $ganttBarEndDate;

    /**
     * @var  string
     */
    public $closeDate;

    /**
     * @var  bool
     */
    public $wasReopened;

    /**
     * @var  bool
     */
    public $isClosed;

    /**
     * @var  bool
     */
    public $isAssigned;

    /**
     * @var  bool
     */
    public $onGoing;

    /**
     * @var  bool
     */
    public $estimateUpdated;

    /**
     * @var  string
     */
    public $estimatedAt;

    /**
     * @var  int
     */
    public $queuePosition;

    /**
     * @var  string
     */
    public $createdAt;

    /**
     * @var  string
     */
    public $startDate;

    /**
     * @var  string
     */
    public $desiredStartDate;

    /**
     * @var  int
     */
    public $currentEstimateSeconds;

    /**
     * @var  int
     */
    public $currentEvaluatorId;

    /**
     * @var  string
     */
    public $evaluationStatus;

    /**
     * @var  int
     */
    public $attachmentsCount;

    /**
     * @var  array
     */
    public $tags;

    /**
     * @var  string
     */
    public $clientName;

    /**
     * @var  int
     */
    public $clientId;

    /**
     * @var  string
     */
    public $projectName;

    /**
     * @var  string
     */
    public $projectGroupName;

    /**
     * @var  int
     */
    public $projectGroupId;

    /**
     * @var  bool
     */
    public $projectGroupIsDefault;

    /**
     * @var  string
     */
    public $projectSubGroupName;

    /**
     * @var  int
     */
    public $projectSubGroupId;

    /**
     * @var  bool
     */
    public $projectSubGroupIsDefault;

    /**
     * @var  string
     */
    public $typeName;

    /**
     * @var  string
     */
    public $userName;

    /**
     * @var  string
     */
    public $boardName;

    /**
     * @var  string
     */
    public $boardStageName;

    /**
     * @var  string
     */
    public $teamName;

    /**
     * @var  string
     */
    public $typeColor;

    /**
     * @var  string
     */
    public $state;

    /**
     * @var  string
     */
    public $overdue;

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
    public $timeTotal;

    /**
     * @var  float
     */
    public $timeProgress;

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
    public $repetitionRule;

    /**
     * @var  int
     */
    public $boardRemainingTime;

    /**
     * @var  string
     */
    public $stageDepartEstimatedAt;

    /**
     * @var  bool
     */
    public $isUrgent;

    /**
     * @var  int
     */
    public $reestimateCount;

    /**
     * @var  int
     */
    public $priority;

    /**
     * @var  string
     */
    public $tagList;

    /**
     * @var  string
     */
    public $scheduledStartTime;

    /**
     * @var  string
     */
    public $isScheduled;

    /**
     * @var  array
     */
    public $taskTags;

    /**
     * @var  bool
     */
    public $approved;

    /**
     * @var  int
     */
    public $taskStatusId;

    /**
     * @var  string
     */
    public $taskStatusName;

    /**
     * @var  array
     */
    public $assignments;

    /**
     * @var  int
     */
    public $workflowId;

    /**
     * @var  int
     */
    public $checklistId;

    /**
     * @var  array
     */
    public $followerIds;

    /**
     * @var  string
     */
    public $unseenSince;
}
