<?php

namespace Devlau\Runrunit\Exceptions;

use Exception;

class InternalServerException extends Exception
{
    /**
     * Create a new exception instance.
     */
    public function __construct($message, $code = 500)
    {
        parent::__construct($message ?: 'Falha de comunicação com o servidor RunRunit', $code);
    }
}
