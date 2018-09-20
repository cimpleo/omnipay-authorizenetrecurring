<?php

namespace Omnipay\AuthorizeNetRecurring\Objects;

use Academe\AuthorizeNet\PaymentInterface;
use Academe\AuthorizeNet\AbstractModel;
use Omnipay\Common\Exception\InvalidRequestException;

class Search extends AbstractModel
{

    protected $searchType;
    protected $orderBy;
    protected $orderDescending;
    protected $limit;
    protected $offset;

    public function __construct($parameters = null) {
        parent::__construct();
        if (isset($parameters['searchType'])) {
            $this->setSearchType($parameters['searchType']);
        }
        if (isset($parameters['orderBy'])) {
            $this->setOrderBy($parameters['orderBy']);
        }
        if (isset($parameters['orderDescending'])) {
            $this->setOrderDescending($parameters['orderDescending']);
        }
        if (isset($parameters['limit'])) {
            $this->setLimit($parameters['limit']);
        }
        if (isset($parameters['offset'])) {
            $this->setOffset($parameters['offset']);
        }
    }

    public function jsonSerialize() {
        $data = array(
            'searchType' => $this->getSearchType(),
            'orderBy' => $this->getOrderBy(),
            'orderDescending' => $this->getOrderDescending(),
            'limit' => $this->getLimit(),
            'offset' => $this->getOffset()
        );
        return $data;
    }

    protected function setSearchType($value) {
        if ($value != 'cardExpiringThisMonth' && $value != 'subscriptionActive' && $value != 'subscriptionInactive' && $value != 'subscriptionExpiringThisMonth') {
            throw new InvalidRequestException('Search Type must have only this values: "cardExpiringThisMonth", "subscriptionActive", "subscriptionInactive", "subscriptionExpiringThisMonth".');
        }
        $this->searchType = $value;
    }
    protected function getSearchType() {
        return $this->searchType;
    }

    protected function setOrderBy($value) {
        if ($value != 'id' && $value != 'name' && $value != 'status' && $value != 'createTimeStampUTC' && $value != 'lastName' && $value != 'firstName' && $value != 'accountNumber' && $value != 'amount' && $value != 'pastOccurences') {
            throw new InvalidRequestException('Order By must have only this values: "id", "name", "status", "createTimeStampUTC", "lastName", "firstName", "accountNumber", "amount", "pastOccurences".');
        }
        $this->orderBy = $value;
    }
    protected function getOrderBy() {
        return $this->orderBy;
    }

    protected function setOrderDescending($value) {
        if ($value != 'true' && $value != 'false') {
            throw new InvalidRequestException('Order Descending must have only this values: "true", "false".');
        }
        $this->orderDescending = $value;
    }
    protected function getOrderDescending() {
        return $this->orderDescending;
    }

    protected function setLimit($value) {
        if ((int)$value < 1 || (int)$value > 1000) {
            throw new InvalidRequestException('Limit must have a value between 1 and 1000.');
        }
        $this->limit = $value;
    }
    protected function getLimit() {
        return $this->limit;
    }

    protected function setOffset($value) {
        if ((int)$value < 1 || (int)$value > 1000) {
            throw new InvalidRequestException('Offset must have a value between 1 and 100000.');
        }
        $this->offset = $value;
    }
    protected function getOffset() {
        return $this->offset;
    }

}