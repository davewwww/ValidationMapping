<?php

namespace Dwo\ValidationMappingBundle;

use Dwo\ValidationMappingBundle\DependencyInjection\Compiler\AddValidationMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author David Wolter <david@lovoo.com>
 */
class ValidationMappingBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new AddValidationMappingsPass());
    }
}
