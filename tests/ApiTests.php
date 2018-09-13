<?php

namespace Authomnipay;

use Omnipay\Tests\GatewayTestCase;

class ApiTests extends GatewayTestCase
{

    protected function setUp() {
        parent::setUp();
    }

    public function testAuthorize() {
        $api = new ApiOmniwayAuthorize;
        $parameters = array(
            'authName' => '7r7C6Zzj',
            'transactionKey' => '6n9B58NDe48qy7Es',
            'testMode' => true,
            'amount' => '7.99',
            'currency' => 'USD',
            'cardNumber' => '4000123412341234',
            'cardExpiryMonth' => '12',
            'cardExpiryYear' => '2020',
            'cardCvv' => '123',
        );
        $result = $api->createSubscription($parameters);
        var_dump($result);
        die;
    }

    protected function tearDown() {
        return true;
    }

}