<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Tests\GatewayTestCase;

class GatewayRecurringTests extends GatewayTestCase
{

/*string(215) "﻿{"subscriptionId":"5340562","profile":{"customerProfileId":"1505264598","customerPaymentProfileId":"1504544603"},"refId":"123456","messages":{"resultCode":"Ok","message":[{"code":"I00001","text":"Successful."}]}}"
*/

/*string(634) "﻿{"subscription":{"name":"Sample subscription","paymentSchedule":{"interval":{"length":1,"unit":"months"},"startDate":"2020-08-30T00:00:00","totalOccurrences":12,"trialOccurrences":1},"amount":10.29,"trialAmount":0.00,"status":"active","profile":{"paymentProfile":{"customerPaymentProfileId":"1504544603","payment":{"creditCard":{"cardNumber":"XXXX1111","expirationDate":"XXXX"}},"customerType":"individual","billTo":{"firstName":"John","lastName":"Smith"}},"customerProfileId":"1505264598","description":"Profile created by Subscription: 5340562"}},"messages":{"resultCode":"Ok","message":[{"code":"I00001","text":"Successful."}]}}"*/

/*
.array(4) {
  ["subscriptionId"]=>
  string(7) "5340991"
  ["profile"]=>
  array(2) {
    ["customerProfileId"]=>
    string(10) "1505265565"
    ["customerPaymentProfileId"]=>
    string(10) "1504545622"
  }
  ["refId"]=>
  string(10) "1537181674"
  ["messages"]=>
  array(2) {
    ["resultCode"]=>
    string(2) "Ok"
    ["message"]=>
    array(1) {
      [0]=>
      array(2) {
        ["code"]=>
        string(6) "I00001"
        ["text"]=>
        string(11) "Successful."
      }
    }
  }
}
.array(2) {
  ["refId"]=>
  string(10) "1537181676"
  ["messages"]=>
  array(2) {
    ["resultCode"]=>
    string(5) "Error"
    ["message"]=>
    array(1) {
      [0]=>
      array(2) {
        ["code"]=>
        string(6) "E00012"
        ["text"]=>
        string(101) "You have submitted a duplicate of Subscription 5340991. A duplicate subscription will not be created."
      }
    }
  }
}
*/

    protected function setUp() {
        parent::setUp();

        $this->gateway = new GatewayRecurring(
            $this->getHttpClient(),
            $this->getHttpRequest()
        );

        $this->gateway->setAuthName('7r7C6Zzj');
        $this->gateway->setTransactionKey('6n9B58NDe48qy7Es');
        $this->gateway->setTestMode(true);
        
        $this->createSubscription();

        //$this->getSubscription();

        //$this->cancelSubscription();

    }

    protected function createSubscription() {
        $parameters = array(
            'refId' => time().'',
            'subscriptionName' => 'Test Subscription 2',
            'scheduleIntervalLength' => '1',
            'scheduleIntervalUnit' => 'months',
            'scheduleStartDate' => '2020-01-30',
            'scheduleTotalOccurrences' => '12',
            'scheduleTrialOccurrences' => '1',
            'amount' => '11.29',
            'trialAmount' => '0.00',
            'cardNumber' => '4111111111111111',
            'expirationDate' => '2020-12',
            'customerFirstName' => 'Denis',
            'customerLastName' => 'Sidorov'
        );
        $response = $this->gateway->subscription($parameters)->create();
        var_dump($response);
    }

    protected function getSubscription() {
        $parameters = array(
            'id' => '5340562'
        );
        $response = $this->gateway->subscription($parameters)->get();
        var_dump($response);
    }

    protected function cancelSubscription() {
        $parameters = array(
            'id' => '5340562'
        );
        $response = $this->gateway->subscription($parameters)->cancel();
        var_dump($response);
    }

    protected function tearDown() {
        $this->gateway = null;
    }

}