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
            'authName' => '',
            'transactionKey' => '',

            'refId' => '',
            
            'testMode' => false,
            'signatureKey' => '',
            
            'id' => '',

            'subscriptionName' => '',
            
            'scheduleIntervalLength' => '',
            'scheduleIntervalUnit' => '',
            'scheduleStartDate' => '',
            'scheduleTotalOccurrences' => '',
            'scheduleTrialOccurrences' => '',

            'amount' => '',
            'trialAmount' => '',

            'cardNumber' => '',
            'expirationDate' => '',

            'customerFirstName' => '',
            'customerLastName' => '',
        );
    }

}