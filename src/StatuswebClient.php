<?php
namespace jacobdekeizer;

use jacobdekeizer\Entities\Address;
use jacobdekeizer\Entities\DeleteShipmentResponse;
use jacobdekeizer\Entities\ETAResponse;
use jacobdekeizer\Entities\LabelData;
use jacobdekeizer\Entities\LabelResponse;
use jacobdekeizer\Entities\SendShipmentsResponse;
use jacobdekeizer\Entities\Shipment;
use jacobdekeizer\Entities\ShipmentResponse;
use jacobdekeizer\Entities\ShipmentRow;
use jacobdekeizer\Entities\StatusResponse;

class StatuswebClient
{
    const URL = 'https://www.statusweb.nl/statusXML/service.wso?WSDL';

    private $credentials;
    private $client;

    /**
     * StatuswebClient constructor.
     *
     * @param int $transportNumber
     * @param int $customerNumber
     * @param string $password
     */
    public function __construct($transportNumber, $customerNumber, $password)
    {
        $this->credentials = [
            'Klantnr' => $customerNumber,
            'Transporteur' => $transportNumber,
            'Wachtwoord' => $password,
        ];

        $this->client = new StatuswebSoapClient(self::URL);
    }

    /**
     * Creates a shipment
     *
     * @param Shipment $shipment
     * @param Address $deliveryAddress
     * @param array $shipmentRows
     * @param LabelData $labelData
     * @param bool $directSend
     * @return ShipmentResponse
     */
    public function createShipment(Shipment $shipment, Address $deliveryAddress, array $shipmentRows, LabelData $labelData, $directSend = false)
    {
        $data = array(
            'Losadres' => $deliveryAddress->getData(),
            'Labeldefinitie' => $labelData->getData(),
            'Zendingregels' => ['ZendingregelData' => []],
            'DirectSend' => $directSend ?  1 : 0
        );

        /** @var ShipmentRow $shipmentRow */
        foreach ($shipmentRows as $shipmentRow) {
            $data['Zendingregels']['ZendingregelData'][] = $shipmentRow->getData();
        }

        $data = array_merge($data,  $shipment->getData());

        $data = ['Zending' => $data];
        $data = array_merge($data, $this->credentials);

        $response = $this->client->PutZending2($data);

        return new ShipmentResponse((array)$response->PutZending2Result);
    }

    /**
     * Delete a shipment
     *
     * @param $transportNumber
     * @return DeleteShipmentResponse
     */
    public function deleteShipment($transportNumber)
    {
        $data = [
            'Vrachtnummer' => $transportNumber
        ];
        $data = array_merge($data, $this->credentials);

        $response = $this->client->DeleteZending($data);
        return new DeleteShipmentResponse((array)$response->DeleteZendingResult);
    }

    /**
     * Send all ready shipments
     *
     * @return SendShipmentsResponse
     */
    public function sendShipments()
    {
        $response = $this->client->Send($this->credentials);
        return new SendShipmentsResponse((array)$response->SendResult);
    }

    /**
     * Get label response
     *
     * @param $transportNumber
     * @param $kenmerk
     * @return LabelResponse
     */
    public function getLabel($transportNumber, $kenmerk = null)
    {
        $data = [
            'Vrachtnummer' => $transportNumber,
            'Kenmerk' => $kenmerk,
            'Formaat' => 0 //PDF in base 64
        ];
        $data = array_merge($data, $this->credentials);

        $response = $this->client->GetLabel($data);
        return new LabelResponse((array)$response->GetLabelResult);
    }

    /**
     * Get statuses
     * Only works if shipments are transporting/arrived
     *
     * @return StatusResponse
     */
    public function getStatuses()
    {
        $data = [
            'Mark' => date("Y-m-d H:i:s")
        ];
        $data = array_merge($data, $this->credentials);

        $response = $this->client->GetStatus_V2($data);
        return new StatusResponse((array)$response->GetStatus_V2Result);
    }

    /**
     * Get status from transport number
     * Only works if shipment is transporting/arrived
     *
     * @param $transportNumber
     * @return StatusResponse
     */
    public function getStatus($transportNumber)
    {
        $data  = [
            'Vrachtnummer' => $transportNumber
        ];
        $data = array_merge($data, $this->credentials);

        $response = $this->client->GetStatusVrachtnummer_V2($data);
        return new StatusResponse((array)$response->GetStatusVrachtnummer_V2Result);
    }

    /**
     * Get estimated time of arrival
     * Only works if shipment is in transport/arrived
     *
     * @param $transportNumber
     * @return ETAResponse
     */
    public function getETA($transportNumber)
    {
        $data  = [
            'Vrachtnummer' => $transportNumber
        ];
        $data = array_merge($data, $this->credentials);

        $response = $this->client->GetETAVrachtnummer($data);
        return new ETAResponse((array)$response->GetETAVrachtnummerResult);
    }
}