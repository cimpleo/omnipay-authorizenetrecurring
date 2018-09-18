<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

class CustomerRequest extends OmnipayRequest
{
   
    public function get() {
        $parameters = array(
            'getCustomerProfileRequest' => array(
                'merchantAuthentication' => array(
                    'name' => $this->getAuthName(),
                    'transactionKey' => $this->getTransactionKey()
                ),
                'customerProfileId' => $this->getCustomerProfileId(),
                'includeIssuerInfo' => $this->getIncludeIssuerInfo(),
            )
        );
        return $this->sendRequest($parameters);
    }


}