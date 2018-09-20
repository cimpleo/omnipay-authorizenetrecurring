<?php

namespace Omnipay\AuthorizeNetRecurring\Objects;

use Academe\AuthorizeNet\PaymentInterface;
use Academe\AuthorizeNet\AbstractModel;
use Omnipay\Common\Exception\InvalidRequestException;

class Customer extends AbstractModel
{

    protected $type;
    protected $id;
    protected $email;
    protected $phoneNumber;
    protected $faxNumber;

    public function __construct($parameters = null) {
        parent::__construct();
        if (isset($parameters['type'])) {
            $this->setType($parameters['type']);
        }
        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
        }
        if (isset($parameters['email'])) {
            $this->setEmail($parameters['email']);
        }
        if (isset($parameters['phoneNumber'])) {
            $this->setPhoneNumber($parameters['phoneNumber']);
        }
        if (isset($parameters['faxNumber'])) {
            $this->setFaxNumber($parameters['faxNumber']);
        }
    }

    public function jsonSerialize() {
        $data = [
            'type' => $this->getType(),
            'id' => $this->getId(),
            'email' => $this->getEmail(),
            'phoneNumber' => $this->getPhoneNumber(),
            'faxNumber' => $this->getFaxNumber()
        ];
        return $data;
    }

    protected function setType($value) {
        if ($value != 'individual' && $value != 'business') {
            throw new InvalidRequestException('Order Descending must have only this values: "individual", "business".');
        }
        $this->type = $value;
    }
    protected function getType() {
        return $this->type;
    }

    protected function setId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Id must be a string.');
        }
        $this->id = $value;
    }
    protected function getId() {
        return $this->id;
    }

    protected function setEmail($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Email must be a string.');
        }
        $this->email = $value;
    }
    protected function getEmail() {
        return $this->email;
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