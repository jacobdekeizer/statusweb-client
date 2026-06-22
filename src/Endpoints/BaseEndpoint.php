<?php

namespace JacobDeKeizer\Statusweb\Endpoints;

use DateTime;
use JacobDeKeizer\Statusweb\Client;
use JacobDeKeizer\Statusweb\Dto\Session;
use JacobDeKeizer\Statusweb\Enums\ResponseCode;
use JacobDeKeizer\Statusweb\Exceptions\StatuswebErrorResponse;
use JacobDeKeizer\Statusweb\Exceptions\StatuswebException;
use Throwable;

abstract class BaseEndpoint
{
    public function __construct(protected Client $client)
    {
    }

    protected function doRequest(string $endpoint, array $data = [], bool $authentication = true): array
    {
        if ($authentication) {
            $data['SessionID'] = $this->login();
        }

        try {
            return json_decode(json_encode($this->client->soap()->$endpoint($data)), true);
        } catch (Throwable $throwable) {
            throw StatuswebException::fromPrevious('Error executing api call', $throwable);
        }
    }

    protected function validateAndExtractData(string $key, array $result): array
    {
        $data = $result[$key] ?? [];

        $this->validateResponse($data);

        return $data;
    }

    protected function validateResponse(array $data): void
    {
        if (array_key_exists('Errorcode', $data) === false) {
            throw new StatuswebException('Invalid response: ' . json_encode($data));
        }

        if ($data['Errorcode'] !== ResponseCode::OK) {
            throw StatuswebErrorResponse::fromCode($data['Errorcode'], $data['Errorstring'] ?? '');
        }
    }

    private function login(): string
    {
        $store = $this->client->getSessionStore();

        $session = $store->get($this->client->getApiKey());

        if ($session === null || new DateTime() > new DateTime($session->getExpirationDate())) {
            $sessionResponse = $this->client->session()->get();

            $session = (new Session)
                ->setExpirationDate($sessionResponse->getExpirationDate())
                ->setSessionId($sessionResponse->getSessionId());

            $store->put($this->client->getApiKey(), $session);
        }

        return $session->getSessionId();
    }
}
