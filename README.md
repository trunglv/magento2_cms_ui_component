# cms_ui_component
This module is used to implement UI Component to render content of a CMS Block.

### Installation 
- Module path is : app/code/Betagento/CmsUiComponent
- Commands are needed to setup
   module:enable Betagento_CmsUiComponent     
   di:setup:compile
   setup:static-content:deploy 
### General

We make a UI component "Betagento_CmsUiComponent/js/view/cms_block". I will render a template content base on a return from a REST API "/V1/cmsuicomponent/:blockId". The UI component has a option is block_id, a identifier of a block.

So you can easily import it to any parent component or use it standalonely. See blow usecases as an example.


### Use cases:
#### Add a new block cms on a checkout sidebar 
Define a processor hook for a Checkout layout process 
```
<type name="Magento\Checkout\Block\Onepage">
        <arguments>
            <argument name="layoutProcessors" xsi:type="array">
                <item name="cms_ui_component" xsi:type="object">Betagento\CmsUiComponent\Plugin\Block\Checkout\LayoutProcessor</item>
            </argument>
        </arguments>
    </type>
```

```
<?php

namespace Betagento\CmsUiComponent\Plugin\Block\Checkout;

use  \Magento\Checkout\Block\Checkout\LayoutProcessorInterface;
/*
class LayoutProcessor implements LayoutProcessorInterface
{
    public function process($jsLayout): array
    {

        $jsLayout['components']['checkout']['children']['sidebar']['children']['cms_static_block'] =
            [
                'component' => 'Betagento_CmsUiComponent/js/view/cms_block',
                'displayArea' => 'shipping-information',
                'config' => [
                    'block_id' => 'checkout_sidebar' /* This is identifier of a cms block that you want to show on checkout sidebar*/
                ]
            ];

        return $jsLayout;
    }
}

```

