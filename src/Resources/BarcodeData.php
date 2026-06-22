<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Request;

class BarcodeData implements Request
{
    public function __construct(private string $barcode)
    {
    }

    public function getBarcode(): string
    {
        return $this->barcode;
    }

    public function toRequest(): array
    {
        return ['Barcode' => $this->barcode];
    }
}
