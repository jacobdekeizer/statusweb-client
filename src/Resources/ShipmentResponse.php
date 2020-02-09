<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class ShipmentResponse implements Response
{
    /**
     * @var float
     */
    private $transportNumber;

    /**
     * @var string|null
     */
    private $reference;

    /**
     * @var string|null
     */
    private $labels;

    /**
     * @param float $transportNumber
     * @return ShipmentResponse
     */
    public function setTransportNumber(float $transportNumber): ShipmentResponse
    {
        $this->transportNumber = $transportNumber;
        return $this;
    }

    /**
     * @return float
     */
    public function getTransportNumber(): float
    {
        return $this->transportNumber;
    }

    /**
     * @param string|null $reference
     * @return ShipmentResponse
     */
    public function setReference(?string $reference): ShipmentResponse
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $labels
     * @return ShipmentResponse
     */
    public function setLabels(?string $labels): ShipmentResponse
    {
        $this->labels = $labels;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLabels(): ?string
    {
        return $this->labels;
    }

    /**
     * @inheritDoc
     * @return ShipmentResponse
     */
    public static function fromResponse(array $response): Response
    {
        return (new self)
            ->setTransportNumber($response['Vrachtnummer'])
            ->setReference($response['Kenmerk'] ?? null)
            ->setLabels($response['Labels'] ?? null);
    }
}