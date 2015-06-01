<?php

namespace Dwo\ValidationMappingBundle\Tests\DependencyInjection\Compiler;

use Dwo\ValidationMappingBundle\DependencyInjection\Compiler\AddValidationMappingsPass;

/**
 * @author David Wolter <davewwwo@gmail.com>
 */
class AddValidationMappingsPassTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $path = realpath(__DIR__.'/../../Fixtures/validation_mapping.yml');

        $validatorDefinition = $this->getMockBuilder('Symfony\Component\DependencyInjection\Definition')
            ->disableOriginalConstructor()
            ->getMock();

        $validatorDefinition->expects($this->once())
            ->method('addMethodCall')
            ->with('addYamlMappings', array(array($path)));

        $container = $this->getMockBuilder('Symfony\Component\DependencyInjection\ContainerBuilder')
            ->disableOriginalConstructor()
            ->getMock();

        $container->expects($this->once())
            ->method('getParameter')
            ->with('dwo.validation_mappings')
            ->willReturn(
                array(
                    array(
                        'file' => $path
                    )
                )
            );

        $container->expects($this->once())
            ->method('getDefinition')
            ->with('validator.builder')
            ->willReturn($validatorDefinition);

        $container->expects($this->once())
            ->method('addResource');

        $pass = new AddValidationMappingsPass();
        $pass->process($container);
    }
}