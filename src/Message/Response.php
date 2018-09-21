<?php

namespace Omnipay\AuthorizeNetRecurring\Message;

use Academe\AuthorizeNet\Response\Collections\TransactionMessages;
use Academe\AuthorizeNet\Response\Collections\Errors;
use Omnipay\Common\Message\RequestInterface;

class Response extends AbstractResponse
{

    // Parse the request into a structured object.
    public function __construct(RequestInterface $request, $data) {
        parent::__construct($request, $data);
    }

}