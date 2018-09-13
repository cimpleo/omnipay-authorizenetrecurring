<?php

namespace Authomnipay;

use Omnipay\Omnipay;
use Omnipay\Common\CreditCard;

class AuthorizeNetApi
{

    //Create gateway for Authorize.Net
    public function createGateway(array $parameters = []) {
        if ($parameters['authName'] && $parameters['transactionKey']) {
            $gateway = Omnipay::create('AuthorizeNetApi_Api');
            $gateway->setAuthName($parameters['authName']);
            $gateway->setTransactionKey($parameters['transactionKey']);
            if ($parameters['testMode']) {
                $gateway->setTestMode(true);
            }
            return $gateway;
        }
        return false;
    }

    //Create Credit Card
    public function createCreditCard(array $parameters = []) {
        return new CreditCard($parameters);
    }

    //Authorize or void Subscription at Omnipay
    public function getOmnipay($parameters,$data,$void = false) {
        if ($data['status'] == true) {
            $gateway = $this->createGateway([
                'authName' => $parameters['authName'],
                'transactionKey' => $parameters['transactionKey'],
                'testMode' => $parameters['testMode']
            ]);
            if ($gateway) {
                if ($void == true) {
                    $gateway->void([
                        'transactionId' => $data['transactionId']
                    ])->send();
                }
                else {
                    $gateway->authorize([
                        'amount' => $parameters['amount'],
                        'currency' => $parameters['currency'],
                        'transactionId' => $data['transactionId'],
                        'card' => $this->createCreditCard([
                            'cardNumber' => $parameters['cardNumber'],
                            'cardExpiryMonth' => $parameters['cardExpiryMonth'],
                            'cardExpiryYear' => $parameters['cardExpiryYear'],
                            'cardCvv' => $parameters['cardCvv']
                        ]);
                    ])->send();
                }
                return array(
                    'status' => $response->isSuccessful(),
                    'code' => $response->getCode(),
                    'message' => $response->getMessage(),
                    'reference' => $response->getTransactionReference()
                );
            }
        }
        return array(
            'status' => false,
            'code' => null,
            'message' => $data['message'],
            'reference' => null
        );
    }

}