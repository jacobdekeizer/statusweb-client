<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class StatusResponse implements Response
{
    /**
     * @var StatusData[]
     */
    private $statuses;

    /**
     * @param StatusData[] $statuses
     * @return StatusResponse
     */
    public function setStatuses(array $statuses): StatusResponse
    {
        $this->statuses = $statuses;
        return $this;
    }

    /**
     * @return StatusData[]
     */
    public function getStatuses(): array
    {
        return $this->statuses;
    }

    /**
     * @inheritDoc
     * @return StatusResponse
     */
    public static function fromResponse(array $response): Response
    {
        return (new self)
            ->setStatuses(array_map(static function (array $statusData) {
                return StatusData::fromResponse($statusData);
            }, $response['Status']));
    }
}