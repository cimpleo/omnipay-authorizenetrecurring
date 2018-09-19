<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

class SubscriptionRequest extends AbstractRequest
{

    private function createSubscriptionArray() {
        $subscription = array();
        //Name of Subscription
        if ($this->getSubscriptionName()) {
            $subscription['name'] = $this->getSubscriptionName();
        }
        //Payment Schedule
        if ($this->getScheduleIntervalLength()) {
            $subscription['paymentSchedule']['interval']['length'] = $this->getScheduleIntervalLength();
        }
        if ($this->getScheduleIntervalUnit()) {
            $subscription['paymentSchedule']['interval']['unit'] = $this->getScheduleIntervalUnit();
        }
        if ($this->getScheduleStartDate()) {
            $subscription['paymentSchedule']['startDate'] = $this->getScheduleStartDate();
        }
        if ($this->getScheduleTotalOccurrences()) {
            $subscription['paymentSchedule']['totalOccurrences'] = $this->getScheduleTotalOccurrences();
        }
        if ($this->getScheduleTrialOccurrences()) {
            $subscription['paymentSchedule']['trialOccurrences'] = $this->getScheduleTrialOccurrences();
        }
        //Amount
        if ($this->getAmount()) {
            $subscription['amount'] = $this->getAmount();
        }
        if ($this->getTrialAmount()) {
            $subscription['trialAmount'] = $this->getTrialAmount();
        }
        //Payment - Credit Card
        if ($this->getCardNumber()) {
            $subscription['payment']['creditCard']['cardNumber'] = $this->getCardNumber();
        }
        if ($this->getExpirationDate()) {
            $subscription['payment']['creditCard']['expirationDate'] = $this->getExpirationDate();
        }
        if ($this->getCardCode()) {
            $subscription['payment']['creditCard']['cardCode'] = $this->getCardCode();
        }
        //Payment - Bank Account
        if ($this->getBankAccountType()) {
            $subscription['payment']['bankAccount']['accountType'] = $this->getBankAccountType();
        }
        if ($this->getBankRoutingNumber()) {
            $subscription['payment']['bankAccount']['routingNumber'] = $this->getBankRoutingNumber();
        }
        if ($this->getBankAccountNumber()) {
            $subscription['payment']['bankAccount']['accountNumber'] = $this->getBankAccountNumber();
        }
        if ($this->getBankNameOnAccount()) {
            $subscription['payment']['bankAccount']['nameOnAccount'] = $this->getBankNameOnAccount();
        }
        if ($this->getBankEcheckType()) {
            $subscription['payment']['bankAccount']['echeckType'] = $this->getBankEcheckType();
        }
        if ($this->getBankName()) {
            $subscription['payment']['bankAccount']['bankName'] = $this->getBankName();
        }
        //Payment - Opaque Data
        if ($this->getOpaqueDataDescriptor()) {
            $subscription['payment']['opaqueData']['dataDescriptor'] = $this->getOpaqueDataDescriptor();
        }
        if ($this->getOpaqueDataValue()) {
            $subscription['payment']['opaqueData']['dataValue'] = $this->getOpaqueDataValue();
        }
        //Order
        if ($this->getOrderInvoiceNumber()) {
            $subscription['order']['invoiceNumber'] = $this->getOrderInvoiceNumber();
        }
        if ($this->getOrderDescription()) {
            $subscription['order']['description'] = $this->getOrderDescription();
        }
        //Customer
        if ($this->getCustomerType()) {
            $subscription['customer']['type'] = $this->getCustomerType();
        }
        if ($this->getCustomerId()) {
            $subscription['customer']['id'] = $this->getCustomerId();
        }
        if ($this->getCustomerEmail()) {
            $subscription['customer']['email'] = $this->getCustomerEmail();
        }
        if ($this->getCustomerPhoneNumber()) {
            $subscription['customer']['phoneNumber'] = $this->getCustomerPhoneNumber();
        }
        if ($this->getCustomerFaxNumber()) {
            $subscription['customer']['faxNumber'] = $this->getCustomerFaxNumber();
        }
        //Bill To
        if ($this->getBillToFirstName()) {
            $subscription['billTo']['firstName'] = $this->getBillToFirstName();
        }
        if ($this->getBillToLastName()) {
            $subscription['billTo']['lastName'] = $this->getBillToLastName();
        }
        if ($this->getBillToCompany()) {
            $subscription['billTo']['company'] = $this->getBillToCompany();
        }
        if ($this->getBillToAddress()) {
            $subscription['billTo']['address'] = $this->getBillToAddress();
        }
        if ($this->getBillToCity()) {
            $subscription['billTo']['city'] = $this->getBillToCity();
        }
        if ($this->getBillToState()) {
            $subscription['billTo']['state'] = $this->getBillToState();
        }
        if ($this->getBillToZip()) {
            $subscription['billTo']['zip'] = $this->getBillToZip();
        }
        if ($this->getBillToCountry()) {
            $subscription['billTo']['country'] = $this->getBillToCountry();
        }
        //Ship To
        if ($this->getShipToFirstName()) {
            $subscription['shipTo']['firstName'] = $this->getShipToFirstName();
        }
        if ($this->getShipToLastName()) {
            $subscription['shipTo']['lastName'] = $this->getShipToLastName();
        }
        if ($this->getShipToCompany()) {
            $subscription['shipTo']['company'] = $this->getShipToCompany();
        }
        if ($this->getShipToAddress()) {
            $subscription['shipTo']['address'] = $this->getShipToAddress();
        }
        if ($this->getShipToCity()) {
            $subscription['shipTo']['city'] = $this->getShipToCity();
        }
        if ($this->getShipToState()) {
            $subscription['shipTo']['state'] = $this->getShipToState();
        }
        if ($this->getShipToZip()) {
            $subscription['shipTo']['zip'] = $this->getShipToZip();
        }
        if ($this->getShipToCountry()) {
            $subscription['shipTo']['country'] = $this->getShipToCountry();
        }
        return $subscription;
    }

}