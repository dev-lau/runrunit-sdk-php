<?php

namespace Devlau\Runrunit\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{
    /**
     * Create a new exception instance.
     */
    public function __construct($message, $code = 401)
    {
        parent::__construct($message ?: 'Sem permissão para realizar ações no RunRunit', $code);
    }
}
