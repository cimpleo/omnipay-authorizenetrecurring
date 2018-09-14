<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;

use Academe\AuthorizeNet\Auth\MerchantAuthentication;
use Academe\AuthorizeNet\TransactionRequestInterface;
use Academe\AuthorizeNet\Request\CreateTransaction;
use Academe\AuthorizeNet\Request\AbstractRequest as ApiAbstractRequest;

use Omnipay\AuthorizeNetRecurring\GatewayParams;

class OmnipayRequest extends OmnipayAbstractRequest
{
    
    use GatewayParams;

    protected $sandbox = 'https://apitest.authorize.net/xml/v1/request.api';
    protected $production = 'https://api.authorize.net/xml/v1/request.api';

    public function getAuth() {
         return new MerchantAuthentication($this->getAuthName(), $this->getTransactionKey());
    }

    public function getEndpoint() {
        if ($this->getTestMode()) {
            return $this->sandbox;
        } else {
            return $this->production;
        }
    }

    public function sendRequest($data, $method = 'POST') {
        $response = $this->httpClient->request(
            $method,
            $this->getEndpoint(),
            array(
                'Content-Type' => 'application/json',
            ),
            json_encode($data)
        );
        return $response;
    }

    public function sendTransaction(TransactionRequestInterface $transaction) {
        $request = $this->wrapTransaction($this->getAuth(), $transaction);
        $request = $request->withRefId($this->getTransactionId());
        return $this->sendMessage($request);
    }

    protected function sendMessage(ApiAbstractRequest $message) {
        $response = $this->sendRequest($message);
        $body = (string)($response->getBody());
        $body = $this->removeBOM($body);
        $data = json_decode($body, true);
        return $data;
    }

    protected function wrapTransaction($auth, $transaction) {
        return new CreateTransaction($auth, $transaction);
    }

    public function removeBOM($string) {
        return preg_replace('/^[\x00-\x1F\x80-\xFF]{1,3}/', '', $string);
    }

}