<?php

namespace Kruske\KruskeTPVVirtualBBVABundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Definition\Processor;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class KruskeTPVVirtualBBVAExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);
        
        $container->setParameter('kruske_tpv_virtual_bbva.url_tpv', $config['url_tpv']);
        $container->setParameter('kruske_tpv_virtual_bbva.clave_tpv', $config['clave_tpv']);
        $container->setParameter('kruske_tpv_virtual_bbva.name_tpv', $config['name_tpv']);
        $container->setParameter('kruske_tpv_virtual_bbva.code_tpv', $config['code_tpv']);
        $container->setParameter('kruske_tpv_virtual_bbva.terminal_tpv', $config['terminal_tpv']);
        $container->setParameter('kruske_tpv_virtual_bbva.currency_tpv', $config['currency_tpv']);
        $container->setParameter('kruske_tpv_virtual_bbva.transaction_type_tpv', $config['transaction_type_tpv']);
        $container->setParameter('kruske_tpv_virtual_bbva.url_merchant_tpv', $config['url_merchant_tpv']);

    }
 
    public function getAlias()
    {
        return 'kruske_tpv_virtual_bbva';
    }
}
