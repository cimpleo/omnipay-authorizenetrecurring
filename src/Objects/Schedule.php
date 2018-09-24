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

        $this->setIntervalLength($parameters['intervalLength']);
        $this->setIntervalUnit($parameters['intervalUnit']);
        $this->setStartDate($parameters['startDate']);
        $this->setTotalOccurrences($parameters['totalOccurrences']);
        $this->setTrialOccurrences($parameters['trialOccurrences']);
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
    

    protected function setIntervalLength(int $value) {
        if ($value < 7 || $value > 365) {
            throw new InvalidRequestException('Interval Length must be a string, between "7" and "365".');
        }
        $this->intervalLength = (string)$value;
    }

    protected function setIntervalUnit(string $value) {
        if ($value != 'days' && $value != 'months') {
            throw new InvalidRequestException('Interval Unit must must have only this values: "days", "months"');
        }
        $this->intervalUnit = $value;
    }

    protected function setStartDate( string $value) {
        $this->startDate = $this->validateDate($value);
    }

    private function validateDate($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }


    protected function setTotalOccurrences(int $value) {
        if ($value < 1 || $value > 9999) {
            throw new InvalidRequestException('Interval Unit must be a string, between "1" and "9999".');
        }
        $this->totalOccurrences = (string)$value;
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