<?php

namespace Dwo\ValidationMappingBundle\DependencyInjection\Compiler;

use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author David Wolter <davewwwo@gmail.com>
 */
class AddValidationMappingsPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $mappings = $container->getParameter('dwo.validation_mappings');
        $validatorBuilder = $container->getDefinition('validator.builder');

        $xmlMappings = $yamlMappings = [];

        if (count($mappings) > 0) {
            foreach ($mappings as $entry) {
                $file = realpath($entry['file']);
                if (!is_file($file)) {
                    throw new \RuntimeException(sprintf('Could not load file "%s".', $entry['file']));
                }
                $container->addResource(new FileResource($file));

                if (preg_match('/\.(yml|xml)$/', $file, $matches)) {
                    if ('yml' === $matches[1]) {
                        $yamlMappings[] = $file;
                    } elseif ('xml' === $matches[1]) {
                        $xmlMappings[] = $file;
                    }
                } else {
                    throw new \RuntimeException(sprintf('Unsupported mapping type in "%s".', $file));
                }
            }
        }

        if (count($xmlMappings) > 0) {
            $validatorBuilder->addMethodCall('addXmlMappings', array($xmlMappings));
        }

        if (count($yamlMappings) > 0) {
            $validatorBuilder->addMethodCall('addYamlMappings', array($yamlMappings));
        }
    }
}
