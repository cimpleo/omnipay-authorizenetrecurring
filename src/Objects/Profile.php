<?php

namespace Omnipay\AuthorizeNetRecurring\Objects;

use Academe\AuthorizeNet\PaymentInterface;
use Academe\AuthorizeNet\AbstractModel;
use Omnipay\Common\Exception\InvalidRequestException;

class Profile extends AbstractModel
{

    protected $customerProfileId;
    protected $customerPaymentProfileId;
    protected $customerAddressId;

    public function __construct($parameters = null) {
        parent::__construct();
        if (isset($parameters['customerProfileId'])) {
            $this->setCustomerProfileId($parameters['customerProfileId']);
        }
        if (isset($parameters['customerPaymentProfileId'])) {
            $this->setCustomerPaymentProfileId($parameters['customerPaymentProfileId']);
        }
        if (isset($parameters['customerAddressId'])) {
            $this->setCustomerAddressId($parameters['customerAddressId']);
        }
    }

    public function jsonSerialize() {
        $data = array(
            'customerProfileId' => $this->getCustomerProfileId(),
            'customerPaymentProfileId' => $this->getCustomerPaymentProfileId(),
            'customerAddressId' => $this->getCustomerAddressId(),
        );
        return $data;
    }

    protected function setCustomerProfileId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Interval Length must be a string.');
        }
        $this->customerProfileId = $value;
    }
    protected function getCustomerProfileId() {
        return $this->customerProfileId;
    }

    protected function setCustomerPaymentProfileId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Interval Length must be a string.');
        }
        $this->customerPaymentProfileId = $value;
    }
    protected function getCustomerPaymentProfileId() {
        return $this->customerPaymentProfileId;
    }

    protected function setCustomerAddressId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Start Date must be a string.');
        }
        $this->customerAddressId = $value;
    }
    protected function getCustomerAddressId() {
        return $this->customerAddressId;
    }

}