ValidationMapping
=================

define extra validation files which are not in the 'Bundle*/Resources/config' directory

### Installation

```php
#AppKernel.php

public function registerBundles()
{
    $bundles = array(
        ...
        new Dwo\ValidationMappingBundle\DwoValidationMappingBundle(),
    );
}
```

### Usage 

```yaml
#config.yml

dwo_validation_mapping:
  mappings:
    -
      file: path/to/your/validation/validation.yml"
```