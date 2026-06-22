<?php

namespace JacobDeKeizer\Statusweb;

use JacobDeKeizer\Statusweb\Contracts\SessionStore;
use JacobDeKeizer\Statusweb\Endpoints;
use JacobDeKeizer\Statusweb\Stores\DefaultSessionStore;
use SoapClient;

class Client
{
    public const SOAP_DOCUMENT = 'https://www.statusweb.nl/StatuswebAPIv6/Service.wso?WSDL';

    private SoapClient $soapClient;
    private SessionStore $sessionStore;
    private Endpoints\SessionEndpoint $sessionEndpoint;
    private Endpoints\ShipmentsEndpoint $shipmentsEndpoint;
    private Endpoints\LabelsEndpoint $labelsEndpoint;
    private Endpoints\WmsEndpoint $wmsEndpoint;
    private string $apiKey;
    private string $password;

    public function __construct()
    {
        $this->soapClient = new SoapClient(self::SOAP_DOCUMENT);
        $this->sessionStore = new DefaultSessionStore();
        $this->sessionEndpoint = new Endpoints\SessionEndpoint($this);
        $this->shipmentsEndpoint = new Endpoints\ShipmentsEndpoint($this);
        $this->labelsEndpoint = new Endpoints\LabelsEndpoint($this);
        $this->wmsEndpoint = new Endpoints\WmsEndpoint($this);
    }

    public function setApiKey(string $apiKey): static
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setSessionStore(SessionStore $sessionStore): static
    {
        $this->sessionStore = $sessionStore;
        return $this;
    }

    public function getSessionStore(): SessionStore
    {
        return $this->sessionStore;
    }

    public function shipments(): Endpoints\ShipmentsEndpoint
    {
        return $this->shipmentsEndpoint;
    }

    public function labels(): Endpoints\LabelsEndpoint
    {
        return $this->labelsEndpoint;
    }

    public function session(): Endpoints\SessionEndpoint
    {
        return $this->sessionEndpoint;
    }

    public function wms(): Endpoints\WmsEndpoint
    {
        return $this->wmsEndpoint;
    }

    public function soap(): SoapClient
    {
        return $this->soapClient;
    }
}
