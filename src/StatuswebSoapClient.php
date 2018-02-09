<?php

namespace jacobdekeizer;

class StatuswebSoapClient extends \SoapClient
{
    function __doRequest($request, $location, $action, $version, $one_way = 0 ) {
        // Here we remove the ns1: prefix and remove the xmlns attribute from the XML envelope.
        $request = str_replace('<ns1:', '<', $request );
        $request = str_replace('</ns1:', '</', $request );
        $request = str_replace('xmlns:ns1', 'xmlns', $request );
        $request = str_replace('SOAP-ENV', 'soap', $request);

        return parent::__doRequest( $request, $location, $action, $version, $one_way = 0 );
    }
}