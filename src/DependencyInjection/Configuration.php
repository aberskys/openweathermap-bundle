<?php

namespace OpenWeatherMap\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('owm_client');

        $rootNode
            ->children()
            ->scalarNode('api_url')
            ->isRequired()
            ->end()
            ->end();

        return $treeBuilder;
    }
}