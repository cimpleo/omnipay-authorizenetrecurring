<?php

namespace Omnipay\AuthorizeNetRecurring\Objects;

use Academe\AuthorizeNet\PaymentInterface;
use Academe\AuthorizeNet\AbstractModel;
use Omnipay\Common\Exception\InvalidRequestException;

class Schedule extends AbstractModel
{

    protected $intervalLength;
    protected $intervalUnit;
    protected $startDate;
    protected $totalOccurrences;
    protected $trialOccurrences;

    public function __construct($parameters = null) {
        parent::__construct();
        if (isset($parameters['intervalLength'])) {
            $this->setIntervalLength($parameters['intervalLength']);
        }
        if (isset($parameters['intervalUnit'])) {
            $this->setIntervalUnit($parameters['intervalUnit']);
        }
        if (isset($parameters['startDate'])) {
            $this->setStartDate($parameters['startDate']);
        }
        if (isset($parameters['totalOccurrences'])) {
            $this->setTotalOccurrences($parameters['totalOccurrences']);
        }
        if (isset($parameters['trialOccurrences'])) {
            $this->setTrialOccurrences($parameters['trialOccurrences']);
        }
    }

    public function jsonSerialize() {
        $data = array(
            'interval' => array(
                'length' => $this->getIntervalLength(),
                'unit' => $this->getIntervalUnit(),
            ),
            'startDate' => $this->getStartDate(),
            'totalOccurrences' => $this->getTotalOccurrences(),
            'trialOccurrences' => $this->getTrialOccurrences(),
        );
        return $data;
    }

    protected function setIntervalLength($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Interval Length must be a string.');
        }
        else if ((int)$value < 7 || (int)$value > 365) {
            throw new InvalidRequestException('Interval Length must be a string, between "7" and "365".');
        }
        $this->intervalLength = $value;
    }
    protected function getIntervalLength() {
        return $this->intervalLength;
    }

    protected function setIntervalUnit($value) {
        if ($value != 'days' && $value != 'months') {
            throw new InvalidRequestException('Interval Unit must must have only this values: "days", "months"');
        }
        $this->intervalUnit = $value;
    }
    protected function getIntervalUnit() {
        return $this->intervalUnit;
    }

    protected function setStartDate($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Start Date must be a string.');
        }
        else {
            $expValue = explode('-',$value);
            if ((int)$expValue[0] < date('Y') || 
                (int)$expValue[0] > (date('Y')+10) || 
                (int)$expValue[1] < 1 || 
                (int)$expValue[1] > 12 || 
                (int)$expValue[2] < 1 || 
                (int)$expValue[2] > 31) {
                throw new InvalidRequestException('Start Date must have next format: (YYYY-MM-DD).');
            }
        }
        $this->startDate = $value;
    }
    protected function getStartDate() {
        return $this->startDate;
    }

    protected function setTotalOccurrences($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Total Occurrences must be a string.');
        }
        else if ((int)$value < 1 || (int)$value > 9999) {
            throw new InvalidRequestException('Interval Unit must be a string, between "1" and "9999".');
        }
        $this->totalOccurrences = $value;
    }
    protected function getTotalOccurrences() {
        return $this->totalOccurrences;
    }

    protected function setTrialOccurrences($value) {
        if (!is_string($value)) {
            throw new InvalidRequestException('Trial Occurrences must be a string.');
        }
        else if ((int)$value < 1 || (int)$value > 99) {
            throw new InvalidRequestException('Interval Unit must be a string, between "1" and "99".');
        }
        $this->trialOccurrences = $value;
    }
    protected function getTrialOccurrences() {
        return $this->trialOccurrences;
    }

}