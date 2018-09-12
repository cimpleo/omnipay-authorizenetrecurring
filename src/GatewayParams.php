<?php

namespace Authomnipay;

use Omnipay\Common\Exception\InvalidRequestException;

trait GatewayParams
{

    public function getName() {
        return 'Authomnipay API';
    }

    public function getShortName() {
        return 'API';
    }

    public function setAuthName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Auth name must be a string.');
        }
        return $this->setParameter('authName', $value);
    }

    public function getAuthName() {
        return $this->getParameter('authName');
    }

    public function setMobileDeviceId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Mobile device ID must be a string.');
        }
        return $this->setParameter('mobileDeviceId', $value);
    }

    public function getMobileDeviceId() {
        return $this->getParameter('mobileDeviceId');
    }

    public function setRefId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Ref ID must be a string.');
        }
        return $this->setParameter('refId', $value);
    }

    public function getRefId() {
        return $this->getParameter('refId');
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

    public function setSignatureKey($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Signature Key must be a string.');
        }
        return $this->setParameter('signatureKey', $value);
    }

    public function getSignatureKey() {
        return $this->getParameter('signatureKey');
    }

}