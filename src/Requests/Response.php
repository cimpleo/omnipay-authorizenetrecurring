<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

use Academe\AuthorizeNet\Response\Collections\TransactionMessages;
use Academe\AuthorizeNet\Response\Collections\Errors;
use Omnipay\Common\Message\RequestInterface;

class Response extends AbstractResponse
{

    // Parse the request into a structured object.
    public function __construct(RequestInterface $request, $data) {
        parent::__construct($request, $data);
    }

    //Return the message code from the transaction if available, or the response envelope.
    public function getCode() {
        return $this->getTransactionCode() ?: parent::getCode();
    }

    //Get the transaction message text if available, falling back to the response envelope.
    public function getMessage() {
        return $this->getTransactionMessage() ?: parent::getMessage();
    }

}