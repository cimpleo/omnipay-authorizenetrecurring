<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

use Omnipay\Common\Http\Client as HttpClient;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;

use Omnipay\AuthorizeNetRecurring\GatewayParams;

class OmnipayRequest extends OmnipayAbstractRequest
{
    
    use GatewayParams;

    protected $sandbox = 'https://apitest.authorize.net/xml/v1/request.api';
    protected $production = 'https://api.authorize.net/xml/v1/request.api';

    protected $data;

    public function getEndpoint() {
        if ($this->getTestMode()) {
            return $this->sandbox;
        } else {
            return $this->production;
        }
    }

    protected function sendRequest($data, $method = 'POST') {
        try {
            $this->httpClient = new HttpClient;
            $response = $this->httpClient->request(
                $method,
                $this->getEndpoint(),
                array('Content-Type' => 'application/json'),
                json_encode($data)
            );
            $body = (string)($response->getBody());
            $body = $this->removeBOM($body);
            $this->data = json_decode($body, true);
            return $this->data;
        } catch (\Exception $e) {
            throw new InvalidRequestException($e->getMessage());
        }
    }

    public function removeBOM($string) {
        return preg_replace('/^[\x00-\x1F\x80-\xFF]{1,3}/', '', $string);
    }

    public function getData() {
        return $this->data;
    }

    public function sendData($data) {
        return $this->sendRequest($data);
    }

}