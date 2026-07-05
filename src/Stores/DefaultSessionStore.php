<?php

namespace JacobDeKeizer\Statusweb\Stores;

use JacobDeKeizer\Statusweb\Contracts\SessionStore;
use JacobDeKeizer\Statusweb\Dto\Session;

class DefaultSessionStore implements SessionStore
{
    private array $store = [];

    public function put(string $apiKey, Session $session): void
    {
        $this->store[$apiKey] = $session;
    }

    public function get(string $apiKey): ?Session
    {
        return $this->store[$apiKey] ?? null;
    }
}