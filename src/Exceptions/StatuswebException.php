<?php

namespace JacobDeKeizer\Statusweb\Exceptions;

use Exception;
use Throwable;

class StatuswebException extends Exception
{
    /**
     * @param string $message
     * @param Throwable $throwable
     * @return StatuswebException
     */
    public static function fromPrevious(string $message, Throwable $throwable): self
    {
        return new self($message, $throwable->getCode(), $throwable);
    }
}