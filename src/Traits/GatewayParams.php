<?php

namespace Omnipay\AuthorizeNetRecurring\Traits;

use Omnipay\Common\Exception\InvalidRequestException;

trait GatewayParams
{

    // Authentification parameters
    public function setAuthName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Auth name must be a string.');
        }
        return $this->setParameter('authName', $value);
    }
    public function getAuthName() {
        return $this->getParameter('authName');
    }
    public function setTransactionKey($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Transaction Key must be a string.');
        }
        return $this->setParameter('transactionKey', $value);
    }
    public function getTransactionKey() {
        return $this->getParameter('transactionKey');
    }

    // Subscription parameters
    public function setRefId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Ref ID must be a string.');
        }
        return $this->setParameter('refId', $value);
    }
    public function getRefId() {
        return $this->getParameter('refId');
    }
    public function setSubscriptionId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Subscription ID must be a string.');
        }
        return $this->setParameter('subscriptionId', $value);
    }
    public function getSubscriptionId() {
        return $this->getParameter('subscriptionId');
    }

    // Customer Profile Id
    public function setCustomerProfileId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Customer Profile Id must be a string.');
        }
        return $this->setParameter('customerProfileId', $value);
    }
    public function getCustomerProfileId() {
        return $this->getParameter('customerProfileId');
    }

    public function setSubscriptionName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Subscription Name must be a string.');
        }
        return $this->setParameter('subscriptionName', $value);
    }
    public function getSubscriptionName() {
        return $this->getParameter('subscriptionName');
    }

    // Schedule
    public function setSchedule($value) {
        if ($value != null && !is_object($value)) {
            throw new InvalidRequestException('Schedule must be an object.');
        }
        return $this->setParameter('schedule', $value);
    }
    public function getSchedule() {
        return $this->getParameter('schedule');
    }

    // Customer
    public function setCustomer($value) {
        if ($value != null && !is_object($value)) {
            throw new InvalidRequestException('Customer must be an object.');
        }
        return $this->setParameter('customer', $value);
    }
    public function getCustomer() {
        return $this->getParameter('customer');
    }

    // Profile
    public function setProfile($value) {
        if ($value != null && !is_object($value)) {
            throw new InvalidRequestException('Profile must be an object.');
        }
        return $this->setParameter('profile', $value);
    }
    public function getProfile() {
        return $this->getParameter('profile');
    }

    // Bank Account
    public function setBankAccount($value) {
        if ($value != null && !is_object($value)) {
            throw new InvalidRequestException('Bank Account must be an object.');
        }
        return $this->setParameter('bankAccount', $value);
    }
    public function getBankAccount() {
        return $this->getParameter('bankAccount');
    }

    // Opaque Data
    public function setOpaqueData($value) {
        if ($value != null && !is_object($value)) {
            throw new InvalidRequestException('Opaque Data must be an object.');
        }
        return $this->setParameter('opaqueData', $value);
    }
    public function getOpaqueData() {
        return $this->getParameter('opaqueData');
    }

    // Order
    public function setOrder($value) {
        if ($value != null && !is_object($value)) {
            throw new InvalidRequestException('Order must be an object.');
        }
        return $this->setParameter('order', $value);
    }
    public function getOrder() {
        return $this->getParameter('order');
    }

    // Amount parameters
    public function setAmount($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Amount must be a string.');
        }
        return $this->setParameter('amount', $value);
    }
    public function getAmount() {
        return $this->getParameter('amount');
    }
    public function setTrialAmount($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Trial Amount must be a string.');
        }
        return $this->setParameter('trialAmount', $value);
    }
    public function getTrialAmount() {
        return $this->getParameter('trialAmount');
    }

    // Bill
    public function setBill($value) {
        if ($value != null && !is_object($value)) {
            throw new InvalidRequestException('Bill must be an object.');
        }
        return $this->setParameter('bill', $value);
    }
    public function getBill() {
        return $this->getParameter('bill');
    }

    // Ship
    public function setShip($value) {
        if ($value != null && !is_object($value)) {
            throw new InvalidRequestException('Ship must be an object.');
        }
        return $this->setParameter('ship', $value);
    }
    public function getShip() {
        return $this->getParameter('ship');
    }

    // Search
    public function setSearch($value) {
        if ($value != null && !is_object($value)) {
            throw new InvalidRequestException('Search must be an object.');
        }
        return $this->setParameter('search', $value);
    }
    public function getSearch() {
        return $this->getParameter('search');
    }

    // Include parameters
    public function setIncludeIssuerInfo($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Include Issuer Info must be a string.');
        }
        return $this->setParameter('includeIssuerInfo', $value);
    }
    public function getIncludeIssuerInfo() {
        return $this->getParameter('includeIssuerInfo');
    }
    public function setIncludeTransactions($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Include Transactions must be a string.');
        }
        return $this->setParameter('includeTransactions', $value);
    }
    public function getIncludeTransactions() {
        return $this->getParameter('includeTransactions');
    }

}