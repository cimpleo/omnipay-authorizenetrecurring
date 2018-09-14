<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Common\Exception\InvalidRequestException;

use Omnipay\AuthorizeNetRecurring\Requests\GetSubscriptionRequest;
use Omnipay\AuthorizeNetRecurring\Requests\CreateSubscriptionRequest;
use Omnipay\AuthorizeNetRecurring\Requests\CancelSubscriptionRequest;
use Omnipay\Common\AbstractGateway as OmnipayAbstractGateway;

use Omnipay\AuthorizeNetRecurring\GatewayParams;

class ApiRecurring extends OmnipayAbstractGateway
{

    use GatewayParams;

    //Get Subscription transaction
    public function getSubscription(array $parameters = []) {
        return $this->createRequest(
            GetSubscriptionRequest::class,
            $parameters
        );
    }

    //Create Subscription transaction
    public function createSubscription(array $parameters = []) {
        return $this->createRequest(
            CreateSubscriptionRequest::class,
            $parameters
        );
    }

    //Cancel Subscription transaction
    public function cancelSubscription(array $parameters = []) {
        return $this->createRequest(
            CancelSubscriptionRequest::class,
            $parameters
        );
    }

}