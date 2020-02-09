<?php

namespace JacobDeKeizer\Statusweb;

use JacobDeKeizer\Statusweb\Contracts\SessionStore;
use JacobDeKeizer\Statusweb\Endpoints;
use JacobDeKeizer\Statusweb\Stores\DefaultSessionStore;
use SoapClient;

class Client
{
    public const SOAP_DOCUMENT = 'https://www.statusweb.nl/StatuswebAPIv4/Service.wso?WSDL';

    /**
     * @var SoapClient
     */
    private $soapClient;

    /**
     * @var SessionStore
     */
    private $sessionStore;

    /**
     * @var Endpoints\SessionEndpoint
     */
    private $sessionEndpoint;

    /**
     * @var Endpoints\ShipmentsEndpoint
     */
    private $shipmentsEndpoint;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $password;

    public function __construct()
    {
        $this->soapClient = new SoapClient(self::SOAP_DOCUMENT);
        $this->sessionStore = new DefaultSessionStore();
        $this->sessionEndpoint = new Endpoints\SessionEndpoint($this);
        $this->shipmentsEndpoint = new Endpoints\ShipmentsEndpoint($this);
    }

    /**
     * @param string $apiKey
     * @return Client
     */
    public function setApiKey(string $apiKey): Client
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $password
     * @return Client
     */
    public function setPassword(string $password): Client
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param SessionStore $sessionStore
     * @return Client
     */
    public function setSessionStore(SessionStore $sessionStore): Client
    {
        $this->sessionStore = $sessionStore;
        return $this;
    }

    /**
     * @return SessionStore
     */
    public function getSessionStore(): SessionStore
    {
        return $this->sessionStore;
    }

    /**
     * @return Endpoints\ShipmentsEndpoint
     */
    public function shipments(): Endpoints\ShipmentsEndpoint
    {
        return $this->shipmentsEndpoint;
    }

    /**
     * @return Endpoints\SessionEndpoint
     */
    public function session(): Endpoints\SessionEndpoint
    {
        return $this->sessionEndpoint;
    }

    /**
     * @return SoapClient
     */
    public function soap(): SoapClient
    {
        return $this->soapClient;
    }
}