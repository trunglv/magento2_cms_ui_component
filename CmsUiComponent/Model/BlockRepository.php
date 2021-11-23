<?php
namespace Betagento\CmsUiComponent\Model;

use Magento\Cms\Api\BlockRepositoryInterface ;
use Magento\Cms\Model\BlockRepository as CmsBlockRepository;
use Magento\Framework\App\ObjectManager;
use Betagento\CmsUiComponent\Model\Security\IsAllowedForBlockId;
use Betagento\CmsUiComponent\Model\GetBlockByIdentifier;

class BlockRepository extends CmsBlockRepository implements BlockRepositoryInterface  
{
    /**
     * Load Block data by given Block Identity
     *
     * @param string $blockId
     * @return Magento\Cms\Api\Data\BlockInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($blockId)
    {
        /**
         * Why do I use ObjectManager here ? Because a parent class has a lot of arguments. It's not too bad to use it here.
         */
        $isAllowedBlockId = ObjectManager::getInstance()->get(IsAllowedForBlockId::class);
        if($isAllowedBlockId->execute($blockId)){
            $getBlockByIdentifier = ObjectManager::getInstance()->get(GetBlockByIdentifier::class);
            return $getBlockByIdentifier->execute($blockId);
        }
        /** Check allowed block Id here */   
    }
}
