<?php

namespace OpenWeatherMapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('openweathermap_client');

        $rootNode
            ->children()
            ->scalarNode('api_url')
            ->isRequired()
            ->end()
            ->end();

        return $treeBuilder;
    }
}