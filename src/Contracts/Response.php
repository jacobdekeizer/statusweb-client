<?php

namespace JacobDeKeizer\Statusweb\Contracts;

interface Response
{
    public static function fromResponse(array $response): Response;
}