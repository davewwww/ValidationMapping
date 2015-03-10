<?php

namespace Lab\ValidationMappingBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author David Wolter <david@lovoo.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('lab_validation_mapping');

        $rootNode
            ->children()
            ->arrayNode('mappings')
            ->prototype('array')
            ->children()
            ->scalarNode('file')->end()
            ->end()
            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}