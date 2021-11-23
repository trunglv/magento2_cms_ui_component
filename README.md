# cms_ui_component
This module is used to implement UI Component to render content of a CMS Block.

### Installation 
- Module path is : app/code/Betagento/CmsUiComponent
- Commands are needed to setup
   module:enable Betagento_CmsUiComponent     
   di:setup:compile
   setup:static-content:deploy 

### Use cases:
## Add a new block cms on a checkout sidebar 

```
<?php

namespace Betagento\CmsUiComponent\Plugin\Block\Checkout;

use  \Magento\Checkout\Block\Checkout\LayoutProcessorInterface;

class LayoutProcessor implements LayoutProcessorInterface
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

