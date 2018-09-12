<?php

namespace Authomnipay;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\AbstractGateway;

use Authomnipay\Requests\AuthorizeRequest;

use Authomnipay\GatewayParams;

class ApiGateway extends AbstractGateway
{
    use GatewayParams;

    //The default parameters.
    public function getDefaultParameters() {
        return array(
            // Required.
            // The name assigned for th application.
            'authName' => '',
            // Required.
            // The access token assigned to this application.
            'transactionKey' => '',
            // Optional.
            // Either mobileDeviceId or refId can be provided.
            'mobileDeviceId' => '',
            'refId' => '',
            // True to run against the sandbox.
            'testMode' => false,
            // The shared key used to sign notifications.
            'signatureKey' => '',
        );
    }

    //The authorization transaction.
    public function authorize(array $parameters = []) {
        return $this->createRequest(
            AuthorizeRequest::class,
            $parameters
        );
    }



}