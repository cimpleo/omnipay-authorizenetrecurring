<?php

namespace Omnipay\AuthorizeNetRecurring\Message;

class GetSubscriptionStatusRequest extends AbstractRequest
{

    public function getData() {
        return array(
            'ARBGetSubscriptionStatusRequest' => array(
                'merchantAuthentication' => array(
                    'name' => $this->getAuthName(),
                    'transactionKey' => $this->getTransactionKey()
                ),
                'subscriptionId' => $this->getSubscriptionId(),
            )
        );
    }

}