<?php

namespace Vendor\Authomnipay;

use src\ApiGateway;

class Authomnipay
{
	function test(){
		$api = new ApiGateway;
		echo $api->getName();
	}



}