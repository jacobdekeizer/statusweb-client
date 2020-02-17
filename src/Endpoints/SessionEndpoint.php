<?php

namespace JacobDeKeizer\Statusweb\Endpoints;

use DateTime;
use JacobDeKeizer\Statusweb\Exceptions\StatuswebErrorResponse;
use JacobDeKeizer\Statusweb\Exceptions\StatuswebException;
use JacobDeKeizer\Statusweb\Resources\SessionResponse;

class SessionEndpoint extends BaseEndpoint
{
    /**
     * @return SessionResponse
     * @throws StatuswebErrorResponse
     * @throws StatuswebException
     */
    public function get(): SessionResponse
    {
        $result = $this->doRequest('GetSessionId', [
            'ApiKey' => $this->client->getApiKey(),
            'Wachtwoord' => $this->client->getPassword(),
        ], false);

        $data = $this->validateAndExtractData('GetSessionIDResult', $result);

        $data['ExpirationDate'] = (new DateTime)
            ->modify('+1 hour 55 minutes') // keep safe 5 minute margin
            ->format('Y-m-d H:i:s');

        return SessionResponse::fromResponse($data);
    }
}