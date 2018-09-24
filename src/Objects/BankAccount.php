<?php

namespace Omnipay\AuthorizeNetRecurring\Objects;

use Academe\AuthorizeNet\Payment\BankAccount as AuthorizeNetBankAccount;

class BankAccount extends AuthorizeNetBankAccount
{

    protected $billingFirstName;
    protected $billingLastName;
    protected $billingCompany;
    protected $billingAddress;
    protected $billingCity;
    protected $billingState;
    protected $billingZip;
    protected $billingCountry;

    protected $shippingFirstName;
    protected $shippingLastName;
    protected $shippingCompany;
    protected $shippingAddress;
    protected $shippingCity;
    protected $shippingState;
    protected $shippingZip;
    protected $shippingCountry;

    public function __construct($parameters = null) {
        parent::__construct();

        $this->setAccountType($parameters['accountType']);
        $this->setRoutingNumber($parameters['routingNumber']);
        $this->setAccountNumber($parameters['accountNumber']);
        $this->setNameOnAccount($parameters['nameOnAccount']);
        $this->setEcheckType($parameters['echeckType']);
        $this->setBankName($parameters['bankName']);

        $this->setBillingFirstName($parameters['billingFirstName']);
        $this->setBillingLastName($parameters['billingLastName']);

        if (isset($parameters['billingCompany'])) {
            $this->setBillingCompany($parameters['billingCompany']);
        }
        if (isset($parameters['billingAddress'])) {
            $this->setBillingAddress($parameters['billingAddress']);
        }
        if (isset($parameters['billingCity'])) {
            $this->setBillingCity($parameters['billingCity']);
        }
        if (isset($parameters['billingState'])) {
            $this->setBillingState($parameters['billingState']);
        }
        if (isset($parameters['billingZip'])) {
            $this->setBillingZip($parameters['billingZip']);
        }
        if (isset($parameters['billingCountry'])) {
            $this->setBillingCountry($parameters['billingCountry']);
        }

        if (isset($parameters['shippingFirstName'])) {
            $this->setShippingFirstName($parameters['shippingFirstName']);
        }
        if (isset($parameters['shippingLastName'])) {
            $this->setShippingLastName($parameters['shippingLastName']);
        }
        if (isset($parameters['shippingCompany'])) {
            $this->setShippingCompany($parameters['shippingCompany']);
        }
        if (isset($parameters['shippingAddress'])) {
            $this->setShippingAddress($parameters['shippingAddress']);
        }
        if (isset($parameters['shippingCity'])) {
            $this->setShippingCity($parameters['shippingCity']);
        }
        if (isset($parameters['shippingState'])) {
            $this->setShippingState($parameters['shippingState']);
        }
        if (isset($parameters['shippingZip'])) {
            $this->setShippingZip($parameters['shippingZip']);
        }
        if (isset($parameters['shippingCountry'])) {
            $this->setShippingCountry($parameters['shippingCountry']);
        }
    }

    protected function setBankName($value) {
        $this->bankName = (string)$value;
    }

    protected function setBillingFirstName($value) {
        $this->billingFirstName = (string)$value;
    }

    protected function setBillingLastName($value) {
        $this->billingLastName = (string)$value;
    }

    protected function setBillingCompany($value) {
        $this->billingCompany = (string)$value;
    }

    protected function setBillingAddress($value) {
        $this->billingAddress = (string)$value;
    }

    protected function setBillingCity($value) {
        $this->billingCity = (string)$value;
    }

    protected function setBillingState($value) {
        $this->billingState = (string)$value;
    }

    protected function setBillingZip($value) {
        $this->billingState = (string)$value;
    }

    protected function setBillingCountry($value) {
        $this->billingCountry = (string)$value;
    }

    protected function setShippingFirstName($value) {
        $this->shippingFirstName = (string)$value;
    }

    protected function setShippingLastName($value) {
        $this->shippingLastName = (string)$value;
    }

    protected function setShippingCompany($value) {
        $this->shippingCompany = (string)$value;
    }

    protected function setShippingAddress($value) {
        $this->shippingAddress = (string)$value;
    }

    protected function setShippingCity($value) {
        $this->shippingCity = (string)$value;
    }

    protected function setShippingState($value) {
        $this->shippingState = (string)$value;
    }

    protected function setShippingZip($value) {
        $this->shippingState = (string)$value;
    }

    protected function setShippingCountry($value) {
        $this->shippingCountry = (string)$value;
    }

}