<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Common\Exception\InvalidRequestException;

use Omnipay\AuthorizeNetRecurring\Requests\SubscriptionRequest;
use Omnipay\Common\AbstractGateway as OmnipayAbstractGateway;

class GatewayRecurring extends AbstractGateway
{

    public function subscription(array $parameters = []) {
        return $this->createRequest(
            SubscriptionRequest::class,
            $parameters
        );
    }

}