<?php
namespace Curzar\CustomerList\Model;

/**
 * Class File
 */
class File extends \Magento\Framework\Model\AbstractModel implements
    \Curzar\CustomerList\Api\Data\FileInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'curzar_customerlist_file';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\Curzar\CustomerList\Model\ResourceModel\File::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
