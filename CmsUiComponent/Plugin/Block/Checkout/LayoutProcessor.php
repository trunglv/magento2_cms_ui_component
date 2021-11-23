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
