<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Tests\GatewayTestCase;

class RecurringGatewayTests extends GatewayTestCase
{

    protected function setUp() {
        parent::setUp();

        $this->gateway = new RecurringGateway(
            $this->getHttpClient(),
            $this->getHttpRequest()
        );

        $this->gateway->setAuthName('7r7C6Zzj');
        $this->gateway->setTransactionKey('6n9B58NDe48qy7Es');
        $this->gateway->setTestMode(true);

        $response = $this->gateway->getSubscription(
            ['subscriptionId' => '5340991']
        )->send();

        var_dump($response->isSuccessful());
        // bool(true)

        var_dump($response->getCode());
        // string(1) "1"

        var_dump($response->getMessage());
        // string(35) "This transaction has been approved."

        var_dump($response->getTransactionReference());
        // string(11) "60103474871"
        

        //$this->createSubscription();
        //$this->getSubscription();
        //$this->cancelSubscription();

        //$this->getCustomerInfo();
    }

    protected function createSubscription() {
        $parameters = array(
            'refId' => time().'',
            'subscriptionName' => 'Test Subscription 3',
            'scheduleIntervalLength' => '10',
            'scheduleIntervalUnit' => 'days',
            'scheduleStartDate' => '2020-03-10',
            'scheduleTotalOccurrences' => '12',
            'scheduleTrialOccurrences' => '1',

            'amount' => '12.29',
            'trialAmount' => '0.00',
            'cardNumber' => '4111111111111111',
            'expirationDate' => '2020-12',
            
            'billToFirstName' => 'Denis',
            'billToLastName' => 'Sidorov'
        );
        $response = $this->gateway->subscription($parameters)->create();
        var_dump($response);
    }

    protected function getSubscription() {
        $response = $this->gateway->subscription(['subscriptionId' => '5340991'])->get();
        var_dump($response);
    }

    protected function cancelSubscription() {
        $response = $this->gateway->subscription(['subscriptionId' => '5340562'])->cancel();
        var_dump($response);
    }

    protected function tearDown() {
        $this->gateway = null;
    }

}

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
array(4) {
  ["subscriptionId"]=>
  string(7) "5342682"
  ["profile"]=>
  array(2) {
    ["customerProfileId"]=>
    string(10) "1505272217"
    ["customerPaymentProfileId"]=>
    string(10) "1504552441"
  }
  ["refId"]=>
  string(10) "1537268255"
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