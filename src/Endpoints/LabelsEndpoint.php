<?php

namespace JacobDeKeizer\Statusweb\Endpoints;

use JacobDeKeizer\Statusweb\Exceptions\StatuswebErrorResponse;
use JacobDeKeizer\Statusweb\Exceptions\StatuswebException;
use JacobDeKeizer\Statusweb\Resources\LabelResponse;

class LabelsEndpoint extends BaseEndpoint
{
    /**
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function get(int $shipmentNumber, int $labelFormat): LabelResponse
    {
        $result = $this->doRequest('GetLabel', [
            'Zendingnummer' => $shipmentNumber,
            'Formaat' => $labelFormat,
        ]);

        return LabelResponse::fromResponse($this->validateAndExtractData('GetLabelResult', $result));
    }
}
