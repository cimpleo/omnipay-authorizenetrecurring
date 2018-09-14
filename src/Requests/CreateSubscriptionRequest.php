<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

class CreateSubscriptionRequest extends OmnipayRequest
{

    public function createSubscription(array $parameters = []) {
        $parameters = array(
            'merchantAuthentication' => array(
				'name' => $this->getAuthName(),
				'transactionKey' => $this->getTransactionKey()
            ),
            'refId' => $this->getTransactionReference(),
            'subscription' => array(
                'name' => $parameters['subscriptionName'],
                'paymentSchedule' => array(
                    'interval' => array(
                        'length' => $parameters['scheduleIntervalLength'],
                        'unit' => $parameters['scheduleIntervalUnit'],
                    ),
                    'startDate' => $parameters['scheduleStartDate'],
                    'totalOccurrences' => $parameters['scheduleTotalOccurrences'],
                    'trialOccurrences' => $parameters['scheduleTrialOccurrences'],
                ),
                'amount' => $parameters['amount'],
                'trialAmount' => $parameters['trialAmount'],
                'payment' => array(
                    'creditCard' => array(
                        'cardNumber' => $parameters['cardNumber'],
                        'expirationDate' => $parameters['expirationDate'],
                    ),
                ),
                'billTo' => array(
                    'firstName' => $parameters['customerFirstName'],
                    'lastName' => $parameters['customerLastName'],
                )
            )
        );
        return $this->sendRequest($parameters);
    }

}