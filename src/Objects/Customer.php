<?php

namespace Omnipay\AuthorizeNetRecurring\Objects;

use Academe\AuthorizeNet\Request\Model\Customer as AuththorizeNetCustomer;
use Academe\AuthorizeNet\AbstractModel;

class Customer extends AbstractModel
{
    
    const CUSTOMER_TYPE_INDIVIDUAL = 'individual';
    const CUSTOMER_TYPE_BUSINESS = 'business';

    protected $customerType;
    protected $id;
    protected $email;
    protected $phoneNumber;
    protected $faxNumber;

    public function __construct($parameters = null) {
        parent::__construct();

        $this->setCustomerType($parameters['type']);
        $this->setId($parameters['id']);
        $this->setEmail($parameters['email']);
        $this->setPhoneNumber($parameters['phoneNumber']);
        $this->setFaxNumber($parameters['faxNumber']);
    }

    public function jsonSerialize() {
        $data = [];
        if ($this->hasCustomerType()) {
            $data['type'] = $this->getCustomerType();
        }
        if ($this->hasId()) {
            $data['id'] = $this->getId();
        }
        if ($this->hasEmail()) {
            $data['email'] = $this->getEmail();
        }
        if ($this->hasPhoneNumber()) {
            $data['phoneNumber'] = $this->getPhoneNumber();
        }
        if ($this->hasFaxNumber()) {
            $data['faxNumber'] = $this->getFaxNumber();
        }
        return $data;
    }

    protected function setCustomerType($value) {
        $this->assertValueCustomerType($value);
        $this->customerType = $value;
    }

    protected function setId($value) {
        $this->id = (string)$value;
    }

    protected function setEmail($value) {
        $this->email = (string)$value;
    }

    protected function setPhoneNumber($value) {
        $this->phoneNumber = (string)$value;
    }

    protected function setFaxNumber($value) {
        $this->faxNumber = (string)$value;
    }

}