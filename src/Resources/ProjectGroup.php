<?php

namespace Devlau\Runrunit\Resources;

class ProjectGroup extends Resource
{
    public $id;
    public $name;
    public $isDefault;
    public $clientId;
    public $clientName;
    public $projectsCount;
    public $timeWorked;
    public $timePendingNotAssigned;
    public $timePendingQueued;
    public $timePending;
    public $timeTotal;
    public $timeProgress;
    public $costWorked;
    public $costPending;
    public $costTotal;
    public $activities_6DaysAgo;
    public $activities_5DaysAgo;
    public $activities_4DaysAgo;
    public $activities_3DaysAgo;
    public $activities_2DaysAgo;
    public $activities_1DaysAgo;
    public $activities_0DaysAgo;
    public $activities;
    public $timePendingBacklog;
    public $projectSubGroups;
}
