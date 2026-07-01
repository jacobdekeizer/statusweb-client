<?php

namespace JacobDeKeizer\Statusweb\Resources\Wms;

use JacobDeKeizer\Statusweb\Contracts\Response;

class DeliveryStatusResponse implements Response
{
    /**
     * @param DeliveryStatusItem[] $items
     */
    public function __construct(
        private array $items = [],
    ) {
    }

    /**
     * @param DeliveryStatusItem[] $items
     */
    public function setItems(array $items): static
    {
        $this->items = $items;
        return $this;
    }

    /** @return DeliveryStatusItem[] */
    public function getItems(): array
    {
        return $this->items;
    }

    public static function fromResponse(array $response): static
    {
        $items = [];
        if (isset($response['ArtikelStatus']['ArtikelStatusData'])) {
            $data = $response['ArtikelStatus']['ArtikelStatusData'];
            if (isset($data['Artikelnr'])) {
                $data = [$data];
            }
            $items = array_map(static fn(array $item) => DeliveryStatusItem::fromResponse($item), $data);
        }

        return new static(items: $items);
    }
}
