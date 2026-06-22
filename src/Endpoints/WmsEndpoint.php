<?php

namespace JacobDeKeizer\Statusweb\Endpoints;

use JacobDeKeizer\Statusweb\Exceptions\StatuswebErrorResponse;
use JacobDeKeizer\Statusweb\Exceptions\StatuswebException;
use JacobDeKeizer\Statusweb\Resources\SendShipmentsResponse;
use JacobDeKeizer\Statusweb\Resources\Wms\DeliveryRequest;
use JacobDeKeizer\Statusweb\Resources\Wms\DeliveryRequestResponse;
use JacobDeKeizer\Statusweb\Resources\Wms\DeliveryStatusResponse;
use JacobDeKeizer\Statusweb\Resources\Wms\DeleteDeliveryResponse;
use JacobDeKeizer\Statusweb\Resources\Wms\InventoryResponse;

class WmsEndpoint extends BaseEndpoint
{
    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getInventory(): InventoryResponse
    {
        $result = $this->doRequest('GetVoorraad');

        return InventoryResponse::fromResponse($this->validateAndExtractData('GetVoorraadResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getArticleInventory(string $articleNumber): InventoryResponse
    {
        $result = $this->doRequest('GetVoorraadArtikel', ['Artikel' => $articleNumber]);

        return InventoryResponse::fromResponse($this->validateAndExtractData('GetVoorraadArtikelResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function createDeliveryRequest(DeliveryRequest $request): DeliveryRequestResponse
    {
        $result = $this->doRequest('PutUitslagverzoek', ['UitslagverzoekData' => $request->toRequest()]);

        return DeliveryRequestResponse::fromResponse($this->validateAndExtractData('PutUitslagverzoekResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function deleteDeliveryRequest(int $deliveryId): DeleteDeliveryResponse
    {
        $result = $this->doRequest('DeleteUitslagID', ['UitslagID' => $deliveryId]);

        return DeleteDeliveryResponse::fromResponse($this->validateAndExtractData('DeleteUitslagIDResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getDeliveryRequestStatus(int $deliveryId): DeliveryStatusResponse
    {
        $result = $this->doRequest('GetStatusUitslagID', ['UitslagID' => $deliveryId]);

        return DeliveryStatusResponse::fromResponse($this->validateAndExtractData('GetStatusUitslagIDResult', $result));
    }

    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function getShipmentsByDeliveryRequest(int $deliveryId): SendShipmentsResponse
    {
        $result = $this->doRequest('GetZendingenViaUitslagID', ['UitslagID' => $deliveryId]);

        return SendShipmentsResponse::fromResponse($this->validateAndExtractData('GetZendingenViaUitslagIDResult', $result));
    }
}
