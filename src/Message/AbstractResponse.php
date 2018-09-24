<?php

namespace Omnipay\AuthorizeNetRecurring\Message;

use Omnipay\Common\Message\AbstractResponse as OmnipayAbstractResponse;
use Omnipay\Common\Message\RequestInterface;

use Academe\AuthorizeNet\Response\Response;

use Symfony\Component\PropertyAccess\Exception\ExceptionInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessor;

abstract class AbstractResponse extends OmnipayAbstractResponse
{

    protected $parsedData;
    protected $accessor;

    // Omnipay Common has some data to record. Parse the raw data into a response message value object.
    public function __construct(RequestInterface $request, $data) {
        parent::__construct($request, $data);
        $this->setParsedData(new Response($data));
    }

    /**
     * Get a value from the parsed data, based on a path.
     * e.g. 'object.arrayProperty[0].stringProperty'.
     * Returns null if the dependency path is broken at any point.
     * @link http://symfony.com/doc/current/components/property_access.html
     * @author academe/omnipay-authorizenetapi
     */
    public function getValue($path) {
        $accessor = $this->getAccessor();
        // If the accessor has not already been set, then create the default accessor now.
        if (empty($accessor)) {
            $accessor = PropertyAccess::createPropertyAccessorBuilder()
                ->enableMagicCall()
                ->disableExceptionOnInvalidIndex()
                ->getPropertyAccessor();
            $this->setAccessor($accessor);
        }
        try {
            // Get the property using its path. If the path breaks at any point, an exception will be thrown, but we just want to return a null.
            return $accessor->getValue($this->getParsedData(), $path);
        } catch (ExceptionInterface $e) {
            return null;
        }
    }

    // Set the property accessor helper.
    public function setAccessor(PropertyAccessor $value) {
        $this->accessor = $value;
    }

    // Get the property accessor helper.
    public function getAccessor() {
        return $this->accessor;
    }

    // Set the data parsed into a nested value object.
    public function setParsedData(Response $value) {
        $this->parsedData = $value;
    }

    // Get the data parsed into a nested value object.
    public function getParsedData() {
        return $this->parsedData;
    }

    // The merchant supplied ID. Up to 20 characters.
    public function getRefId() {
        return $this->getValue('refId');
    }

    // Get the first top-level result code.
    public function getResultCode() {
        return $this->getValue('resultCode');
    }

    // Get the first top-level message text.
    public function getResponseMessage() {
        return $this->getValue('messages.first.text');
    }

    // Get the message text from the response envelope. Inheriting responses will normally refine this to look deeper into the response body.
    public function getMessage() {
        return $this->getResponseMessage();
    }

    // Get the first top-level (i.e. message wrapper) message code.
    public function getResponseCode() {
        return $this->getValue('messages.first.code');
    }

    // Return the message code from the response envelope. Inheriting responses will normally refine this to look deeper into the response body.
    public function getCode() {
        return $this->getResponseCode();
    }

    // Get all top-level (envelope) response message collection.
    public function getResponseMessages() {
        return $this->getValue('messages');
    }

    // Return true or false.
    public function isSuccessful() {
        return $this->getResultCode() === Response::RESULT_CODE_OK;
    }

}