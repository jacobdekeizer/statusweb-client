<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class StatusData implements Response
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
     * @return StatusData
     */
    public function setTransportNumber(float $transportNumber): StatusData
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
     * @return StatusData
     */
    public function setReference(?string $reference): StatusData
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
     * @return StatusData
     */
    public function setDate(string $date): StatusData
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
     * @return StatusData
     */
    public function setTime(string $time): StatusData
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
     * @return StatusData
     */
    public function setStatusNumber(int $statusNumber): StatusData
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
     * @return StatusData
     */
    public function setStatusDescription(string $statusDescription): StatusData
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
     * @return StatusData
     */
    public function setNote(?string $note): StatusData
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
     * @return StatusData
     */
    public function setUid(int $uid): StatusData
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
     * @return StatusData
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