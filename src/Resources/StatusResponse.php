<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class StatusResponse implements Response
{
    /** @var StatusDataResponse[] */
    private array $statuses;
    private ?string $mark;
    private bool $hasMore;

    /**
     * @param StatusDataResponse[] $statuses
     */
    public function setStatuses(array $statuses): static
    {
        $this->statuses = $statuses;
        return $this;
    }

    /** @return StatusDataResponse[] */
    public function getStatuses(): array
    {
        return $this->statuses;
    }

    public function setMark(?string $mark): static
    {
        $this->mark = $mark;
        return $this;
    }

    public function getMark(): ?string
    {
        return $this->mark;
    }

    public function setHasMore(bool $hasMore): static
    {
        $this->hasMore = $hasMore;
        return $this;
    }

    public function hasMore(): bool
    {
        return $this->hasMore;
    }

    public static function fromResponse(array $response): static
    {
        $statusData = $response['Status'] ?? [];

        $items = [];
        if (isset($statusData['StatusMeldingData'])) {
            $data = $statusData['StatusMeldingData'];
            if (isset($data['Zendingnummer'])) {
                $data = [$data];
            }
            $items = array_map(
                static fn(array $item) => StatusDataResponse::fromResponse($item),
                $data,
            );
        }

        return (new static)
            ->setStatuses($items)
            ->setMark($response['Mark'] ?? null)
            ->setHasMore(($response['More'] ?? 0) === 1);
    }
}
