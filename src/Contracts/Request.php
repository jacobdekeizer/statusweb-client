<?php

namespace JacobDeKeizer\Statusweb\Contracts;

interface Request
{
    public function toRequest(): array;
}