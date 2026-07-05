<?php

namespace JacobDeKeizer\Statusweb\Contracts;

interface Dto
{
    public function toArray(): array;

    public static function fromArray(array $data): Dto;
}