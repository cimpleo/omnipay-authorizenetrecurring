Table of Contents
=================

   * [Table of Contents](#table-of-contents)
   * [Omnipay-AuthorizeNetRecurring](#omnipay-authorizenetrecurring)
   * [Installation](#installation)
   * [Authorize.Net Reccuring](#authorizenet-reccuring)
      * [Create Subscription](#create-subscription)
      * [Create Subscription From Customer Profile](#create-subscription-from-customer-profile)
      * [Update Subscription](#update-subscription)
      * [Cancel Subscription](#cancel-subscription)
      * [Get Subscription Info](#get-subscription-info)
      * [Get Subscription Status](#get-subscription-status)
      * [Get Subscriptions List Info](#get-subscriptions-list-info)
      * [Get Customer Profile](#get-customer-profile)
   * [Other options for creating a subscription](#other-options-for-creating-a-subscription)
      * [Bank Account](#bank-account)
      * [Opaque Data](#opaque-data)
      * [Order](#order)
      * [Customer](#customer)

# Omnipay-AuthorizeNetRecurring

Omnipay 3.x implementation of AuthorizeNetRecurring

# Installation

    composer require league/omnipay:^3 cimpleo/omnipay-authorizenetrecurring

# Authorize.Net Reccuring

The *Authorize.Net Reccuring* driver handles server-to-server requests.
It is used to create, modify and cancel subscriptions, as well as to display information about subscriptions and the customer.

## Create Subscription

```php
<?php

use Omnipay\Omnipay;
use Omnipay\AuthorizeNetRecurring;
use Omnipay\AuthorizeNetRecurring\Objects\Schedule;
use Omnipay\Common\CreditCard;

$gateway = Omnipay::create('AuthorizeNetRecurring_Recurring');

$gateway->setAuthName('API_LOGIN_ID');
$gateway->setTransactionKey('API_TRANSACTION_KEY');
$gateway->setTestMode(true);

$schedule = new Schedule([
    //For a unit of days, use an integer between 7 and 365, inclusive. For a unit of months, use an integer between 1 and 12, inclusive.
    'intervalLength' => '10',
    // use values 'days' or 'months'
    'intervalUnit' => 'days',
    // date in format 'YYYY-mm-dd'
    'startDate' => '2020-03-10',
    //To create an ongoing subscription without an end date, set totalOccurrences to "9999".
    'totalOccurrences' => '12',
    //If a trial period is specified, include the number of payments during the trial period in totalOccurrences.
    'trialOccurrences' => '1',
]);

$card = new CreditCard([
    'number' => '4111111111111111',
    'expiryMonth' => '12',
    'expiryYear' => '2020',
    'cvv' => '123',
    'billingFirstName' => 'Test',
    'billingLastName' => 'Test',
    // Also here can be specified all other billing abd shipping parameters:
    //'billingCompany', 'billingAddress', 'billingCity', 'billingState', 'billingZip', 'billingCountry',
    //'shippingFirstName', 'shippingLastName', 'shippingCompany', 'shippingAddress', 'shippingCity', 'billingState', 'shippingZip', 'shippingCountry'.
]);

$response = $gateway->createSubscription([
    // Name of you subscription
    'subscriptionName' => 'Test Subscription',
    // Merchant-assigned reference ID for the request.
    'refId' => '123456',
    'amount' => '7.99',
    // Specified when using trialOccurrences
    'trialAmount' => '0.00',
    'currency' => 'USD',
    'schedule' => $schedule,
    'card' => $card
])->send();

var_dump($response->getData());
// Returns an array with the data of the created subscription, or an array with data about the error, in case of unsuccessful attempt to create a subscription

var_dump($response->isSuccessful());
// bool(true) or bool(false)

var_dump($response->getCode());
// string(6) "I00001"

var_dump($response->getMessage());
// "Successful." or "Error."
```

## Create Subscription From Customer Profile

When you create a subscription from a profile, the credit card settings are not used.

```php
<?php

use Omnipay\Omnipay;
use Omnipay\AuthorizeNetRecurring;
use Omnipay\AuthorizeNetRecurring\Objects\Schedule;
use Omnipay\AuthorizeNetRecurring\Objects\Profile;

$gateway = Omnipay::create('AuthorizeNetRecurring_Recurring');

$gateway->setAuthName('API_LOGIN_ID');
$gateway->setTransactionKey('API_TRANSACTION_KEY');
$gateway->setTestMode(true);

$schedule = new Schedule([
// Variable schedule parameters in the same format as when creating a subscription.
]);

$profile = new Profile([
    // Payment gateway assigned ID associated with the customer profile.
    'customerProfileId' => '1505265565',
    // Payment gateway assigned ID associated with the customer payment profile.
    'customerPaymentProfileId' => '1504545622',
    //  Payment gateway-assigned ID associated with the customer shipping address.
    'customerAddressId' => '1234567890'
]);

$response = $gateway->createSubscription([
    // Variable parameters of subscriptionName, refId, amount, trialAmount or currency.
    'schedule' => $schedule,
    'profile' => $profile
])->send();

var_dump($response->getData());
// Returns an array with the data of the created subscription, or an array with data about the error, in case of unsuccessful attempt to create a subscription

var_dump($response->isSuccessful());
// bool(true) or bool(false)

var_dump($response->getCode());
// string(6) "I00001"

var_dump($response->getMessage());
// "Successful." or "Error."
```

## Update Subscription

The request for update of the subscription differs little from the request for its create:

```php
<?php

use Omnipay\Omnipay;
use Omnipay\AuthorizeNetRecurring;
use Omnipay\AuthorizeNetRecurring\Objects\Schedule;
use Omnipay\Common\CreditCard;

$gateway = Omnipay::create('AuthorizeNetRecurring_Recurring');

$gateway->setAuthName('API_LOGIN_ID');
$gateway->setTransactionKey('API_TRANSACTION_KEY');
$gateway->setTestMode(true);

$schedule = new Schedule([
// Variable schedule parameters in the same format as when creating a subscription.
]);

$card = new CreditCard([
// Variable credit card parameters in the same format as when creating a subscription
]);

$response = $gateway->updateSubscription([
    // Required. The payment gateway-assigned identification number for the subscription.
    'subscriptionId' => '100748'
    // Variable parameters of subscriptionName, amount, trialAmount or  currency.
    'schedule' => $schedule,
    'card' => $card
])->send();

var_dump($response->getData());
// Returns an array with the data of the updated subscription, or an array with data about the error, in case of unsuccessful attempt to update a subscription

var_dump($response->isSuccessful());
// bool(true) or bool(false)

var_dump($response->getCode());
// string(6) "I00001"

var_dump($response->getMessage());
// "Successful." or "Error."
```

## Cancel Subscription

```php
<?php

use Omnipay\Omnipay;
use Omnipay\AuthorizeNetRecurring;

$gateway = Omnipay::create('AuthorizeNetRecurring_Recurring');

$gateway->setAuthName('API_LOGIN_ID');
$gateway->setTransactionKey('API_TRANSACTION_KEY');
$gateway->setTestMode(true);

$response = $gateway->cancelSubscription([
    // Required. The payment gateway-assigned identification number for the subscription.
    'subscriptionId' => '100748',
    // If included in the request, this value is included in the response.
    'refId' => '123456'
])->send();

var_dump($response->getData());
// Returns an array with the data of the canceled subscription, or an array with data about the error, in case of unsuccessful attempt to update a subscription

var_dump($response->isSuccessful());
// bool(true) or bool(false)

var_dump($response->getCode());
// string(6) "I00001"

var_dump($response->getMessage());
// "Successful." or "Error."
```

## Get Subscription Info

```php
<?php

use Omnipay\Omnipay;
use Omnipay\AuthorizeNetRecurring;

$gateway = Omnipay::create('AuthorizeNetRecurring_Recurring');

$gateway->setAuthName('API_LOGIN_ID');
$gateway->setTransactionKey('API_TRANSACTION_KEY');
$gateway->setTestMode(true);

$response = $gateway->getSubscription([
    // Required. The payment gateway-assigned identification number for the subscription.
    'subscriptionId' => '100748',
    // If included in the request, this value is included in the response.
    'refId' => '123456',
    // Indicates whether to include information about transactions for this subscription.
    // If set to true, information about the most recent 20 transactions for this subscription will be included in the response.
    'includeTransactions' => 'true'
])->send();

var_dump($response->getData());
// Returns an array with the data of the subscription, or an array with data about the error, in case of unsuccessful attempt to update a subscription

var_dump($response->isSuccessful());
// bool(true) or bool(false)

var_dump($response->getCode());
// string(6) "I00001"

var_dump($response->getMessage());
// "Successful." or "Error."
```

## Get Subscription Status

```php
<?php

use Omnipay\Omnipay;
use Omnipay\AuthorizeNetRecurring;

$gateway = Omnipay::create('AuthorizeNetRecurring_Recurring');

$gateway->setAuthName('API_LOGIN_ID');
$gateway->setTransactionKey('API_TRANSACTION_KEY');
$gateway->setTestMode(true);

$response = $gateway->getSubscriptionStatus([
    // Required. The payment gateway-assigned identification number for the subscription.
    'subscriptionId' => '100748',
    // If included in the request, this value is included in the response.
    'refId' => '123456'
])->send();

var_dump($response->getData());
// Returns an array with the data of the subscription status, or an array with data about the error, in case of unsuccessful attempt to update a subscription

var_dump($response->isSuccessful());
// bool(true) or bool(false)

var_dump($response->getCode());
// string(6) "I00001"

var_dump($response->getMessage());
// "Successful." or "Error."
```

## Get Subscriptions List Info

```php
<?php

use Omnipay\Omnipay;
use Omnipay\AuthorizeNetRecurring;
use Omnipay\AuthorizeNetRecurring\Objects\Search;

$gateway = Omnipay::create('AuthorizeNetRecurring_Recurring');

$gateway->setAuthName('API_LOGIN_ID');
$gateway->setTransactionKey('API_TRANSACTION_KEY');
$gateway->setTestMode(true);

$search = new Search([
    // Valid Values:
    // 'cardExpiringThisMonth', 'subscriptionActive', 'subscriptionInactive', or 'subscriptionExpiringThisMonth'
    'searchType' => 'subscriptionActive',
    // One of the following: 'id', 'name', 'status' 'createTimeStampUTC' 'lastName' 'firstName' 'accountNumber' (ordered by last four digits) 'amount' or 'pastOccurences'
    'orderBy' => 'id',
    // Sort the results in descending order. Valid values 'true' or 'false'
    'orderDescending' => 'true',
    // The number of transactions per page. You can request up to 1000 subscriptions per page of results.
    'limit' => '1000',
    // The number of the page to return results from. For example, if you use a limit of 100, setting offset to 1 will return the first 100 subscriptions, setting offset to 2 will return the second 100 subscriptions, and so forth.
    'offset' => '1'
]);

$response = $gateway->getSubscriptionList([
    // If included in the request, this value is included in the response.
    'refId' => '123456',
    'search' => $search
])->send();

var_dump($response->getData());
// Returns an array with the data of the all subscriptions, or an array with data about the error, in case of unsuccessful attempt to update a subscription

var_dump($response->isSuccessful());
// bool(true) or bool(false)

var_dump($response->getCode());
// string(6) "I00001"

var_dump($response->getMessage());
// "Successful." or "Error."
```

## Get Customer Profile

```php
<?php

use Omnipay\Omnipay;
use Omnipay\AuthorizeNetRecurring;

$gateway = Omnipay::create('AuthorizeNetRecurring_Recurring');

$gateway->setAuthName('API_LOGIN_ID');
$gateway->setTransactionKey('API_TRANSACTION_KEY');
$gateway->setTestMode(true);

$response = $gateway->getCustomer([
    // Payment gateway-assigned ID associated with the customer profile.
    'customerProfileId' => '1505272217',
    // When set to true, this optional field requests that the issuer number (IIN) be included in the response, in the field issuerNumber.
    'includeIssuerInfo' => 'true'
])->send();

var_dump($response->getData());
// Returns an array with the data of the all subscriptions, or an array with data about the error, in case of unsuccessful attempt to update a subscription

var_dump($response->isSuccessful());
// bool(true) or bool(false)

var_dump($response->getCode());
// string(6) "I00001"

var_dump($response->getMessage());
// "Successful." or "Error."
```

# Other options for creating a subscription

When creating or changing a subscription, in addition to the credit card, you can also specify BankAccount, OpaqueDatam, Order and Customer values:

## Bank Account:

```php
<?php

use Omnipay\Omnipay;
use Omnipay\AuthorizeNetRecurring;
use Omnipay\AuthorizeNetRecurring\Objects\BankAccount;

$gateway = Omnipay::create('AuthorizeNetRecurring_Recurring');

$gateway->setAuthName('API_LOGIN_ID');
$gateway->setTransactionKey('API_TRANSACTION_KEY');
$gateway->setTestMode(true);

$bankAccount = new BankAccount([
    // The type of bank account used for the eCheck.Net transaction. The value of accountType must be valid for the echeckType value submitted.
    // Valid values: 'checking', 'savings', or 'businessChecking'.
    'accountType' => 'checking',
    // The ABA routing number. Numeric string, up to 9 digits.
    'routingNumber' => '123456789',
    // The bank account number. Numeric string, up to 17 digits.
    'accountNumber' => '12345678901234567',
    // String, up to 22 characters. Name of the person who holds the bank account.
    'nameOnAccount' => 'Name',
    // The type of eCheck transaction. The value of accountType must be valid for the echeckType value submitted. For recurring payments, do not use TEL, ARC, or BOC.
    // Valid Values: 'PPD', 'WEB', or 'CCD'. 
    'echeckType' => 'PPD',
    // String, up to 50 characters. The name of the bank.
    'bankName' => 'Bank',
    'billingFirstName' => 'John',
    'billingLastName' => 'Doe'
    // Also here can be specified all other billing abd shipping parameters:
    //'billingCompany', 'billingAddress', 'billingCity', 'billingState', 'billingZip', 'billingCountry',
    //'shippingFirstName', 'shippingLastName', 'shippingCompany', 'shippingAddress', 'shippingCity', 'billingState', 'shippingZip', 'shippingCountry'.
]);

$response = $gateway->createSubscription([
    // ... Other subscription data ... 
    'bankAccount' => $bankAccount
])->send();
```

## Opaque Data:

```php
<?php

use Omnipay\Omnipay;
use Omnipay\AuthorizeNetRecurring;
use Omnipay\AuthorizeNetRecurring\Objects\OpaqueData;

$gateway = Omnipay::create('AuthorizeNetRecurring_Recurring');

$gateway->setAuthName('API_LOGIN_ID');
$gateway->setTransactionKey('API_TRANSACTION_KEY');
$gateway->setTestMode(true);

$opaqueData = new OpaqueData([
    // Specifies how the request should be processed. The value of dataDescriptor is based on the source of the value of dataValue. String, 128 characters.
    'dataDescriptor' => 'COMMON.ACCEPT.INAPP.PAYMENT',
    // Base64 encoded data that contains encrypted payment data. The payment gateway expects the encrypted payment data and meta data for the encryption keys. String, 8192 characters.
    'dataValue' => 'Base64 encoded data',
    'billingFirstName' => 'John',
    'billingLastName' => 'Doe'
    // Also here can be specified all other billing abd shipping parameters:
    //'billingCompany', 'billingAddress', 'billingCity', 'billingState', 'billingZip', 'billingCountry',
    //'shippingFirstName', 'shippingLastName', 'shippingCompany', 'shippingAddress', 'shippingCity', 'billingState', 'shippingZip', 'shippingCountry'.
]);

$response = $gateway->createSubscription([
    // ... Other subscription data ... 
    'opaqueData' => $opaqueData
])->send();
```

## Order:

```php
<?php

use Omnipay\Omnipay;
use Omnipay\AuthorizeNetRecurring;
use Omnipay\AuthorizeNetRecurring\Objects\Order;

$gateway = Omnipay::create('AuthorizeNetRecurring_Recurring');

$gateway->setAuthName('API_LOGIN_ID');
$gateway->setTransactionKey('API_TRANSACTION_KEY');
$gateway->setTestMode(true);

$order = new Order([
    // Merchant-assigned invoice number for the subscription. The invoice number will be associated with each payment in the subscription. String, up to 20 characters.
    'invoiceNumber' => '12345678901234567890',
    // Merchant-provided description of the subscription. The description will be associated with each payment in the subscription.
    'description' => 'Description'
]);

$response = $gateway->createSubscription([
    // ... Other subscription data ... 
    'order' => $order
])->send();
```

## Customer:

```php
<?php

use Omnipay\Omnipay;
use Omnipay\AuthorizeNetRecurring;
use Omnipay\AuthorizeNetRecurring\Objects\Customer;

$gateway = Omnipay::create('AuthorizeNetRecurring_Recurring');

$gateway->setAuthName('API_LOGIN_ID');
$gateway->setTransactionKey('API_TRANSACTION_KEY');
$gateway->setTestMode(true);

$customer = new Customer([
    // Type of customer.
    // Valid values: 'individual' or 'business'.
    'type' => '',
    // The unique customer ID used to represent the customer associated with the transaction. If you use customer IDs, your solution should generate the customer ID and send it with your transaction requests. Authorize.Net does not generate customer IDs.
    // String, up to 20 characters. Use alphanumeric characters only, without spaces, dashes, or other symbols.
    'id' => '12345678901234567890',
    // The customer’s valid email address.
    'email' => 'customer@example.com',
    // Phone number associated with customer’s billing address. String, up to 25 characters.
    'phoneNumber' => '+1 (123) 555-12-34',
    // Fax number associated with customer’s billing address. String, up to 25 characters.
    'faxNumber' => '+1 (123) 555-12-34'
]);

$response = $gateway->createSubscription([
    // ... Other subscription data ... 
    'customer' => $customer
])->send();
```
