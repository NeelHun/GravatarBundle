<?php

namespace Ornicar\GravatarBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('ornicar_gravatar');
        if (!method_exists($treeBuilder, 'getRootNode')) {
	        $rootNode = $treeBuilder->root('ornicar_gravatar', 'array');
        } else {
        	$rootNode = $treeBuilder->getRootNode();
        }
        $rootNode
            ->children()
                ->scalarNode('size')->defaultValue('80')->end()
                ->scalarNode('rating')->defaultValue('g')->end()
                ->scalarNode('default')->defaultValue('mm')->end()
                ->booleanNode('secure')->defaultFalse()->end()
            ->end();

        return $treeBuilder;
    }
}
