<?php

namespace Devlau\Runrunit\Resources;

class Document extends Resource
{
    /**
     * @var  int
     */
    public $id;

    /**
     * @var  string
     */
    public $dataFileName;

    /**
     * @var  int
     */
    public $dataFileSize;

    /**
     * @var  string
     */
    public $dataContentType;

    /**
     * @var  string
     */
    public $dataUpdatedAt;

    /**
     * @var  string
     */
    public $fileName;

    /**
     * @var  int
     */
    public $fileSize;

    /**
     * @var  string
     */
    public $fileContentType;

    /**
     * @var  string
     */
    public $fileExtension;

    /**
     * @var  string
     */
    public $uploadedAt;

    /**
     * @var  bool
     */
    public $transfered;

    /**
     * @var  string
     */
    public $uploaderId;

    /**
     * @var  string
     */
    public $uploaderName;

    /**
     * @var  int
     */
    public $attachableId;

    /**
     * @var  string
     */
    public $attachableType;

    /**
     * @var  string
     */
    public $attachableName;

    /**
     * @var  string
     */
    public $thumbnailFileName;
}
