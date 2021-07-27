<?php

namespace Devlau\Runrunit\Exceptions;

use Exception;

class TimeoutException extends Exception
{
    /**
     * The output returned from the operation.
     *
     * @var array
     */
    public $output;

    /**
     * Create a new exception instance.
     *
     * @param $output
     * @param $code
     */
    public function __construct($output, $code = 0)
    {
        parent::__construct('Script timed out while waiting for the process to complete.', $code);

        $this->output = $output;
    }

    /**
     * The output returned from the operation.
     *
     * @return array
     */
    public function output()
    {
        return $this->output;
    }
}
