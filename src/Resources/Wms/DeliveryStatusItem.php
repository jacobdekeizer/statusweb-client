<?php

namespace JacobDeKeizer\Statusweb\Resources\Wms;

use JacobDeKeizer\Statusweb\Contracts\Response;

class DeliveryStatusItem implements Response
{
    private string $articleNumber;
    private string $articleDescription;
    private int $amount;
    private int $status;
    private string $statusDescription;

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

    public function setStatus(int $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatusDescription(string $statusDescription): static
    {
        $this->statusDescription = $statusDescription;
        return $this;
    }

    public function getStatusDescription(): string
    {
        return $this->statusDescription;
    }

    public static function fromResponse(array $response): static
    {
        return (new static)
            ->setArticleNumber($response['Artikelnr'] ?? '')
            ->setArticleDescription($response['ArtikelOmschrijving'] ?? '')
            ->setAmount((int) ($response['Aantal'] ?? 0))
            ->setStatus((int) ($response['Status'] ?? 0))
            ->setStatusDescription($response['StatusOmschrijving'] ?? '');
    }
}
