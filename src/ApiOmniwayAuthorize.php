<?php

namespace Authomnipay;

use Requests\Subscription;
use Requests\AuthorizeNetApi;

class ApiOmniwayAuthorize
{

    //Get Authorize Net Subscription info
    public function getSubscription(array $parameters = []) {
        return Subscription::get($parameters);
    }

    //Create Authorize Net Subscription
    public function createSubscription(array $parameters = []) {
        $data = Subscription::create($parameters);
        return AuthorizeNetApi::getOmnipay($parameters,$data);
    }

    //Cancel Authorize Net Subscription
    public function cancelSubscription(array $parameters = []) {
        $data = Subscription::cancel($parameters);
        return AuthorizeNetApi::getOmnipay($parameters,$data,true);
    }


}