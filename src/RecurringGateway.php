<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\AbstractGateway as OmnipayAbstractGateway;

use Omnipay\AuthorizeNetRecurring\Requests\SubscriptionRequest;
use Omnipay\AuthorizeNetRecurring\Requests\CustomerRequest;

use Omnipay\AuthorizeNetRecurring\GatewayParams;

class RecurringGateway extends OmnipayAbstractGateway
{

	use GatewayParams;

    public function subscription(array $parameters = []) {
        return $this->createRequest(
            SubscriptionRequest::class,
            $parameters
        );
    }

    public function customer(array $parameters = []) {
        return $this->createRequest(
            CustomerRequest::class,
            $parameters
        );
    }

}