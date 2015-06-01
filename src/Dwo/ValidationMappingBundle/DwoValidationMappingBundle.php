<?php

namespace Dwo\ValidationMappingBundle;

use Dwo\ValidationMappingBundle\DependencyInjection\Compiler\AddValidationMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author David Wolter <davewwwo@gmail.com>
 */
class DwoValidationMappingBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new AddValidationMappingsPass());
    }
}
