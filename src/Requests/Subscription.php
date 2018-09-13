<?php

namespace Authomnipay\Requests;

use Validator;

class Subscription
{

	protected $url;

    //Get URL depending on TestMode
    protected function getUrl($parameters) {
    	if ($parameters['testMode'] == true) {
    		return 'https://apitest.authorize.net/xml/v1/request.api';
    	}
    	else {
    		return 'https://api.authorize.net/xml/v1/request.api';
    	}
	}

    //Get Authorize Net Subscription info
    public function get($parameters) {
		$this->url = $this->getUrl($parameters);
    	return false;
    }

    //Create Authorize Net Subscription
    public function create($parameters) {
    	$this->url = $this->getUrl($parameters);
        return time();
    }

    //Create Authorize Net Subscription
    public function cancel($parameters) {
    	$this->url = $this->getUrl($parameters);
        return false;
    }

    //Validate required parameters
	public function validateData($parameters) {
		$validator = Validator::make($data, $parameters);
		if (!$validator->fails()) {
			return true;
		}
		else {
			$errors = $validator->errors();
			return array(
				'status' => false,
				'message' => $errors->getMessages()
			);
		}
	}

}