<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class SessionResponse implements Response
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
     * @return SessionResponse
     */
    public function setSessionId(string $sessionId): SessionResponse
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
     * @return SessionResponse
     */
    public function setExpirationDate(string $expirationDate): SessionResponse
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
     * @return SessionResponse
     */
    public static function fromResponse(array $response): Response
    {
        return (new self)
            ->setSessionId($response['SessionID'])
            ->setExpirationDate($response['ExpirationDate']);
    }
}