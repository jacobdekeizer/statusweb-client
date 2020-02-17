<?php

namespace JacobDeKeizer\Statusweb\Exceptions;

use Exception;

class StatuswebErrorResponse extends Exception
{
    /**
     * @param int $code
     * @param string $message
     * @return StatuswebErrorResponse
     */
    public static function fromCode(int $code, string $message): self
    {
        return new self($message, $code);
    }
}