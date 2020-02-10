<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class SendShipmentsResponse implements Response
{
    /**
     * @var SendShipmentResponse[]
     */
    private $sendShipmentData;

    /**
     * @param SendShipmentResponse[] $sendShipmentData
     * @return SendShipmentsResponse
     */
    public function setSendShipmentData(array $sendShipmentData): SendShipmentsResponse
    {
        $this->sendShipmentData = $sendShipmentData;
        return $this;
    }

    /**
     * @return SendShipmentResponse[]
     */
    public function getSendShipmentData(): array
    {
        return $this->sendShipmentData;
    }

    /**
     * @inheritDoc
     * @return SendShipmentsResponse
     */
    public static function fromResponse(array $response): Response
    {
        return (new self)
            ->setSendShipmentData(array_map(static function (array $sendShipmentData): SendShipmentResponse {
                return SendShipmentResponse::fromResponse($sendShipmentData);
            }, $response['Zendingen'] ?? []));
    }
}