<?php

namespace JacobDeKeizer\Statusweb\Resources\Wms;

use JacobDeKeizer\Statusweb\Contracts\Response;

class InventoryItem implements Response
{
    private string $articleNumber;
    private string $articleDescription;
    private int $amount;

    public function setArticleNumber(string $articleNumber): static
    {
        $this->articleNumber = $articleNumber;
        return $this;
    }

    public function getArticleNumber(): string
    {
        return $this->articleNumber;
    }

    public function setArticleDescription(string $articleDescription): static
    {
        $this->articleDescription = $articleDescription;
        return $this;
    }

    public function getArticleDescription(): string
    {
        return $this->articleDescription;
    }

    public function setAmount(int $amount): static
    {
        $this->amount = $amount;
        return $this;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public static function fromResponse(array $response): static
    {
        return (new static)
            ->setArticleNumber($response['Artikelnr'] ?? '')
            ->setArticleDescription($response['ArtikelOmschrijving'] ?? '')
            ->setAmount((int) ($response['Aantal'] ?? 0));
    }
}
