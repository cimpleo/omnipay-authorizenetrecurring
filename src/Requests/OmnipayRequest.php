<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

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

    public function sendRequest($data, $method = 'POST') {
        $data_string = json_encode($data);
        $ch = curl_init($this->getEndpoint());
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
        $response = curl_exec($ch);
        $assoc = json_decode($this->removeBOM($response),true);
        $this->data = $data;
        return $assoc;
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