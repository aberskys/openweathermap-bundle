<?php

namespace OpenWeatherMapBundle\Model;

use OpenWeatherMapBundle\Exceptions\InvalidCurrentWeatherModelException;

class CurrentWeatherModel
{
    /**
     * @var string
     */
    private $cityName;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longtitude;

    /**
     * @param string|null $cityName
     * @param string|null $latitude
     * @param string|null $longtitude
     */
    public function __construct(string $cityName = null, string $latitude = null, string $longtitude = null)
    {
        $this->cityName = $cityName;
        $this->latitude = $latitude;
        $this->longtitude = $longtitude;

        $this->assertModelValid();
    }

    /**
     * @return string
     */
    public function getCityName(): string
    {
        return $this->cityName;
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function getLongtitude(): string
    {
        return $this->longtitude;
    }

    /**
     * @throws InvalidCurrentWeatherModelException
     */
    private function assertModelValid(): void
    {
        if (!$this->cityName || (!$this->latitude && !$this->longtitude)) {
            throw new InvalidCurrentWeatherModelException();
        }
    }
}