<?php

namespace Devlau\Runrunit\Resources;

class Comment extends Resource
{
    /**
     * @var  int
     */
    public $id;

    /**
     * @var  int
     */
    public $userId;

    /**
     * @var  bool
     */
    public $isSystemMessage;

    /**
     * @var  string
     */
    public $text;

    /**
     * @var  string
     */
    public $commenterName;

    /**
     * @var  int
     */
    public $childrenCount;

    /**
     * @var  int
     */
    public $commentableId;

    /**
     * @var  string
     */
    public $commentableType;

    /**
     * @var  string
     */
    public $createdAt;

    /**
     * @var  string
     */
    public $editedAt;

    /**
     * @var  string
     */
    public $deletedAt;

    /**
     * @var  int
     */
    public $threadId;

    /**
     * @var  int
     */
    public $quotedCommentId;

    /**
     * @var  string
     */
    public $quotedCommentText;

    /**
     * @var  int
     */
    public $quotedCommentUserId;

    /**
     * @var  string
     */
    public $quotedCommentUserName;

    /**
     * @var  int
     */
    public $taskId;

    /**
     * @var  int
     */
    public $commentId;

    /**
     * @var  int
     */
    public $teamId;

    /**
     * @var  int
     */
    public $enterpriseId;

    /**
     * @var  int
     */
    public $documentId;

    /**
     * @var  bool
     */
    public $isLegacy;

    /**
     * @var  string
     */
    public $media;

    /**
     * @var  array
     */
    public $documents;

    /**
     * @var  array
     */
    public $reactions;
}
