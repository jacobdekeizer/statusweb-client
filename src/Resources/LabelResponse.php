<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class LabelResponse implements Response
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
     * @return LabelResponse
     */
    public function setTransportNumber(float $transportNumber): LabelResponse
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
     * @return LabelResponse
     */
    public function setReference(?string $reference): LabelResponse
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
     * @return LabelResponse
     */
    public function setLabels(?string $labels): LabelResponse
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
     * @return LabelResponse
     */
    public static function fromResponse(array $response): Response
    {
        return (new self)
            ->setTransportNumber($response['Vrachtnummer'])
            ->setReference($response['Kenmerk'] ?? null)
            ->setLabels($response['LabelsEndpoint'] ?? null);
    }
}