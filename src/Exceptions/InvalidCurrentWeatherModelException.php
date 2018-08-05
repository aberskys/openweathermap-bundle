<?php

namespace OpenWeatherMapBundle\Exceptions;

class InvalidCurrentWeatherModelException extends \Exception
{
    public function __construct()
    {
        parent::__construct('error.curr_weather.invalid_model');
    }
}