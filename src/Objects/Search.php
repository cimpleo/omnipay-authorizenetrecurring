<?php

namespace Omnipay\AuthorizeNetRecurring\Objects;

use Academe\AuthorizeNet\PaymentInterface;
use Academe\AuthorizeNet\AbstractModel;
use Omnipay\Common\Exception\InvalidRequestException;

class Search extends AbstractModel
{

    const SEARCH_TYPE_1 = 'cardExpiringThisMonth';
    const SEARCH_TYPE_2 = 'subscriptionActive';
    const SEARCH_TYPE_3 = 'subscriptionInactive';
    const SEARCH_TYPE_4 = 'subscriptionExpiringThisMonth';

    const ORDER_BY_1 = 'id';
    const ORDER_BY_2 = 'name';
    const ORDER_BY_3 = 'status';
    const ORDER_BY_4 = 'createTimeStampUTC';
    const ORDER_BY_5 = 'lastName';
    const ORDER_BY_6 = 'firstName';
    const ORDER_BY_7 = 'accountNumber';
    const ORDER_BY_8 = 'amount';
    const ORDER_BY_9 = 'pastOccurences';

    const ORDER_DESCENDING_1 = 'true';
    const ORDER_DESCENDING_2 = 'false';

    protected $searchType;
    protected $orderBy;
    protected $orderDescending;
    protected $limit;
    protected $offset;

    public function __construct($parameters = null) {
        parent::__construct();

        $this->setSearchType($parameters['searchType']);
        $this->setOrderBy($parameters['orderBy']);
        $this->setOrderDescending($parameters['orderDescending']);
        $this->setLimit($parameters['limit']);
        $this->setOffset($parameters['offset']);
    }

    public function jsonSerialize() {
        $data = [];
        if ($this->hasSearchType()) {
            $data['searchType'] = $this->getSearchType();
        }
        if ($this->hasOrderBy()) {
            $data['orderBy'] = $this->getOrderBy();
        }
        if ($this->hasOrderDescending()) {
            $data['orderDescending'] = $this->getOrderDescending();
        }
        if ($this->hasLimit()) {
            $data['limit'] = $this->getLimit();
        }
        if ($this->hasOffset()) {
            $data['offset'] = $this->getOffset();
        }
        return $data;
    }

    protected function setSearchType($value) {
        $this->assertValueSearchType($value);
        $this->searchType = $value;
    }

    protected function setOrderBy($value) {
        $this->assertValueOrderBy($value);
        $this->orderBy = $value;
    }

    protected function setOrderDescending($value) {
        $this->assertValueOrderDescending($value);
        $this->orderDescending = $value;
    }

    protected function setLimit(int $value) {
        if ($value < 1 || $value > 1000) {
            throw new InvalidRequestException('Limit must have a value between 1 and 1000.');
        }
        $this->limit = (string)$value;
    }

    protected function setOffset(int $value) {
        if ($value < 1 || $value > 1000) {
            throw new InvalidRequestException('Offset must have a value between 1 and 100000.');
        }
        $this->offset = (string)$value;
    }

}