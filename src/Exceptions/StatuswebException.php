<?php

namespace JacobDeKeizer\Statusweb\Exceptions;

use Exception;
use Throwable;

class StatuswebException extends Exception
{
    public static function fromPrevious(string $message, Throwable $throwable): self
    {
        return new self($message, $throwable->getCode(), $throwable);
    }
}