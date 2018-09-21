<?php

namespace Omnipay\AuthorizeNetRecurring\Message;

class GetSubscriptionListRequest extends AbstractRequest
{

    public function getData() {
        if (is_object($this->getSearch())) {
            return array(
                'ARBGetSubscriptionListRequest' => array(
                    'merchantAuthentication' => array(
                        'name' => $this->getAuthName(),
                        'transactionKey' => $this->getTransactionKey()
                    ),
                    'refId' => $this->getRefId(),
                    'searchType' => $this->getSearch()->getSearchType(),
                    'sorting' => array(
                        'orderBy' => $this->getSearch()->getOrderBy(),
                        'orderDescending' => $this->getSearch()->getOrderDescending(),
                    ),
                    'paging' => array(
                        'limit' => $this->getSearch()->getLimit(),
                        'offset' => $this->getSearch()->getOffset(),
                    )
                )
            );
        }
        else {
            return array(
                'ARBGetSubscriptionListRequest' => array(
                    'merchantAuthentication' => array(
                        'name' => $this->getAuthName(),
                        'transactionKey' => $this->getTransactionKey()
                    ),
                    'refId' => $this->getRefId(),
                    'searchType' => 'subscriptionActive',
                    'sorting' => array(
                        'orderBy' => 'id',
                        'orderDescending' => true,
                    ),
                    'paging' => array(
                        'limit' => '100',
                        'offset' => '1',
                    )
                )
            );
        }
    }

}