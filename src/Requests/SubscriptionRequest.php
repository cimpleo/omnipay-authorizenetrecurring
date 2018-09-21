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
        // Bill To and Ship To fields
        if (is_object($this->getCard())) {
            $subscription['billTo']['firstName'] = $this->getCard()->getBillingFirstName();
            $subscription['billTo']['lastName'] = $this->getCard()->getBillingLastName();
            $subscription['billTo']['company'] = $this->getCard()->getBillingCompany();
            $subscription['billTo']['address'] = trim($this->getCard()->getBillingAddress1().' '.$this->getCard()->getBillingAddress2());
            $subscription['billTo']['city'] = $this->getCard()->getBillingCity();
            $subscription['billTo']['state'] = $this->getCard()->getBillingState();
            $subscription['billTo']['zip'] = $this->getCard()->getBillingPostcode();
            $subscription['billTo']['country'] = $this->getCard()->getBillingCountry();
            // Ship To fields
            $subscription['shipTo']['firstName'] = $this->getCard()->getShippingFirstName();
            $subscription['shipTo']['lastName'] = $this->getCard()->getShippingLastName();
            $subscription['shipTo']['company'] = $this->getCard()->getShippingCompany();
            $subscription['shipTo']['address'] = trim($this->getCard()->getBillingAddress1().' '.$this->getCard()->getBillingAddress2());
            $subscription['shipTo']['city'] = $this->getCard()->getShippingCity();
            $subscription['shipTo']['state'] = $this->getCard()->getShippingState();
            $subscription['shipTo']['zip'] = $this->getCard()->getShippingPostcode();
            $subscription['shipTo']['country'] = $this->getCard()->getShippingCountry();
        }
        return $subscription;
    }

}