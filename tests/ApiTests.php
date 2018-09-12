<?php

namespace Authomnipay;

use Omnipay\Tests\GatewayTestCase;
use Omnipay\Common\CreditCard;

class ApiTests extends GatewayTestCase
{

    protected function setUp() {
        parent::setUp();
        $this->gateway = new ApiGateway(
            $this->getHttpClient(),
            $this->getHttpRequest()
        );
    }

    public function testAuthorize() {
        $this->gateway->setAuthName('Test');
        $this->gateway->setTransactionKey('123459999954321');
        $this->gateway->setTestMode(true);

        $creditCard = new CreditCard([
            'number' => '4000123412341234',
            'expiryMonth' => '12',
            'expiryYear' => '2020',
            'cvv' => '123',
        ]);

        $transactionId = time();

        $response = $this->gateway->authorize([
            'amount' => '7.99',
            'currency' => 'USD',
            'transactionId' => $transactionId,
            'card' => $creditCard,
        ])->send();
        
        var_dump($response->isSuccessful());
        var_dump($response->getCode());
        var_dump($response->getMessage());
        var_dump($response->getTransactionReference());
    }

    protected function tearDown() {
        $this->gateway = null;
    }

}