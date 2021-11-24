# Magento2 - CMS Block UI Component
This module is used to implement UI Component to render a content of a CMS Block.

### Installation 
- Module path is : app/code/Betagento/CmsUiComponent
- Commands are needed to setup
```
module:enable Betagento_CmsUiComponent     
di:setup:compile
setup:static-content:deploy 
```
### General

We make a UI component <b>"Betagento_CmsUiComponent/js/view/cms_block" </b>. I will render a template content base on a return from a REST API <b>"/V1/cmsuicomponent/:blockId"</b>. The UI component has a option is block_id - a identifier of a block.

So you can easily import it to any parent component or use it standalonely. See blow usecases as an example.


### Use cases:
#### Add a new block cms on a checkout sidebar 
Define a processor hook for a Checkout layout process 
```
<type name="Magento\Checkout\Block\Onepage">
        <arguments>
            <argument name="layoutProcessors" xsi:type="array">
                <item name="cms_ui_component" xsi:type="object">Betagento\CmsUiComponent\Block\Checkout\LayoutProcessor\CmsUiComponentProcessor</item>
            </argument>
        </arguments>
    </type>
```

```
<?php

namespace Betagento\CmsUiComponent\Block\Checkout\LayoutProcessor;

use  \Magento\Checkout\Block\Checkout\LayoutProcessorInterface;

class CmsUiComponentProcessor implements LayoutProcessorInterface
{
    public function process($jsLayout): array
    {

        $jsLayout['components']['checkout']['children']['sidebar']['children']['cms_static_block'] =
            [
                'component' => 'Betagento_CmsUiComponent/js/view/cms_block',
                'displayArea' => 'shipping-information',
                'config' => [
                    'block_id' => 'checkout_sidebar'
                ]
            ];

        return $jsLayout;
    }
}

```

