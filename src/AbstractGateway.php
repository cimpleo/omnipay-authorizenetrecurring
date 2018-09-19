<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\AbstractGateway as OmnipayAbstractGateway;
use Omnipay\AuthorizeNetRecurring\GatewayParams;

abstract class AbstractGateway extends OmnipayAbstractGateway
{

    use GatewayParams;

    public function getDefaultParameters() {
        return array(
            //API_LOGIN_ID:
            'authName' => '',
            //API_TRANSACTION_KEY:
            'transactionKey' => '',
            //testMode defined as false means sandbox API, true - production API.
            'testMode' => false,
            //Merchant-assigned reference ID for the request.
            'refId' => '',
            //Subscription parameters
            'subscriptionId' => '',
            'subscriptionName' => '',
            //Schedule parameters
            'scheduleIntervalLength' => '',
            'scheduleIntervalUnit' => '',
            'scheduleStartDate' => '',
            'scheduleTotalOccurrences' => '',
            'scheduleTrialOccurrences' => '',
            //Amount parameters
            'amount' => '',
            'trialAmount' => '',
            //Payment - Card parameters
            'cardNumber' => '',
            'expirationDate' => '',
            'cardCode' => '',
            //Payment - Bank Account parameters
            'BankAccountType' => '',
            'BankRoutingNumber' => '',
            'BankAccountNumber' => '',
            'BankNameOnAccount' => '',
            'BankEcheckType' => '',
            'BankName' => '',
            //Payment = Opaque Data parameters
            'opaqueDataDescriptor' => '',
            'opaqueDataValue' => '',
            //Order parameters
            'orderInvoiceNumber' => '',
            'orderDescription' => '',
            //Customer parameters
            'customerFirstName' => '',
            'customerLastName' => '',
            'customerProfileId' => '',           
            'customerAddressId' => '',
            'customerType' => '',
            'customerId' => '',
            'customerEmail' => '',
            'customerPhoneNumber' => '',
            'customerFaxNumber' => '',
            //Bill parameters
            'billToFirstName' => '',
            'billToLastName' => '',
            'billToCompany' => '',
            'billToAddress' => '',
            'billToCity' => '',
            'billToState' => '',
            'billToZip' => '',
            'billToCountry' => '',
            //Ship parameters
            'shipToFirstName' => '',
            'shipToLastName' => '',
            'shipToCompany' => '',
            'shipToAddress' => '',
            'shipToCity' => '',
            'shipToState' => '',
            'shipToZip' => '',
            'shipToCountry' => '',
            //Include parameters
            'includeIssuerInfo' => 'true',
            'includeTransactions' => 'true'
        );
    }

    protected function createRequest($class, array $parameters) {
        $obj = new $class($this->getDefaultHttpClient(), $this->httpRequest);
        return $obj->initialize(array_replace($this->getParameters(), $parameters));
    }

}