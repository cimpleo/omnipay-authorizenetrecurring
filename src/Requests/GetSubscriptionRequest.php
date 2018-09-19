<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

class GetSubscriptionRequest extends AbstractRequest
{

    public function getData() {
        return array(
            'ARBGetSubscriptionRequest' => array(
                'merchantAuthentication' => array(
                    'name' => $this->getAuthName(),
                    'transactionKey' => $this->getTransactionKey()
                ),
                'subscriptionId' => $this->getSubscriptionId(),
                'includeTransactions' => $this->getIncludeTransactions()
            )
        );
    }

}