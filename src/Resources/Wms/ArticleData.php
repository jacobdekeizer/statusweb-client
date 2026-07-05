<?php

namespace JacobDeKeizer\Statusweb\Resources\Wms;

use JacobDeKeizer\Statusweb\Contracts\Request;

class ArticleData implements Request
{
    public function __construct(
        private string $articleNumber,
        private int $amount,
    ) {
    }

    public function getArticleNumber(): string
    {
        return $this->articleNumber;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function toRequest(): array
    {
        return [
            'Artikelnr' => $this->articleNumber,
            'Aantal' => $this->amount,
        ];
    }
}
