<?php

namespace Omnipay\AuthorizeNetRecurring\Requests;

use Omnipay\AuthorizeNetRecurring\Transactions\CreateSubscriptionTransaction;
use Academe\AuthorizeNet\Amount\MoneyPhp;
use Academe\AuthorizeNet\Amount\Amount;
use Academe\AuthorizeNet\Request\Model\NameAddress;
use Academe\AuthorizeNet\Payment\CreditCard;
use Academe\AuthorizeNet\Request\Model\Customer;
use Academe\AuthorizeNet\Request\Model\Retail;
use Academe\AuthorizeNet\Request\Model\Order;
use Academe\AuthorizeNet\AmountInterface;
use Academe\AuthorizeNet\Payment\Track1;
use Academe\AuthorizeNet\Payment\Track2;
use Academe\AuthorizeNet\Payment\OpaqueData;
use Academe\AuthorizeNet\Request\Collections\LineItems;
use Academe\AuthorizeNet\Request\Model\LineItem;
use Academe\AuthorizeNet\Request\Model\CardholderAuthentication;

use Omnipay\AuthorizeNetRecurring\Requests\SubscriptionRequest;

class TestRequest extends SubscriptionRequest
{

    public function getData() {
        $amount = new Amount($this->getCurrency(), $this->getAmountInteger());


        $transaction = $this->createTransaction([
            'refId' => $this->getRefId(),
            'subscription' => $this->createSubscriptionArray()
        ]);
        return $transaction;
        var_dump($transaction);
        die;

        if ($card = $this->getCard()) {
            $billTo = new NameAddress(
                $card->getBillingFirstName(),
                $card->getBillingLastName(),
                $card->getBillingCompany(),
                trim($card->getBillingAddress1() . ' ' . $card->getBillingAddress2()),
                $card->getBillingCity(),
                $card->getBillingState(),
                $card->getBillingPostcode(),
                $card->getBillingCountry()
            );

            // The billTo may have phone and fax number, but the shipTo does not.
            $billTo = $billTo->withPhoneNumber($card->getBillingPhone());
            $billTo = $billTo->withFaxNumber($card->getBillingFax());

            if ($billTo->hasAny()) {
                $transaction = $transaction->withBillTo($billTo);
            }

            $shipTo = new NameAddress(
                $card->getShippingFirstName(),
                $card->getShippingLastName(),
                $card->getShippingCompany(),
                trim($card->getShippingAddress1() . ' ' . $card->getShippingAddress2()),
                $card->getShippingCity(),
                $card->getShippingState(),
                $card->getShippingPostcode(),
                $card->getShippingCountry()
            );

            if ($shipTo->hasAny()) {
                $transaction = $transaction->withShipTo($shipTo);
            }

            if ($card->getEmail()) {
                // TODO: customer type may be Customer::CUSTOMER_TYPE_INDIVIDUAL or
                // Customer::CUSTOMER_TYPE_BUSINESS and it would be nice to be able
                // to set it.

                $customer = new Customer();
                $customer = $customer->withEmail($card->getEmail());
                $transaction = $transaction->withCustomer($customer);
            }

            // Credit card, track 1 and track 2 are mutually exclusive.

            // A credit card has been supplied.
            if ($card->getNumber()) {
                $card->validate();

                $creditCard = new CreditCard(
                    $card->getNumber(),
                    // Either MMYY or MMYYYY will work.
                    $card->getExpiryMonth() . $card->getExpiryYear()
                );

                if ($card->getCvv()) {
                    $creditCard = $creditCard->withCardCode($card->getCvv());
                }

                $transaction = $transaction->withPayment($creditCard);
            } elseif ($card->getTrack1()) {
                // A card magnetic track has been supplied (aka card present).

                $transaction = $transaction->withPayment(
                    new Track1($card->getTrack1())
                );
            } elseif ($card->getTrack2()) {
                $transaction = $transaction->withPayment(
                    new Track2($card->getTrack2())
                );
            }
        } // credit card

        // Allow "Accept JS" nonce (in two parts) instead of card (aka OpaqueData).

        $descriptor = $this->getOpaqueDataDescriptor();
        $value = $this->getOpaqueDataValue();
        if ($descriptor && $value) {
            $transaction = $transaction->withPayment(
                new OpaqueData($descriptor, $value)
            );
        }
        // The description and invoice number go into an Order object.
        if ($this->getInvoiceNumber() || $this->getDescription()) {
            $order = new Order(
                $this->getInvoiceNumber(),
                $this->getDescription()
            );
            $transaction = $transaction->withOrder($order);
        }

        // 3D Secure is handled by a thirds party provider.
        // These two fields submit the authentication values provided.
        // It is not really clear if both these fields must be always provided together,
        // or whether just one is permitted.
        if ($this->getAuthenticationIndicator() || $this->getAuthenticationValue()) {
            $cardholderAuthentication = new CardholderAuthentication(
                $this->getAuthenticationIndicator(),
                $this->getAuthenticationValue()
            );

            $transaction = $transaction->withCardholderAuthentication($cardholderAuthentication);
        }

        var_dump($transaction);
        die;
        return $transaction;
    }

    protected function createTransaction($parameters) {
        return new CreateSubscriptionTransaction($parameters);
    }

    public function sendData($data) {
        $responseData = $this->sendTransaction($data);
        return new Response($this, $responseData);
    }

    public function setInvoiceNumber($value) {
        return $this->setParameter('invoiceNumber', $value);
    }

    public function getInvoiceNumber() {
        return $this->getParameter('invoiceNumber');
    }

    public function setAuthenticationIndicator($value) {
        return $this->setParameter('authenticationIndicator', $value);
    }

    public function getAuthenticationIndicator() {
        return $this->getParameter('authenticationIndicator');
    }

    public function setAuthenticationValue($value) {
        return $this->setParameter('authenticationValue', $value);
    }

    public function getAuthenticationValue() {
        return $this->getParameter('authenticationValue');
    }

    public function setOpaqueDataDescriptor($value) {
        return $this->setParameter('opaqueDataDescriptor', $value);
    }

    public function getOpaqueDataDescriptor() {
        return $this->getParameter('opaqueDataDescriptor');
    }

    public function setOpaqueDataValue($value) {
        return $this->setParameter('opaqueDataValue', $value);
    }

    public function getOpaqueDataValue() {
        return $this->getParameter('opaqueDataValue');
    }

    public function setOpaqueDatas($descriptor, $value) {
        $this->setOpaqueDataDataDescriptor($descriptor);
        $this->setOpaqueDataValue($value);
        return $this;
    }

    public function setToken($value) {
        list($opaqueDataDescriptor, $opaqueDataValue) = explode(static::CARD_TOKEN_SEPARATOR, $value, 2);
        $this->setOpaqueDataDescriptor($opaqueDataDescriptor);
        $this->setOpaqueDataValue($opaqueDataValue);
        return $this;
    }

    public function getToken() {
        $opaqueDataDescriptor = $this->getOpaqueDataDescriptor();
        $opaqueDataValue = $this->getOpaqueDataValue();
        if ($opaqueDataDescriptor && $opaqueDataValue) {
            return $opaqueDataDescriptor . static::CARD_TOKEN_SEPARATOR . $opaqueDataValue;
        }
    }

}