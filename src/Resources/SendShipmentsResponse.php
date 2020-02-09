<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class SendShipmentsResponse implements Response
{
    /**
     * @var SendShipmentData[]
     */
    private $sendShipmentData;

    /**
     * @param SendShipmentData[] $sendShipmentData
     * @return SendShipmentsResponse
     */
    public function setSendShipmentData(array $sendShipmentData): SendShipmentsResponse
    {
        $this->sendShipmentData = $sendShipmentData;
        return $this;
    }

    /**
     * @return SendShipmentData[]
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
            ->setSendShipmentData(array_map(static function (array $sendShipmentData): SendShipmentData {
                return SendShipmentData::fromResponse($sendShipmentData);
            }, $response['Zendingen'] ?? []));
    }
}