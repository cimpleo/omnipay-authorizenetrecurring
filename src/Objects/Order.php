<?php

namespace Omnipay\AuthorizeNetRecurring\Objects;

use Academe\AuthorizeNet\Request\Model\Order as AuthorizeNetOrder;

class Order extends AuthorizeNetOrder
{

    public function __construct($parameters = null) {
        parent::__construct($parameters);
    }

    public function jsonSerialize() {
        $data = [];
        $invoiceNumber = $this->getInvoiceNumber();
        if (isset($invoiceNumber['invoiceNumber'])) {
            $data['invoiceNumber'] = $invoiceNumber['invoiceNumber'];
        }
        if (isset($invoiceNumber['description'])) {
            $data['description'] = $invoiceNumber['description'];
        }
        return $data;
    }

}