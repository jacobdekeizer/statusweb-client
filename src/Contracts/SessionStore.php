<?php

namespace JacobDeKeizer\Statusweb\Contracts;

use JacobDeKeizer\Statusweb\Dto\Session;

interface SessionStore
{
    public function put(string $apiKey, Session $session): void;

    public function get(string $apiKey): ?Session;
}