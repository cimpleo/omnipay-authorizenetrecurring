<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

class GetSubscriptionListRequest extends AbstractRequest
{

    public function getData() {
        return array(
            'ARBGetSubscriptionListRequest' => array(
                'merchantAuthentication' => array(
                    'name' => $this->getAuthName(),
                    'transactionKey' => $this->getTransactionKey()
                ),
                'refId' => $this->getRefId(),
                'searchType' => $this->getSearchType(),
                'sorting' => array(
                    'orderBy' => $this->getOrderBy(),
                    'orderDescending' => $this->getOrderDescending(),
                ),
                'paging' => array(
                    'limit' => $this->getLimit(),
                    'offset' => $this->getOffset(),
                )
            )
        );
    }

}