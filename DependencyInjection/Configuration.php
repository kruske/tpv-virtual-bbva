<?php

namespace Kruske\KruskeTPVVirtualBBVABundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('kruske_tpv_virtual_bbva');

        $rootNode
            ->children()
                ->scalarNode('url_tpv')->isRequired()->end()
                ->scalarNode('clave_tpv')->isRequired()->end()
                ->scalarNode('name_tpv')->isRequired()->end()
                ->scalarNode('code_tpv')->isRequired()->end()
                ->scalarNode('terminal_tpv')->isRequired()->end()
                ->scalarNode('currency_tpv')->isRequired()->end()
                ->scalarNode('transaction_type_tpv')->isRequired()->end()
                ->scalarNode('url_merchant_tpv')->isRequired()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
