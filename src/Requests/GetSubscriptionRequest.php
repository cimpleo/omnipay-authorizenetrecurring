<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

class GetSubscriptionRequest extends OmnipayRequest
{
    
    public function getSubscription($id) {
    	$parameters = array(
    		'ARBGetSubscriptionRequest' => array(
    			'merchantAuthentication' => array(
    				'name' => $this->getAuthName(),
    				'transactionKey' => $this->getTransactionKey()
    			),
    			'refId' => $this->getTransactionReference(),
    			'subscriptionId' => $id,
    			'includeTransactions' => true
    		)
    	);
        return $this->sendRequest($parameters);
    }

}