<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Common\Exception\InvalidRequestException;

use Omnipay\AuthorizeNetRecurring\Requests\CreateSubscriptionRequest;
use Omnipay\AuthorizeNetRecurring\Requests\CreateSubscriptionFromProfileRequest;
use Omnipay\AuthorizeNetRecurring\Requests\UpdateSubscriptionRequest;
use Omnipay\AuthorizeNetRecurring\Requests\CancelSubscriptionRequest;
use Omnipay\AuthorizeNetRecurring\Requests\GetSubscriptionRequest;
use Omnipay\AuthorizeNetRecurring\Requests\GetSubscriptionStatusRequest;
use Omnipay\AuthorizeNetRecurring\Requests\GetSubscriptionListRequest;
use Omnipay\AuthorizeNetRecurring\Requests\GetCustomerRequest;

class RecurringGateway extends AbstractGateway
{

    //Get Name of this API
    public function getName() {
        return 'Authorize.net Recurring API';
    }

    public function createSubscription(array $parameters = []) {
        return $this->createRequest(
            CreateSubscriptionRequest::class,
            $parameters
        );
    }

    public function createSubscriptionFromProfile(array $parameters = []) {
        return $this->createRequest(
            CreateSubscriptionFromProfileRequest::class,
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