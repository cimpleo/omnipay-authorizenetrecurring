<?php

namespace Omnipay\AuthorizeNetRecurring\Objects;

use Academe\AuthorizeNet\Request\Model\Customer as AuththorizeNetCustomer;
use Omnipay\Common\Exception\InvalidRequestException;

class Customer extends AuththorizeNetCustomer
{

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
        $data = [
            'type' => $this->getCustomerType(),
            'id' => $this->getId(),
            'email' => $this->getEmail(),
            'phoneNumber' => $this->getPhoneNumber(),
            'faxNumber' => $this->getFaxNumber()
        ];
        return $data;
    }

    protected function setPhoneNumber($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Phone Number must be a string.');
        }
        $this->phoneNumber = $value;
    }
    protected function getPhoneNumber() {
        return $this->phoneNumber;
    }

    protected function setFaxNumber($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Fax Number must be a string.');
        }
        $this->faxNumber = $value;
    }
    protected function getFaxNumber() {
        return $this->faxNumber;
    }

}