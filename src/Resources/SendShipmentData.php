<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class SendShipmentData implements Response
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
     * @param float $transportNumber
     * @return SendShipmentData
     */
    public function setTransportNumber(float $transportNumber): SendShipmentData
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
     * @return SendShipmentData
     */
    public function setReference(?string $reference): SendShipmentData
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
     * @inheritDoc
     * @return SendShipmentData
     */
    public static function fromResponse(array $response): Response
    {
        return (new self)
            ->setTransportNumber($response['Vrachtnummer'])
            ->setReference($response['Kenmerk'] ?? null);
    }
}