<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Common\Exception\InvalidRequestException;

trait GatewayParams
{

    //Get Name of this API
    public function getName() {
        return 'Authorize.net Recurring API';
    }

    public function setAuthName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Auth name must be a string.');
        }
        return $this->setParameter('authName', $value);
    }

    public function getAuthName() {
        return $this->getParameter('authName');
    }

    public function setRefId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Ref ID must be a string.');
        }
        return $this->setParameter('refId', $value);
    }

    public function getRefId() {
        return $this->getParameter('refId');
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

    public function setSignatureKey($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Signature Key must be a string.');
        }
        return $this->setParameter('signatureKey', $value);
    }

    public function getSignatureKey() {
        return $this->getParameter('signatureKey');
    }

    public function setId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('ID must be a string.');
        }
        return $this->setParameter('id', $value);
    }

    public function getId() {
        return $this->getParameter('id');
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

    public function setScheduleIntervalLength($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Schedule Interval Length must be a string.');
        }
        return $this->setParameter('scheduleIntervalLength', $value);
    }

    public function getScheduleIntervalLength() {
        return $this->getParameter('scheduleIntervalLength');
    }

    public function setScheduleIntervalUnit($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Schedule Interval Unit must be a string.');
        }
        return $this->setParameter('scheduleIntervalUnit', $value);
    }

    public function getScheduleIntervalUnit() {
        return $this->getParameter('scheduleIntervalUnit');
    }

    public function getScheduleIntervalDate() {
        return $this->getParameter('scheduleStartDate');
    }

    public function setScheduleStartDate($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Schedule Start Date must be a string.');
        }
        return $this->setParameter('scheduleStartDate', $value);
    }

    public function getScheduleStartDate() {
        return $this->getParameter('scheduleStartDate');
    }

    public function setScheduleTotalOccurrences($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Schedule Total Occurrences must be a string.');
        }
        return $this->setParameter('scheduleTotalOccurrences', $value);
    }

    public function getScheduleTotalOccurrences() {
        return $this->getParameter('scheduleTotalOccurrences');
    }

    public function setScheduleTrialOccurrences($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Schedule Trial Occurrences must be a string.');
        }
        return $this->setParameter('scheduleTrialOccurrences', $value);
    }

    public function getScheduleTrialOccurrences() {
        return $this->getParameter('scheduleTrialOccurrences');
    }

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

    public function setCardNumber($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Card Number must be a string.');
        }
        return $this->setParameter('cardNumber', $value);
    }

    public function getCardNumber() {
        return $this->getParameter('cardNumber');
    }

    public function setExpirationDate($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Expiration Date must be a string.');
        }
        return $this->setParameter('expirationDate', $value);
    }

    public function getExpirationDate() {
        return $this->getParameter('expirationDate');
    }

    public function setCustomerFirstName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Customer First Name must be a string.');
        }
        return $this->setParameter('customerFirstName', $value);
    }

    public function getCustomerFirstName() {
        return $this->getParameter('customerFirstName');
    }

    public function setCustomerLastName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Customer Last Name must be a string.');
        }
        return $this->setParameter('customerLastName', $value);
    }

    public function getCustomerLastName() {
        return $this->getParameter('customerLastName');
    }

}