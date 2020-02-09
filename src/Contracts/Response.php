<?php

namespace JacobDeKeizer\Statusweb\Contracts;

interface Response
{
    /**
     * @param array $response
     * @return Response
     */
    public static function fromResponse(array $response): Response;
}