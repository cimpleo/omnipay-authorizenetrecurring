<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Common\Exception\InvalidRequestException;

use Omnipay\AuthorizeNetRecurring\Message\CreateSubscriptionRequest;
use Omnipay\AuthorizeNetRecurring\Message\UpdateSubscriptionRequest;
use Omnipay\AuthorizeNetRecurring\Message\CancelSubscriptionRequest;
use Omnipay\AuthorizeNetRecurring\Message\GetSubscriptionRequest;
use Omnipay\AuthorizeNetRecurring\Message\GetSubscriptionStatusRequest;
use Omnipay\AuthorizeNetRecurring\Message\GetSubscriptionListRequest;
use Omnipay\AuthorizeNetRecurring\Message\GetCustomerRequest;

class RecurringGateway extends AbstractGateway
{

    // Get Name of this API
    public function getName() {
        return 'Authorize.net Recurring API';
    }

    public function createSubscription(array $parameters = []) {
        return $this->createRequest(
            CreateSubscriptionRequest::class,
            $parameters
        );
    }

    public function updateSubscription(array $parameters = []) {
        return $this->createRequest(
            UpdateSubscriptionRequest::class,
            $parameters
        );
    }

    public function cancelSubscription(array $parameters = []) {
        return $this->createRequest(
            CancelSubscriptionRequest::class,
            $parameters
        );
    }

    public function getSubscription(array $parameters = []) {
        return $this->createRequest(
            GetSubscriptionRequest::class,
            $parameters
        );
    }

    public function getSubscriptionStatus(array $parameters = []) {
        return $this->createRequest(
            GetSubscriptionStatusRequest::class,
            $parameters
        );
    }

    public function getSubscriptionList(array $parameters = []) {
        return $this->createRequest(
            GetSubscriptionListRequest::class,
            $parameters
        );
    }

    public function getCustomer(array $parameters = []) {
        return $this->createRequest(
            GetCustomerRequest::class,
            $parameters
        );
    }

}