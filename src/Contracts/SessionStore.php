<?php

namespace JacobDeKeizer\Statusweb\Contracts;

use JacobDeKeizer\Statusweb\Dto\Session;

interface SessionStore
{
    /**
     * @param string $apiKey
     * @param Session $session
     */
    public function put(string $apiKey, Session $session): void;

    /**
     * @param string $apiKey
     * @return Session|null
     */
    public function get(string $apiKey): ?Session;
}