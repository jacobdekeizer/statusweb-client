<?php

namespace JacobDeKeizer\Statusweb\Contracts;

interface Dto
{
    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @param array $data
     * @return Dto
     */
    public function fromArray(array $data): Dto;
}