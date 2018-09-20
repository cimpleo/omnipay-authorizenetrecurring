<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

abstract class SubscriptionRequest extends AbstractRequest
{

    public function createSubscriptionArray() {
        $subscription = array();
        // Name of Subscription
        if ($this->getSubscriptionName()) {
            $subscription['name'] = $this->getSubscriptionName();
        }
        if (is_object($this->getSchedule())) {
            $subscription['paymentSchedule'] = $this->getSchedule()->jsonSerialize();
        }
        // Amount
        if ($this->getAmount()) {
            $subscription['amount'] = $this->getAmount();
        }
        if ($this->getTrialAmount()) {
            $subscription['trialAmount'] = $this->getTrialAmount();
        }
        // Credit Card fields
        if (is_object($this->getCard())) {
            $this->getCard()->validate();
            $subscription['payment']['creditCard']['cardNumber'] = $this->getCard()->getNumber();
            $subscription['payment']['creditCard']['expirationDate'] = $this->getCard()->getExpiryYear().'-'.$this->getCard()->getExpiryMonth();
            $subscription['payment']['creditCard']['cardCode'] = $this->getCard()->getCvv();
        }
        // Bank Account fields
        if (is_object($this->getBankAccount())) {
            $subscription['bankAccount'] = $this->getBankAccount()->jsonSerialize();
        }
        // Opaque Data fields
        if (is_object($this->getOpaqueData())) {
            $subscription['opaqueData'] = $this->getOpaqueData()->jsonSerialize();
        }
        // Order fields
        if (is_object($this->getOrder())) {
            $subscription['order'] = $this->getOrder()->jsonSerialize();
        }
        // Customer fields
        if (is_object($this->getCustomer())) {
            $subscription['customer'] = $this->getCustomer()->jsonSerialize();
        }
        // Bill To fields
        if (is_object($this->getBill())) {
            $subscription['billTo'] = $this->getBill()->jsonSerialize();
        }
        // Ship To fields
        if (is_object($this->getShip())) {
            $subscription['shipTo'] = $this->getShip()->jsonSerialize();
        }
        return $subscription;
    }

}