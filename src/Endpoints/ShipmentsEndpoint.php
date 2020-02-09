<?php

namespace JacobDeKeizer\Statusweb\Endpoints;

use DateTime;
use JacobDeKeizer\Statusweb\Exceptions\StatuswebErrorResponse;
use JacobDeKeizer\Statusweb\Exceptions\StatuswebException;
use JacobDeKeizer\Statusweb\Resources\DeleteShipmentResponse;
use JacobDeKeizer\Statusweb\Resources\EtaResponse;
use JacobDeKeizer\Statusweb\Resources\SendShipmentsResponse;
use JacobDeKeizer\Statusweb\Resources\Shipment;
use JacobDeKeizer\Statusweb\Resources\ShipmentResponse;
use JacobDeKeizer\Statusweb\Resources\StatusResponse;

class ShipmentsEndpoint extends BaseEndpoint
{
    /**
     * @param Shipment $shipment
     * @return ShipmentResponse
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function create(Shipment $shipment): ShipmentResponse
    {
        $result = $this->doRequest('PutZending', $shipment->toRequest());

        return ShipmentResponse::fromResponse($this->validateAndExtractData('PutZendingResult', $result));
    }

    /**
     * @param float $transportNumber
     * @return DeleteShipmentResponse
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function delete(float $transportNumber): DeleteShipmentResponse
    {
        $result = $this->doRequest('DeleteZending', ['Vrachtnummer' => $transportNumber]);

        return DeleteShipmentResponse::fromResponse($this->validateAndExtractData('DeleteZendingResult', $result));
    }

    /**
     * @return SendShipmentsResponse
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function send(): SendShipmentsResponse
    {
        $result = $this->doRequest('Send');

        return SendShipmentsResponse::fromResponse($this->validateAndExtractData('SendResult', $result));
    }

    /**
     * @param float $transportNumber
     * @return StatusResponse
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getStatus(float $transportNumber): StatusResponse
    {
        $result = $this->doRequest('GetStatusVrachtnummer', ['Vrachtnummer' => $transportNumber]);

        return StatusResponse::fromResponse($this->validateAndExtractData('GetStatusVrachtnummerResult', $result));
    }

    /**
     * @return StatusResponse
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getAllStatuses(): StatusResponse
    {
        $result = $this->doRequest('GetStatus', ['Mark' => (new DateTime)->format('Y-m-d H:i:s')]);

        return StatusResponse::fromResponse($this->validateAndExtractData('GetStatusResult', $result));
    }

    /**
     * @param float $transportNumber
     * @return string
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getStatusUrl(float $transportNumber): string
    {
        $result = $this->doRequest('GetStatusweblinkVrachtnummer', ['Vrachtnummer' => $transportNumber]);

        $data = $this->validateAndExtractData('GetStatusweblinkVrachtnummerResult', $result);

        return $data['Statusweblink'] ?? '';
    }

    /**
     * @param float $transportNumber
     * @return EtaResponse
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getEstimatedTimeOfArrival(float $transportNumber): EtaResponse
    {
        $result = $this->doRequest('GetETAVrachtnummer', ['Vrachtnummer' => $transportNumber]);

        return EtaResponse::fromResponse($this->validateAndExtractData('GetETAVrachtnummerResult', $result));
    }
}