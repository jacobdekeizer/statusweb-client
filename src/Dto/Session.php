<?php

namespace JacobDeKeizer\Statusweb\Dto;

use JacobDeKeizer\Statusweb\Contracts\Dto;

class Session implements Dto
{
    /**
     * @var string
     */
    private $sessionId;

    /**
     * @var string
     */
    private $expirationDate;

    /**
     * @param string $sessionId
     * @return Session
     */
    public function setSessionId(string $sessionId): Session
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    /**
     * @param string $expirationDate
     * @return Session
     */
    public function setExpirationDate(string $expirationDate): Session
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpirationDate(): string
    {
        return $this->expirationDate;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'session_id' => $this->getSessionId(),
            'expiration_date' => $this->getExpirationDate(),
        ];
    }

    /**
     * @inheritDoc
     * @return Session
     */
    public static function fromArray(array $data): Dto
    {
        return (new self)
            ->setSessionId($data['session_id'])
            ->setExpirationDate($data['expiration_date']);
    }
}