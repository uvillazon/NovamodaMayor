<?php

namespace Novamoda\MayorBundle;

use Novamoda\MayorBundle\DependencyInjection\Security\Factory\JWTFactory;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class NovamodaMayorBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container) {
        parent::build($container);

        $extension = $container->getExtension('security');
//        var_dump($extension);die();
        $extension->addSecurityListenerFactory(new JWTFactory());
    }
}
