<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class StatusDataResponse implements Response
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
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $time;

    /**
     * @var int
     */
    private $statusNumber;

    /**
     * @var string
     */
    private $statusDescription;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var int
     */
    private $uid;

    /**
     * @param float $transportNumber
     * @return StatusDataResponse
     */
    public function setTransportNumber(float $transportNumber): StatusDataResponse
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
     * @return StatusDataResponse
     */
    public function setReference(?string $reference): StatusDataResponse
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
     * @param string $date
     * @return StatusDataResponse
     */
    public function setDate(string $date): StatusDataResponse
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $time
     * @return StatusDataResponse
     */
    public function setTime(string $time): StatusDataResponse
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param int $statusNumber
     * @return StatusDataResponse
     */
    public function setStatusNumber(int $statusNumber): StatusDataResponse
    {
        $this->statusNumber = $statusNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusNumber(): int
    {
        return $this->statusNumber;
    }

    /**
     * @param string $statusDescription
     * @return StatusDataResponse
     */
    public function setStatusDescription(string $statusDescription): StatusDataResponse
    {
        $this->statusDescription = $statusDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusDescription(): string
    {
        return $this->statusDescription;
    }

    /**
     * @param string|null $note
     * @return StatusDataResponse
     */
    public function setNote(?string $note): StatusDataResponse
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param int $uid
     * @return StatusDataResponse
     */
    public function setUid(int $uid): StatusDataResponse
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return int
     */
    public function getUid(): int
    {
        return $this->uid;
    }

    /**
     * @inheritDoc
     * @return StatusDataResponse
     */
    public static function fromResponse(array $response): Response
    {
        return (new self)
            ->setTransportNumber($response['Vrachtnummer'])
            ->setReference($response['Kenmerk'] ?? null)
            ->setDate($response['Datum'])
            ->setTime($response['Tijd'])
            ->setStatusNumber($response['StatusNummer'])
            ->setStatusDescription($response['StatusOmschrijving'])
            ->setNote($response['Opmerking'])
            ->setUid($response['UID']);
    }
}