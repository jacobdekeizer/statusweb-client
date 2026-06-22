<?php

namespace JacobDeKeizer\Statusweb\Endpoints;

use JacobDeKeizer\Statusweb\Exceptions\StatuswebErrorResponse;
use JacobDeKeizer\Statusweb\Exceptions\StatuswebException;
use JacobDeKeizer\Statusweb\Resources\AddShipmentRowResponse;
use JacobDeKeizer\Statusweb\Resources\DeleteShipmentResponse;
use JacobDeKeizer\Statusweb\Resources\DeleteShipmentRowResponse;
use JacobDeKeizer\Statusweb\Resources\EtaResponse;
use JacobDeKeizer\Statusweb\Resources\PhotoResponse;
use JacobDeKeizer\Statusweb\Resources\LabelData;
use JacobDeKeizer\Statusweb\Resources\PodResponse;
use JacobDeKeizer\Statusweb\Resources\SendShipmentsResponse;
use JacobDeKeizer\Statusweb\Resources\Shipment;
use JacobDeKeizer\Statusweb\Resources\ShipmentResponse;
use JacobDeKeizer\Statusweb\Resources\ShipmentRow;
use JacobDeKeizer\Statusweb\Resources\ShipmentTypeTableItem;
use JacobDeKeizer\Statusweb\Resources\StatusResponse;
use JacobDeKeizer\Statusweb\Resources\StatusTableItem;
use JacobDeKeizer\Statusweb\Resources\StatusweblinkResponse;
use JacobDeKeizer\Statusweb\Resources\ShipmentInfoResponse;

class ShipmentsEndpoint extends BaseEndpoint
{
    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function create(Shipment $shipment): ShipmentResponse
    {
        $result = $this->doRequest('PutZending', $shipment->toRequest());

        return ShipmentResponse::fromResponse($this->validateAndExtractData('PutZendingResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function addShipmentRow(int $shipmentNumber, ShipmentRow $row, LabelData $labelData): AddShipmentRowResponse
    {
        $result = $this->doRequest('AddZendingRegel', [
            'Zendingnummer' => $shipmentNumber,
            'ZendingregelData' => $row->toRequest(),
            'LabelData' => $labelData->toRequest(),
        ]);

        return AddShipmentRowResponse::fromResponse($this->validateAndExtractData('AddZendingRegelResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function deleteShipmentRow(int $shipmentNumber, int $rowId): DeleteShipmentRowResponse
    {
        $result = $this->doRequest('DeleteZendingRegel', [
            'Zendingnummer' => $shipmentNumber,
            'Regel_ID' => $rowId,
        ]);

        return DeleteShipmentRowResponse::fromResponse($this->validateAndExtractData('DeleteZendingRegelResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function delete(int $shipmentNumber): DeleteShipmentResponse
    {
        $result = $this->doRequest('DeleteZending', ['Zendingnummer' => $shipmentNumber]);

        return DeleteShipmentResponse::fromResponse($this->validateAndExtractData('DeleteZendingResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function send(): SendShipmentsResponse
    {
        $result = $this->doRequest('Send');

        return SendShipmentsResponse::fromResponse($this->validateAndExtractData('SendResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function sendShipment(int $shipmentNumber): SendShipmentsResponse
    {
        $result = $this->doRequest('SendZending', ['Zendingnummer' => $shipmentNumber]);

        return SendShipmentsResponse::fromResponse($this->validateAndExtractData('SendZendingResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getStatus(int $shipmentNumber): StatusResponse
    {
        $result = $this->doRequest('GetStatusZending', ['Zendingnummer' => $shipmentNumber]);

        return StatusResponse::fromResponse($this->validateAndExtractData('GetStatusZendingResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getAllStatuses(?string $mark = null): StatusResponse
    {
        $result = $this->doRequest('GetStatus', ['Mark' => $mark ?? '']);

        return StatusResponse::fromResponse($this->validateAndExtractData('GetStatusResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getStatusUrl(int $shipmentNumber): StatusweblinkResponse
    {
        $result = $this->doRequest('GetStatusweblinkZending', ['Zendingnummer' => $shipmentNumber]);

        return StatusweblinkResponse::fromResponse($this->validateAndExtractData('GetStatusweblinkZendingResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getEstimatedTimeOfArrival(int $shipmentNumber): EtaResponse
    {
        $result = $this->doRequest('GetETAZending', ['Zendingnummer' => $shipmentNumber]);

        return EtaResponse::fromResponse($this->validateAndExtractData('GetETAZendingResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getInfo(int $shipmentNumber): ShipmentInfoResponse
    {
        $result = $this->doRequest('GetZendingInfo', ['Zendingnummer' => $shipmentNumber]);

        return ShipmentInfoResponse::fromResponse($this->validateAndExtractData('GetZendingInfoResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getInfoSend(int $shipmentNumber): ShipmentInfoResponse
    {
        $result = $this->doRequest('GetZendingInfoSend', ['Zendingnummer' => $shipmentNumber]);

        return ShipmentInfoResponse::fromResponse($this->validateAndExtractData('GetZendingInfoSendResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getPod(int $shipmentNumber): PodResponse
    {
        $result = $this->doRequest('GetPODZending', ['Zendingnummer' => $shipmentNumber]);

        return PodResponse::fromResponse($this->validateAndExtractData('GetPODZendingResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getPhotos(int $shipmentNumber): PhotoResponse
    {
        $result = $this->doRequest('GetFotoZending', ['Zendingnummer' => $shipmentNumber]);

        return PhotoResponse::fromResponse($this->validateAndExtractData('GetFotoZendingResult', $result));
    }

    /**
     * @return StatusTableItem[]
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getStatusTable(): array
    {
        $result = $this->doRequest('GetStatusTabel');

        $data = $this->validateAndExtractData('GetStatusTabelResult', $result);

        return StatusTableItem::collectionFromResponse($data['StatusTabel']['StatusTabelData'] ?? []);
    }

    /**
     * @return ShipmentTypeTableItem[]
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getShipmentTypeTable(): array
    {
        $result = $this->doRequest('GetZendingsoortTabel');

        $data = $this->validateAndExtractData('GetZendingsoortTabelResult', $result);

        return ShipmentTypeTableItem::collectionFromResponse($data['ZendingsoortTabel']['ZendingsoortTabelData'] ?? []);
    }
}
