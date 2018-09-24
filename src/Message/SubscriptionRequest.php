<?php

namespace Omnipay\AuthorizeNetRecurring\Message;

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
        else if (is_object($this->getBankAccount())) {
            $subscription['payment']['bankAccount'] = $this->getBankAccount()->jsonSerialize();
        }
        // Opaque Data fields
        else if (is_object($this->getOpaqueData())) {
            $subscription['payment']['opaqueData'] = $this->getOpaqueData()->jsonSerialize();
        }
        // Order fields
        if (is_object($this->getOrder())) {
            $subscription['order'] = $this->getOrder()->jsonSerialize();
        }
        // Customer fields
        if (is_object($this->getCustomer())) {
            $subscription['customer'] = $this->getCustomer()->jsonSerialize();
        }
        // Profile fields
        if (is_object($this->getProfile())) {
            $subscription['profile'] = $this->getProfile()->jsonSerialize();
        }
        // Bill To and Ship To fields
        if (is_object($this->getCard())) {
            // Bill To fields
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
        else if (is_object($this->getBankAccount())) {
            // Bill To fields
            $subscription['billTo']['firstName'] = $this->getBankAccount()->getBillingFirstName();
            $subscription['billTo']['lastName'] = $this->getBankAccount()->getBillingLastName();
            $subscription['billTo']['company'] = $this->getBankAccount()->getBillingCompany();
            $subscription['billTo']['address'] = $this->getBankAccount()->getBillingAddress();
            $subscription['billTo']['city'] = $this->getBankAccount()->getBillingCity();
            $subscription['billTo']['state'] = $this->getBankAccount()->getBillingState();
            $subscription['billTo']['zip'] = $this->getBankAccount()->getBillingZip();
            $subscription['billTo']['country'] = $this->getBankAccount()->getBillingCountry();
            // Ship To fields
            $subscription['shipTo']['firstName'] = $this->getBankAccount()->getShippingFirstName();
            $subscription['shipTo']['lastName'] = $this->getBankAccount()->getShippingLastName();
            $subscription['shipTo']['company'] = $this->getBankAccount()->getShippingCompany();
            $subscription['shipTo']['address'] = $this->getBankAccount()->getShippingAddress();
            $subscription['shipTo']['city'] = $this->getBankAccount()->getShippingCity();
            $subscription['shipTo']['state'] = $this->getBankAccount()->getShippingState();
            $subscription['shipTo']['zip'] = $this->getBankAccount()->getShippingZip();
            $subscription['shipTo']['country'] = $this->getBankAccount()->getShippingCountry();
        }
        else if (is_object($this->getOpaqueData())) {
            // Bill To fields
            $subscription['billTo']['firstName'] = $this->getOpaqueData()->getBillingFirstName();
            $subscription['billTo']['lastName'] = $this->getOpaqueData()->getBillingLastName();
            $subscription['billTo']['company'] = $this->getOpaqueData()->getBillingCompany();
            $subscription['billTo']['address'] = $this->getOpaqueData()->getBillingAddress();
            $subscription['billTo']['city'] = $this->getOpaqueData()->getBillingCity();
            $subscription['billTo']['state'] = $this->getOpaqueData()->getBillingState();
            $subscription['billTo']['zip'] = $this->getOpaqueData()->getBillingZip();
            $subscription['billTo']['country'] = $this->getOpaqueData()->getBillingCountry();
            // Ship To fields
            $subscription['shipTo']['firstName'] = $this->getOpaqueData()->getShippingFirstName();
            $subscription['shipTo']['lastName'] = $this->getOpaqueData()->getShippingLastName();
            $subscription['shipTo']['company'] = $this->getOpaqueData()->getShippingCompany();
            $subscription['shipTo']['address'] = $this->getOpaqueData()->getShippingAddress();
            $subscription['shipTo']['city'] = $this->getOpaqueData()->getShippingCity();
            $subscription['shipTo']['state'] = $this->getOpaqueData()->getShippingState();
            $subscription['shipTo']['zip'] = $this->getOpaqueData()->getShippingZip();
            $subscription['shipTo']['country'] = $this->getOpaqueData()->getShippingCountry();
        }
        return $subscription;
    }

}