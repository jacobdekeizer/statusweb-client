<?php

namespace JacobDeKeizer\Statusweb\Endpoints;

use JacobDeKeizer\Statusweb\Exceptions\StatuswebErrorResponse;
use JacobDeKeizer\Statusweb\Exceptions\StatuswebException;
use JacobDeKeizer\Statusweb\Resources\LabelResponse;

class LabelsEndpoint extends BaseEndpoint
{
    /**
     * @param float $transportNumber
     * @param int $labelFormat
     * @return LabelResponse
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function get(float $transportNumber, int $labelFormat): LabelResponse
    {
        $result = $this->doRequest('GetLabel', [
            'Vrachtnummer' => $transportNumber,
            'Formaat' => $labelFormat,
        ]);

        return LabelResponse::fromResponse($this->validateAndExtractData('GetLabelResult', $result));
    }
}