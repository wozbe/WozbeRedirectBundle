<?php

namespace Armetiz\RedirectBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ArmetizRedirectExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        
        $domains = $config["domains"];
        $aliases = array();
        
        foreach ($domains as $domain => $informations) {
            foreach ($informations["aliases"] as $alias) {
                $aliases[$alias] = $domain;
            }
        }
        
        $requestListenerDef = $container->getDefinition("armetiz.redirect.listener.request");
        $requestListenerDef->addMethodCall("setAliases", array($aliases));
    }
}