<?php

namespace Omnipay\AuthorizeNetRecurring\Message;

class UpdateSubscriptionRequest extends SubscriptionRequest
{

    public function getData() {
        $subscription = $this->createSubscriptionArray();
        return array(
            'ARBUpdateSubscriptionRequest' => array(
                'merchantAuthentication' => array(
                    'name' => $this->getAuthName(),
                    'transactionKey' => $this->getTransactionKey()
                ),
                'refId' => $this->getRefId(),
                'subscriptionId' => $this->getSubscriptionId(),
                'subscription' => $subscription
            )
        );   
    }

}