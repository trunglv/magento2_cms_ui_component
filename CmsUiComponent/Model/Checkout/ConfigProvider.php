<?php
namespace Betagento\CmsUiComponent\Model\Checkout;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\LayoutInterface;
 
class ConfigProvider implements ConfigProviderInterface
{
   /** @var LayoutInterface  */
   protected $_layout;
 
   public function __construct(LayoutInterface $layout)
   {
       $this->_layout = $layout;
   }
 
   public function getConfig()
   {
       /**
        * No need configuration yet, but I think it will be helpful in few cases later
        */
       return [
           'cms_ui_component' => []
       ];
   }
}