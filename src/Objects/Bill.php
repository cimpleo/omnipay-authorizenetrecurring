<?php

namespace Omnipay\AuthorizeNetRecurring\Objects;

use Academe\AuthorizeNet\PaymentInterface;
use Academe\AuthorizeNet\AbstractModel;
use Omnipay\Common\Exception\InvalidRequestException;

class Bill extends AbstractModel
{

    protected $firstName;
    protected $lastName;
    protected $company;
    protected $address;
    protected $city;
    protected $state;
    protected $zip;
    protected $country;

    public function __construct($parameters = null) {
        parent::__construct();
        if (isset($parameters['firstName'])) {
            $this->setFirstName($parameters['firstName']);
        }
        if (isset($parameters['lastName'])) {
            $this->setLastName($parameters['lastName']);
        }
        if (isset($parameters['company'])) {
            $this->setCompany($parameters['company']);
        }
        if (isset($parameters['address'])) {
            $this->setAddress($parameters['address']);
        }
        if (isset($parameters['city'])) {
            $this->setCity($parameters['city']);
        }
        if (isset($parameters['state'])) {
            $this->setState($parameters['state']);
        }
        if (isset($parameters['zip'])) {
            $this->setZip($parameters['zip']);
        }
        if (isset($parameters['country'])) {
            $this->setCountry($parameters['country']);
        }
    }

    public function jsonSerialize() {
        $data = [
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'company' => $this->getCompany(),
            'address' => $this->getAddress(),
            'city' => $this->getCity(),
            'state' => $this->getState(),
            'zip' => $this->getZip(),
            'country' => $this->getCountry(),
        ];
        return $data;
    }

    protected function setFirstName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('First name must be a string.');
        }
        $this->firstName = $value;
    }
    protected function getFirstName() {
        return $this->firstName;
    }

    protected function setLastName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Last name must be a string.');
        }
        $this->lastName = $value;
    }
    protected function getLastName() {
        return $this->lastName;
    }

    protected function setCompany($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Company must be a string.');
        }
        $this->company = $value;
    }
    protected function getCompany() {
        return $this->company;
    }

    protected function setAddress($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Address must be a string.');
        }
        $this->address = $value;
    }
    protected function getAddress() {
        return $this->address;
    }

    protected function setCity($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('City must be a string.');
        }
        $this->city = $value;
    }
    protected function getCity() {
        return $this->city;
    }

    protected function setState($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('State must be a string.');
        }
        $this->state = $value;
    }
    protected function getState() {
        return $this->state;
    }

    protected function setZip($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Zip must be a string.');
        }
        $this->zip = $value;
    }
    protected function getZip() {
        return $this->zip;
    }

    protected function setCountry($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Country must be a string.');
        }
        $this->country = $value;
    }
    protected function getCountry() {
        return $this->country;
    }


}