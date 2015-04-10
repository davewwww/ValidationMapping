<?php

namespace Dwo\ValidationMappingBundle\Tests;

use Dwo\ValidationMappingBundle\DwoValidationMappingBundle;

/**
 * @author David Wolter <david@lovoo.com>
 */
class DwoValidationMappingBundleTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $container = $this->getMockBuilder('Symfony\Component\DependencyInjection\ContainerBuilder')
            ->disableOriginalConstructor()
            ->getMock();

        $container->expects($this->once())
            ->method('addCompilerPass')
            ->with($this->isInstanceOf('Dwo\ValidationMappingBundle\DependencyInjection\Compiler\AddValidationMappingsPass'));

        $bundle = new DwoValidationMappingBundle();

        $bundle->build($container);
    }
}