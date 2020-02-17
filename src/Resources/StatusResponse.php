<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class StatusResponse implements Response
{
    /**
     * @var StatusDataResponse[]
     */
    private $statuses;

    /**
     * @param StatusDataResponse[] $statuses
     * @return StatusResponse
     */
    public function setStatuses(array $statuses): StatusResponse
    {
        $this->statuses = $statuses;
        return $this;
    }

    /**
     * @return StatusDataResponse[]
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
                return StatusDataResponse::fromResponse($statusData);
            }, $response['Status']));
    }
}