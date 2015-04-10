<?php

namespace Dwo\ValidationMappingBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author David Wolter <david@lovoo.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dwo_validation_mapping');

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