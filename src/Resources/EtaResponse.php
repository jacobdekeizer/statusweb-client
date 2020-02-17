<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class EtaResponse implements Response
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $until;

    /**
     * @param string $from
     * @return EtaResponse
     */
    public function setFrom(string $from): EtaResponse
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $until
     * @return EtaResponse
     */
    public function setUntil(string $until): EtaResponse
    {
        $this->until = $until;
        return $this;
    }

    /**
     * @return string
     */
    public function getUntil(): string
    {
        return $this->until;
    }

    /**
     * @inheritDoc
     * @return EtaResponse
     */
    public static function fromResponse(array $response): Response
    {
        return (new self)
            ->setFrom($response['ETA_Van'])
            ->setUntil($response['ETA_Tot']);
    }
}