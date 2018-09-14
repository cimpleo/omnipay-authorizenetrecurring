<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Common\Exception\InvalidRequestException;

trait GatewayParams
{

    //Get Name of this API
    public function getName() {
        return 'Authorize.net Recurring API';
    }

    public function getDefaultParameters() {
        return array(
            'authName' => '',
            'transactionKey' => '',
            'refId' => '',
            'testMode' => false,
            'signatureKey' => '',
        );
    }

    //The application auth name
    public function setAuthName($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Auth name must be a string.');
        }
        return $this->setParameter('authName', $value);
    }

    public function getAuthName() {
        return $this->getParameter('authName');
    }

    //The ref ID
    public function setRefId($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Ref ID must be a string.');
        }
        return $this->setParameter('refId', $value);
    }

    public function getRefId() {
        return $this->getParameter('refId');
    }

    //The application auth transaction key
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