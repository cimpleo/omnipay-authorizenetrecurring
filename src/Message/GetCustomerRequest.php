<?php

namespace Omnipay\AuthorizeNetRecurring\Message;

class GetCustomerRequest extends AbstractRequest
{

    public function getData() {
        return array(
            'getCustomerProfileRequest' => array(
                'merchantAuthentication' => array(
                    'name' => $this->getAuthName(),
                    'transactionKey' => $this->getTransactionKey()
                ),
                'customerProfileId' => $this->getCustomerProfileId(),
                'includeIssuerInfo' => $this->getIncludeIssuerInfo(),
            )
        );
    }

}