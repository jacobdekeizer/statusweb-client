<?php

namespace JacobDeKeizer\Statusweb\Dto;

class Session
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
}