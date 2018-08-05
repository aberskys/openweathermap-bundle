<?php

namespace OpenWeatherMapBundle\Exceptions;

class InvalidArgumentException extends \Exception
{
    /**
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}