<?php
namespace Curzar\CustomerList\Model;

/**
 * Class Section
 */
class Section extends \Magento\Framework\Model\AbstractModel implements
    \Curzar\CustomerList\Api\Data\SectionInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'curzar_customerlist_section';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\Curzar\CustomerList\Model\ResourceModel\Section::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
