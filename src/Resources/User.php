<?php

namespace Devlau\Runrunit\Resources;

class User extends Resource
{
    /**
     * @var  string
     */
    public $id;

    /**
     * @var  string
     */
    public $name;

    /**
     * @var  string
     */
    public $email;

    /**
     * @var  string
     */
    public $avatarUrl;

    /**
     * @var  string
     */
    public $avatarLargeUrl;

    /**
     * @var  float
     */
    public $costHour;

    /**
     * @var  bool
     */
    public $isMaster;

    /**
     * @var  bool
     */
    public $isManager;

    /**
     * @var  bool
     */
    public $isAuditor;

    /**
     * @var  bool
     */
    public $canCreateClientProjectAndTaskTypes;

    /**
     * @var  bool
     */
    public $canCreateBoards;

    /**
     * @var  string
     */
    public $timeZone;

    /**
     * @var  string
     */
    public $position;

    /**
     * @var  bool
     */
    public $onVacation;

    /**
     * @var  string
     */
    public $birthday;

    /**
     * @var  string
     */
    public $phone;

    /**
     * @var  string
     */
    public $gender;

    /**
     * @var  string
     */
    public $maritalStatus;

    /**
     * @var  string
     */
    public $createdAt;

    /**
     * @var  string
     */
    public $inCompanySince;

    /**
     * @var  bool
     */
    public $isCertified;

    /**
     * @var  string
     */
    public $language;

    /**
     * @var  string
     */
    public $altId;

    /**
     * @var  string
     */
    public $oid;

    /**
     * @var  bool
     */
    public $budgetManager;

    /**
     * @var  array
     */
    public $shifts;

    /**
     * @var  bool
     */
    public $isMensurable;

    /**
     * @var  string
     */
    public $timeTrackingMode;

    /**
     * @var  string
     */
    public $blockedByTimeWorkedAt;

    /**
     * @var  int
     */
    public $demandersCount;

    /**
     * @var  int
     */
    public $partnersCount;

    /**
     * @var  string
     */
    public $passwordUpdatedAt;

    /**
     * @var  string
     */
    public $passwordExpiredAt;

    /**
     * @var  int
     */
    public $shiftWorkTimePerWeek;

    /**
     * @var  array
     */
    public $teamIds;

    /**
     * @var  array
     */
    public $ledTeamIds;
}
