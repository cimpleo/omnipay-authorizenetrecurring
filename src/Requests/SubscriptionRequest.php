<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

class SubscriptionRequest extends OmnipayRequest
{
   
    public function get() {
        $parameters = array(
            'ARBGetSubscriptionRequest' => array(
                'merchantAuthentication' => array(
                    'name' => $this->getAuthName(),
                    'transactionKey' => $this->getTransactionKey()
                ),
                'subscriptionId' => $this->getId(),
                'includeTransactions' => true
            )
        );
        return $this->sendRequest($parameters);
    }

    public function create() {
        $parameters = array(
            'ARBCreateSubscriptionRequest' => array(
                'merchantAuthentication' => array(
                    'name' => $this->getAuthName(),
                    'transactionKey' => $this->getTransactionKey()
                ),
                'refId' => $this->getRefId(),
                'subscription' => array(
                    'name' => $this->getSubscriptionName(),
                    'paymentSchedule' => array(
                        'interval' => array(
                            'length' => $this->getScheduleIntervalLength(),
                            'unit' => $this->getScheduleIntervalUnit(),
                        ),
                        'startDate' => $this->getScheduleStartDate(),
                        'totalOccurrences' => $this->getScheduleTotalOccurrences(),
                        'trialOccurrences' => $this->getScheduleTrialOccurrences(),
                    ),
                    'amount' => $this->getAmount(),
                    'trialAmount' => $this->getTrialAmount(),
                    'payment' => array(
                        'creditCard' => array(
                            'cardNumber' => $this->getCardNumber(),
                            'expirationDate' => $this->getExpirationDate(),
                        ),
                    ),
                    'billTo' => array(
                        'firstName' => $this->getCustomerFirstName(),
                        'lastName' => $this->getCustomerLastName(),
                    )
                )
            )
        );       
        return $this->sendRequest($parameters);
    }

    public function cancel() {
        $parameters = array(
            'ARBCancelSubscriptionRequest' => array(
                'merchantAuthentication' => array(
                    'name' => $this->getAuthName(),
                    'transactionKey' => $this->getTransactionKey()
                ),
                'subscriptionId' => $this->getId(),
            )
        );
        return $this->sendData($parameters);
    }

}