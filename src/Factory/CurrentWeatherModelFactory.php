<?php

namespace OpenWeatherMapClient\Factory;

use OpenWeatherMapClient\Exceptions\InvalidArgumentException;
use OpenWeatherMapClient\Model\CurrentWeatherModel;

class CurrentWeatherModelFactory
{
    /**
     * @var array
     */
    private static $requiredParams = [
        'cityName',
        'latitude',
        'longtitude'
    ];

    public function create(array $params): CurrentWeatherModel
    {
        $diff = \array_diff(self::$requiredParams, $params);

        if (\count($diff) > 0){
            throw new InvalidArgumentException('Missing parameters for CurrentWeatherModel.');
        }

        return new CurrentWeatherModel(
            $params['cityName'],
            $params['latitude'],
            $params['longtitude']
        );
    }
}