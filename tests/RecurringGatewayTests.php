<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Tests\GatewayTestCase;
use Omnipay\Common\Http\Client;
use Omnipay\Common\CreditCard;

use Academe\AuthorizeNet\Payment\BankAccount;
use Academe\AuthorizeNet\Payment\OpaqueData;
use Academe\AuthorizeNet\Request\Model\Order;

use Omnipay\AuthorizeNetRecurring\Objects\Schedule;
use Omnipay\AuthorizeNetRecurring\Objects\Customer;
use Omnipay\AuthorizeNetRecurring\Objects\Bill;
use Omnipay\AuthorizeNetRecurring\Objects\Ship;
use Omnipay\AuthorizeNetRecurring\Objects\Search;

class RecurringGatewayTests extends GatewayTestCase
{

    protected function setUp() {
        parent::setUp();

        $this->gateway = new RecurringGateway(
            new Client,
            $this->getHttpRequest()
        );

        $this->gateway->setAuthName('7r7C6Zzj');
        $this->gateway->setTransactionKey('6n9B58NDe48qy7Es');
        $this->gateway->setTestMode(true);

/*        $search = new Search([
            'searchType' => 'subscriptionActive',
            'orderBy' => 'id',
            'orderDescending' => 'true',
            'limit' => '100',
            'offset' => '1',
        ]);

        $response = $this->gateway->getSubscriptionList([
            'refId' => '1537181676',
            'search' => $search
        ])->send();

        var_dump($response->getData());
        die;*/

        $schedule = new Schedule([
            'intervalLength' => '10',
            'intervalUnit' => 'days',
            'startDate' => '2020-03-10',
            'totalOccurrences' => '12',
            'trialOccurrences' => '1',
        ]);

        $card = new CreditCard([
            'number' => '4111111111111111',
            'expiryMonth' => '12',
            'expiryYear' => '2020',
            'cvv' => '123',
        ]);

        $bill = new Bill([
            'firstName' => 'Test',
            'lastName' => 'Test'
        ]);

        $response = $this->gateway->createSubscription([
            'subscriptionName' => 'Test Subscription',
            'refId' => '123456',
            'amount' => '7.99',
            'trialAmount' => '0.00',
            'currency' => 'USD',
            'schedule' => $schedule,
            'card' => $card,
            'bill' => $bill,
        ])->send();

        var_dump($response->getData());
        // Array

        var_dump($response->isSuccessful());
        // bool(true)

        var_dump($response->getCode());
        // string(1) "1"

        var_dump($response->getMessage());
        // string(35) "This transaction has been approved."

        var_dump($response->getTransactionReference());
        // string(11) "60103474871"
        die;
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
array(4) {
    ["subscriptionId"]=>
    string(7) "5345233"
    ["profile"]=>
    array(2) {
      ["customerProfileId"]=>
      string(10) "1505288440"
      ["customerPaymentProfileId"]=>
      string(10) "1504568429"
    }
    ["refId"]=>
    string(0) ""
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

*/