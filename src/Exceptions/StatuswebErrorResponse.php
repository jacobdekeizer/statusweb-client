<?php

namespace JacobDeKeizer\Statusweb\Exceptions;

use Exception;

class StatuswebErrorResponse extends Exception
{
    public static function fromCode(int $code, string $message): self
    {
        return new self($message, $code);
    }
}