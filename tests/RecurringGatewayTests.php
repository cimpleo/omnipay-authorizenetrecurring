<?php

namespace Omnipay\AuthorizeNetRecurring;

use Omnipay\Tests\GatewayTestCase;

class RecurringGatewayTests extends GatewayTestCase
{

    protected function setUp() {
        parent::setUp();

        $this->gateway = new RecurringGateway(
            $this->getHttpClient(),
            $this->getHttpRequest()
        );

    }

    protected function tearDown() {
        $this->gateway = null;
    }

}