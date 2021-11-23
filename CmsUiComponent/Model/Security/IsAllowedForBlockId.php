<?php
namespace Betagento\CmsUiComponent\Model\Security;

class IsAllowedForBlockId 
{
    /**
     * @var array
     */
    protected $allowedBlockIds;

    public function __construct(
        $allowedBlockIds = []
    )
    {
        $this->allowedBlockIds = $allowedBlockIds;
    }
    /**
     * @param string $identifier
     * @return bool
     */
    public function execute($identifier) : bool{
        /**
         * You can implement your rules here to avoid someone get all your block cms
         */
        return true;
    }
}
