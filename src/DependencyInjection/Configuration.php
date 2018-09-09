<?php

namespace OpenWeatherMapClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('open_weather_map_client');

        $rootNode
            ->children()
            ->scalarNode('api_url')
            ->isRequired()
            ->end()
            ->end();

        return $treeBuilder;
    }
}