<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

class CancelSubscriptionRequest extends AbstractRequest
{

    public function getData() {
        return array(
            'ARBCancelSubscriptionRequest' => array(
                'merchantAuthentication' => array(
                    'name' => $this->getAuthName(),
                    'transactionKey' => $this->getTransactionKey()
                ),
                'subscriptionId' => $this->getSubscriptionId(),
            )
        );
    }

}