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
        
        $this->setCustomerProfileId($parameters['customerProfileId']);
        $this->setCustomerPaymentProfileId($parameters['customerPaymentProfileId']);
        if (isset($parameters['customerAddressId'])) {
            $this->setCustomerAddressId($parameters['customerAddressId']);
        }
    }

    public function jsonSerialize() {
        $data = [];
        if ($this->hasCustomerProfileId()) {
            $data['customerProfileId'] = $this->getCustomerProfileId();
        }
        if ($this->hasCustomerPaymentProfileId()) {
            $data['customerPaymentProfileId'] = $this->getCustomerPaymentProfileId();
        }
        if ($this->hasCustomerAddressId()) {
            $data['customerAddressId'] = $this->getCustomerAddressId();
        }
        return $data;
    }

    protected function setCustomerProfileId($value) {
        $this->customerProfileId = (string)$value;
    }

    protected function setCustomerPaymentProfileId($value) {
        $this->customerPaymentProfileId = (string)$value;
    }

    protected function setCustomerAddressId($value) {
        $this->customerAddressId = (string)$value;
    }

}