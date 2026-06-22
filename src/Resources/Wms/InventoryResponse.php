<?php

namespace JacobDeKeizer\Statusweb\Resources\Wms;

use JacobDeKeizer\Statusweb\Contracts\Response;

class InventoryResponse implements Response
{
    /** @var InventoryItem[] */
    private array $items;

    /**
     * @param InventoryItem[] $items
     */
    public function setItems(array $items): static
    {
        $this->items = $items;
        return $this;
    }

    /** @return InventoryItem[] */
    public function getItems(): array
    {
        return $this->items;
    }

    public static function fromResponse(array $response): static
    {
        $items = [];
        if (isset($response['Voorraad']['ArtikelVoorraadData'])) {
            $data = $response['Voorraad']['ArtikelVoorraadData'];
            if (isset($data['Artikelnr'])) {
                $data = [$data];
            }
            $items = array_map(static fn(array $item) => InventoryItem::fromResponse($item), $data);
        }

        return (new static)->setItems($items);
    }
}
