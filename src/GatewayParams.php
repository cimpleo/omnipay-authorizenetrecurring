<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Common\Exception\InvalidRequestException;

trait GatewayParams
{

    //Authentification parameters
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

    //Subscription parameters
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
    public function setSubscriptionName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Subscription Name must be a string.');
        }
        return $this->setParameter('subscriptionName', $value);
    }
    public function getSubscriptionName() {
        return $this->getParameter('subscriptionName');
    }

    //Schedule parameters
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

    //Amount parameters
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

    //Card parameters
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
    public function setCardCode($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Card Code must be a string.');
        }
        return $this->setParameter('cardCode', $value);
    }
    public function getCardCode() {
        return $this->getParameter('cardCode');
    }

    //Search Parameters
    public function setSearchType($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Search Type must be a string.');
        }
        return $this->setParameter('searchType', $value);
    }
    public function getSearchType() {
        return $this->getParameter('searchType');
    }
    public function setOrderBy($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Order By must be a string.');
        }
        return $this->setParameter('orderBy', $value);
    }
    public function getOrderBy() {
        return $this->getParameter('orderBy');
    }
    public function setOrderDescending($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Order Descending must be a string.');
        }
        return $this->setParameter('orderDescending', $value);
    }
    public function getOrderDescending() {
        return $this->getParameter('orderDescending');
    }
    public function setLimit($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Limit must be a string.');
        }
        return $this->setParameter('limit', $value);
    }
    public function getLimit() {
        return $this->getParameter('limit');
    }
    public function setOffset($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Offset must be a string.');
        }
        return $this->setParameter('offset', $value);
    }
    public function getOffset() {
        return $this->getParameter('offset');
    }

    //Payment - Bank Account parameters
    public function setBankAccountType($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bank Account Type must be a string.');
        }
        return $this->setParameter('bankAccountType', $value);
    }
    public function getBankAccountType() {
        return $this->getParameter('bankAccountType');
    }
    public function setBankRoutingNumber($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bank Routing Number must be a string.');
        }
        return $this->setParameter('bankRoutingNumber', $value);
    }
    public function getBankRoutingNumber() {
        return $this->getParameter('bankRoutingNumber');
    }
    public function setBankAccountNumber($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bank Account Number must be a string.');
        }
        return $this->setParameter('bankAccountNumber', $value);
    }
    public function getBankAccountNumber() {
        return $this->getParameter('bankAccountNumber');
    }
    public function setBankNameOnAccount($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bank Name On Account must be a string.');
        }
        return $this->setParameter('bankNameOnAccount', $value);
    }
    public function getBankNameOnAccount() {
        return $this->getParameter('bankNameOnAccount');
    }
    public function setBankEcheckType($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bank Echeck Type must be a string.');
        }
        return $this->setParameter('bankEcheckType', $value);
    }
    public function getBankEcheckType() {
        return $this->getParameter('bankEcheckType');
    }
    public function setBankName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bank Name must be a string.');
        }
        return $this->setParameter('bankName', $value);
    }
    public function getBankName() {
        return $this->getParameter('bankName');
    }

    //Payment = Opaque Data parameters
    public function setOpaqueDataDescriptor($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Opaque Data Descriptor must be a string.');
        }
        return $this->setParameter('opaqueDataDescriptor', $value);
    }
    public function getOpaqueDataDescriptor() {
        return $this->getParameter('opaqueDataDescriptor');
    }
    public function setOpaqueDataValue($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Opaque Data Value must be a string.');
        }
        return $this->setParameter('opaqueDataValue', $value);
    }
    public function getOpaqueDataValue() {
        return $this->getParameter('opaqueDataValue');
    }

    //Order parameters
    public function setOrderInvoiceNumber($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Order Invoice Number must be a string.');
        }
        return $this->setParameter('orderInvoiceNumber', $value);
    }
    public function getOrderInvoiceNumber() {
        return $this->getParameter('orderInvoiceNumber');
    }
    public function setOrderDescription($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Order Description must be a string.');
        }
        return $this->setParameter('orderDescription', $value);
    }
    public function getOrderDescription() {
        return $this->getParameter('orderDescription');
    }

    //Customer parameters
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
    public function setCustomerProfileId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Customer Profile Id must be a string.');
        }
        return $this->setParameter('customerProfileId', $value);
    }
    public function getCustomerProfileId() {
        return $this->getParameter('customerProfileId');
    }
    public function setCustomerAddressId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Customer Address Id must be a string.');
        }
        return $this->setParameter('customerAddressId', $value);
    }
    public function getCustomerAddressId() {
        return $this->getParameter('customerAddressId');
    }
    public function setCustomerType($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Customer Type must be a string.');
        }
        return $this->setParameter('customerType', $value);
    }
    public function getCustomerType() {
        return $this->getParameter('customerType');
    }
    public function setCustomerId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Customer ID must be a string.');
        }
        return $this->setParameter('customerId', $value);
    }
    public function getCustomerId() {
        return $this->getParameter('customerId');
    }
    public function setCustomerEmail($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Customer Email must be a string.');
        }
        return $this->setParameter('customerEmail', $value);
    }
    public function getCustomerEmail() {
        return $this->getParameter('customerEmail');
    }
    public function setCustomerPhoneNumber($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Customer Phone Number must be a string.');
        }
        return $this->setParameter('customerPhoneNumber', $value);
    }
    public function getCustomerPhoneNumber() {
        return $this->getParameter('customerPhoneNumber');
    }
    public function setCustomerFaxNumber($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Customer Fax Number must be a string.');
        }
        return $this->setParameter('customerFaxNumber', $value);
    }
    public function getCustomerFaxNumber() {
        return $this->getParameter('customerFaxNumber');
    }

    //Bill To parameters
    public function setBillToFirstName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bill To First Name must be a string.');
        }
        return $this->setParameter('billToFirstName', $value);
    }
    public function getBillToFirstName() {
        return $this->getParameter('billToFirstName');
    }
    public function setBillToLastName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bill To Last Name must be a string.');
        }
        return $this->setParameter('billToLastName', $value);
    }
    public function getBillToLastName() {
        return $this->getParameter('billToLastName');
    }
    public function setBillToCompany($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bill To Company must be a string.');
        }
        return $this->setParameter('billToCompany', $value);
    }
    public function getBillToCompany() {
        return $this->getParameter('billToCompany');
    }
    public function setBillToAddress($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bill To Address must be a string.');
        }
        return $this->setParameter('billToAddress', $value);
    }
    public function getBillToAddress() {
        return $this->getParameter('billToAddress');
    }
    public function setBillToCity($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bill To City must be a string.');
        }
        return $this->setParameter('billToCity', $value);
    }
    public function getBillToCity() {
        return $this->getParameter('billToCity');
    }
    public function setBillToState($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bill To State must be a string.');
        }
        return $this->setParameter('billToState', $value);
    }
    public function getBillToState() {
        return $this->getParameter('billToState');
    }
    public function setBillToZip($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bill To Zip must be a string.');
        }
        return $this->setParameter('billToZip', $value);
    }
    public function getBillToZip() {
        return $this->getParameter('billToZip');
    }
    public function setBillToCountry($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Bill To Country must be a string.');
        }
        return $this->setParameter('billToCountry', $value);
    }
    public function getBillToCountry() {
        return $this->getParameter('billToCountry');
    }

    //Ship To parameters
    public function setShipToFirstName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Ship To First Name must be a string.');
        }
        return $this->setParameter('shipToFirstName', $value);
    }
    public function getShipToFirstName() {
        return $this->getParameter('shipToFirstName');
    }
    public function setShipToLastName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Ship To Last Name must be a string.');
        }
        return $this->setParameter('shipToLastName', $value);
    }
    public function getShipToLastName() {
        return $this->getParameter('shipToLastName');
    }
    public function setShipToCompany($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Ship To Company must be a string.');
        }
        return $this->setParameter('shipToCompany', $value);
    }
    public function getShipToCompany() {
        return $this->getParameter('shipToCompany');
    }
    public function setShipToAddress($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Ship To Address must be a string.');
        }
        return $this->setParameter('shipToAddress', $value);
    }
    public function getShipToAddress() {
        return $this->getParameter('shipToAddress');
    }
    public function setShipToCity($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Ship To City must be a string.');
        }
        return $this->setParameter('shipToCity', $value);
    }
    public function getShipToCity() {
        return $this->getParameter('shipToCity');
    }
    public function setShipToState($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Ship To State must be a string.');
        }
        return $this->setParameter('shipToState', $value);
    }
    public function getShipToState() {
        return $this->getParameter('shipToState');
    }
    public function setShipToZip($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Ship To Zip must be a string.');
        }
        return $this->setParameter('shipToZip', $value);
    }
    public function getShipToZip() {
        return $this->getParameter('shipToZip');
    }
    public function setShipToCountry($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Ship To Country must be a string.');
        }
        return $this->setParameter('shipToCountry', $value);
    }
    public function getShipToCountry() {
        return $this->getParameter('shipToCountry');
    }

    //Include parameters
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