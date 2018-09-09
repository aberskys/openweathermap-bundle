<?php

namespace OpenWeatherMapClient\Client;

use GuzzleHttp\ClientInterface;
use OpenWeatherMapClient\Exceptions\NonEncodableValueException;
use OpenWeatherMapClient\Model\CurrentWeatherModel;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

class ApiClient
{
    private const CURRENT_WEATHER = '/weather';

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @param ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param CurrentWeatherModel $model
     *
     * @return array
     */
    public function getCurrentWeatherByCity(CurrentWeatherModel $model): array
    {
        return $this->makeRequest(
            Request::METHOD_GET,
            self::CURRENT_WEATHER,
            ['q' => $model->getCityName()]
        );
    }

    /**
     * @param CurrentWeatherModel $model
     *
     * @return array
     */
    public function getCurrentWeatherByCoordinates(CurrentWeatherModel $model): array
    {
        return $this->makeRequest(
            Request::METHOD_GET,
            self::CURRENT_WEATHER,
            [
                'lat' => $model->getLatitude(),
                'lon' => $model->getLongtitude(),
            ]
        );
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     *
     * @return array
     */
    private function makeRequest(string $method, string $uri, array $options): array
    {
        return $this->parse($this->httpClient->request($method, $uri, $options));
    }

    /**
     * @param ResponseInterface $response
     *
     * @return array
     *
     * @throws NonEncodableValueException
     */
    private function parse(ResponseInterface $response): array
    {
        $body = \json_decode($response->getBody()->getContents(), true);

        if (JSON_ERROR_NONE !== \json_last_error()) {
            throw new NonEncodableValueException(\json_last_error_msg());
        }

        return \array_merge(['status' => $response->getStatusCode()], $body);
    }
}
