<?php

namespace Omnipay\AuthorizeNetRecurring\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;
use Omnipay\AuthorizeNetRecurring\Traits\GatewayParams;

abstract class AbstractRequest extends OmnipayAbstractRequest
{
    use GatewayParams;

    protected $endpointSandbox = 'https://apitest.authorize.net/xml/v1/request.api';
    protected $endpointLive = 'https://api.authorize.net/xml/v1/request.api';

    // Return the relevant endpoint.
    public function getEndpoint() {
        if ($this->getTestMode()) {
            return $this->endpointSandbox;
        } else {
            return $this->endpointLive;
        }
    }

    // Send json Request to the endpoint.
    protected function sendRequest($data, $method = 'POST') {
        $response = $this->httpClient->request(
            $method,
            $this->getEndpoint(),
            array('Content-Type' => 'application/json'),
            json_encode($data)
        );
        return $response;
    }

    // Send the request to the gateway.
    public function sendData($data) {
        $response = $this->sendRequest($data);
        $body = (string)($response->getBody());
        $body = $this->removeBOM($body);
        $data = json_decode($body, true);
        return new Response($this, $data);
    }

    // Strip a Byte Order Mark (BOM) from the start of a string.
    public function removeBOM($string) {
        return preg_replace('/^[\x00-\x1F\x80-\xFF]{1,3}/', '', $string);
    }

}