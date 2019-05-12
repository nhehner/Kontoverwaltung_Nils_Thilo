<?php

namespace AppBundle;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class AppCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container
            ->getDefinition('serializer')
            ->setConfigurator([
                new Reference(AppConfigurer::class), 'configureNormalizer'
            ]);
    }
}