<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Tests\GatewayTestCase;

class ApiRecurringTests extends GatewayTestCase
{

    protected function setUp() {
        parent::setUp();

        $this->gateway = new ApiRecurring(
            $this->getHttpClient(),
            $this->getHttpRequest()
        );

        $this->gateway->setAuthName('7r7C6Zzj');
        $this->gateway->setTransactionKey('6n9B58NDe48qy7Es');
        $this->gateway->setTestMode(true);
        
        $this->createSubscription();
    }

    protected function createSubscription() {
        $parameters = array(
            'subscriptionName' => 'Test Subscription',
            'scheduleIntervalLength' => '1',
            'scheduleIntervalUnit' => 'months',
            'scheduleStartDate' => '2020-08-30',
            'scheduleTotalOccurrences' => '12',
            'scheduleTrialOccurrences' => '1',
            'amount' => '10.29',
            'trialAmount' => '0.00',
            'cardNumber' => '4111111111111111',
            'expirationDate' => '2020-12',
            'customerFirstName' => 'John',
            'customerLastName' => 'Smith',
        );
        $result = $this->gateway->createSubscription($parameters);
        var_dump($result);
    }

    protected function tearDown() {
        $this->gateway = null;
    }

}