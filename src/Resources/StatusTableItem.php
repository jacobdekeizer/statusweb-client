<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class StatusTableItem implements Response
{
    private int $status;
    private string $description;

    public function setStatus(int $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public static function fromResponse(array $response): static
    {
        return (new static)
            ->setStatus((int) ($response['Status'] ?? 0))
            ->setDescription($response['Omschrijving'] ?? '');
    }

    public static function collectionFromResponse(array $items): array
    {
        if (isset($items['Status'])) {
            $items = [$items];
        }
        return array_map(static fn(array $item) => static::fromResponse($item), $items);
    }
}
