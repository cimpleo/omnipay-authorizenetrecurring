<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;

use Academe\AuthorizeNet\Auth\MerchantAuthentication;
use Academe\AuthorizeNet\TransactionRequestInterface;
use Academe\AuthorizeNet\Request\CreateTransaction;
use Academe\AuthorizeNet\Request\Transaction\VoidTransaction;

use Academe\AuthorizeNet\Request\AbstractRequest as ApiAbstractRequest;
use Omnipay\AuthorizeNetRecurring\Traits\GatewayParams;

abstract class AbstractRequest extends OmnipayAbstractRequest
{
    use GatewayParams;

    protected $endpointSandbox = 'https://apitest.authorize.net/xml/v1/request.api';
    protected $endpointLive = 'https://api.authorize.net/xml/v1/request.api';

    // Get the authentication credentials object.
    public function getAuth() {
        return new MerchantAuthentication($this->getAuthName(), $this->getTransactionKey());
    }

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

    // Send a transaction and return the decoded data.
    protected function sendTransaction(TransactionRequestInterface $transaction) {
        $request = $this->wrapTransaction($this->getAuth(), $transaction);
        $request = $request->withRefId($this->getTransactionId());
        return $this->sendMessage($request);
    }

    // Wrap the transaction detail into a full request for an action on the transaction.
    protected function wrapTransaction($auth, $transaction) {
        return new CreateTransaction($auth, $transaction);
    }

    // Send the request to the gateway.
    protected function sendMessage(ApiAbstractRequest $message) {
        $response = $this->sendRequest($message);
        $body = (string)($response->getBody());
        $body = $this->removeBOM($body);
        $data = json_decode($body, true);
        return $data;
    }

    // Send the request to the gateway without transaction.
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