<?php

namespace JacobDeKeizer\Statusweb\Dto;

use JacobDeKeizer\Statusweb\Contracts\Dto;

class Session implements Dto
{
    public function __construct(
        private readonly string $sessionId,
        private readonly string $expirationDate,
    ) {
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getExpirationDate(): string
    {
        return $this->expirationDate;
    }

    public function toArray(): array
    {
        return [
            'session_id' => $this->getSessionId(),
            'expiration_date' => $this->getExpirationDate(),
        ];
    }

    public static function fromArray(array $data): Dto
    {
        return new self(
            $data['session_id'],
            $data['expiration_date'],
        );
    }
}
