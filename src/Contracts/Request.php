<?php

namespace JacobDeKeizer\Statusweb\Contracts;

interface Request
{
    /**
     * @return array
     */
    public function toRequest(): array;
}