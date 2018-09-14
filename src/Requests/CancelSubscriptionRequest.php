<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

class CancelSubscriptionRequest extends OmnipayRequest
{

    public function cancelSubscription($id) {
    	$parameters = array(
    		'ARBCancelSubscriptionRequest' => array(
    			'merchantAuthentication' => array(
    				'name' => $this->getAuthName(),
    				'transactionKey' => $this->getTransactionKey()
    			),
    			'refId' => $this->getTransactionReference(),
    			'subscriptionId' => $id
    		)
    	);
        return $this->sendRequest($parameters);
    }

}