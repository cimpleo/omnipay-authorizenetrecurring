<?php

namespace Vendor\Authomnipay;

use Omnipay\Common\Exception\InvalidRequestException;

use Traits\HasHostedPageGatewayParams;
use Message\HostedPage\AuthorizeRequest;
use Message\HostedPage\PurchaseRequest;
use Message\VoidRequest;
use Message\RefundRequest;
use Message\FetchTransactionRequest;
use Message\AcceptNotification;

class HostedPageGateway extends AbstractGateway
{
    use HasHostedPageGatewayParams;

    /**
     * The common name for this gateway driver API.
     */
    public function getName()
    {
        return 'Authorize.Net Hosted Page';
    }

    /**
     * The authorization transaction, through a hosted page.
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest(
            AuthorizeRequest::class,
            $parameters
        );
    }

    /**
     * The purchase transaction, through a hosted page.
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest(
            PurchaseRequest::class,
            $parameters
        );
    }

    /**
     * Void an authorized transaction.
     */
    public function void(array $parameters = [])
    {
        return $this->createRequest(
            VoidRequest::class,
            $parameters
        );
    }

    /**
     * Refund a captured transaction (before it is cleared).
     */
    public function refund(array $parameters = [])
    {
        return $this->createRequest(
            RefundRequest::class,
            $parameters
        );
    }

    /**
     * Fetch an existing transaction details.
     */
    public function fetchTransaction(array $parameters = [])
    {
        return $this->createRequest(
            FetchTransactionRequest::class,
            $parameters
        );
    }

    /**
     * Accept a notification.
     */
    public function acceptNotification(array $parameters = [])
    {
        return $this->createRequest(
            AcceptNotification::class,
            $parameters
        );
    }
}
