<?php

namespace Devlau\Runrunit\Exceptions;

use Exception;

class RateLimitException extends Exception
{
    /**
     * @var string|int
     */
    public $remaining;

    /**
     * @var string|int
     */
    public $resetAt;

    /**
     * Create a new exception instance.
     *
     * @param $remaining
     * @param $reset
     * @param $code
     */
    public function __construct($remaining, $reset, $code = 0)
    {
        $message = "Rate limit exceeded. Remaining: $remaining, Reset at: $reset.";

        $this->remaining = $remaining;
        $this->resetAt = $reset;

        parent::__construct($message, $code);
    }

    /**
     * Remaining attempts.
     *
     * @return string|int
     */
    public function remaining()
    {
        return $this->remaining;
    }

    /**
     * date to schedule next call.
     *
     * @return string|int
     */
    public function resetAt()
    {
        return $this->resetAt;
    }
}
