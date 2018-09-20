<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\AbstractGateway as OmnipayAbstractGateway;
use Omnipay\AuthorizeNetRecurring\Traits\GatewayParams;

abstract class AbstractGateway extends OmnipayAbstractGateway
{

    use GatewayParams;

    public function getDefaultParameters() {
        return array(
            // API_LOGIN_ID.
            'authName' => '',
            // API_TRANSACTION_KEY.
            'transactionKey' => '',
            // testMode defined as false means sandbox API, true - live API.
            'testMode' => false,
            // Merchant-assigned reference ID for the request.
            'refId' => '',
            // Subscription parameters.
            'subscriptionId' => '',
            'subscriptionName' => '',
            // Amount parameters.
            'amount' => '',
            'trialAmount' => '',
            // Include parameters.
            'includeIssuerInfo' => 'true',
            'includeTransactions' => 'true'
        );
    }

}