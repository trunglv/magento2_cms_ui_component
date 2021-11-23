<?php
namespace Betagento\CmsUiComponent\Model;
use Magento\Cms\Model\ResourceModel\Block as ResourceBlock;

class GetBlockByIdentifier 
{
    /**
     * @var \Magento\Cms\Model\Template\FilterProvider
     */
    private $filterProvider;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var \Magento\Cms\Api\Data\BlockInterfaceFactory
     */
    private $blockFactory;

    /**
     * @var ResourceBlock
     */
    private $resourceBlock;

    public function __construct(
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Cms\Api\Data\BlockInterfaceFactory $blockFactory,
        ResourceBlock $resourceBlock
    )
    {
        $this->filterProvider = $filterProvider;
        $this->storeManager = $storeManager;
        $this->blockFactory = $blockFactory;
        $this->resourceBlock = $resourceBlock;
        
    }

    /**
     * @return \Magento\Cms\Api\Data\BlockInterface|bool
     */
    public function execute($identifier){
        $storeId = $this->storeManager->getStore()->getId();
        /**
         * @var \Magento\Cms\Model\Block $block
         */
        $block = $this->blockFactory->create();
        $block->setStoreId($storeId);
        $this->resourceBlock->load($block, $identifier, 'identifier');
        $html = $this->filterProvider->getBlockFilter()->setStoreId($storeId)->filter($block->getContent());
        $block->setContent($html);
        return $block;
    }
}