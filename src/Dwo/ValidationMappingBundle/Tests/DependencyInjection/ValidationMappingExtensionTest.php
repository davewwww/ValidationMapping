<?php

namespace Dwo\ValidationMappingBundle\Tests\DependencyInjection;

use Dwo\ValidationMappingBundle\DependencyInjection\DwoValidationMappingExtension;

/**
 * @author David Wolter <davewwwo@gmail.com>
 */
class ValidationMappingExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $configs = array(
            'dwo_validation_mapping' => array(
                'mappings' => $mappings = array(
                    array(
                        'file' => 'foo/bar.yml'
                    )
                )
            )
        );

        $container = $this->getMockBuilder('Symfony\Component\DependencyInjection\ContainerBuilder')
            ->disableOriginalConstructor()
            ->getMock();

        $container->expects($this->once())
            ->method('setParameter')
            ->with('dwo.validation_mappings', $mappings);

        $extension = new DwoValidationMappingExtension();

        $extension->load($configs, $container);
    }
}