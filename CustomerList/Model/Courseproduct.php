<?php
namespace Curzar\CustomerList\Model;

/**
 * Class Courseproduct
 */
class Courseproduct extends \Magento\Framework\Model\AbstractModel implements
    \Curzar\CustomerList\Api\Data\CourseproductInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'curzar_customerlist_courseproduct';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\Curzar\CustomerList\Model\ResourceModel\Courseproduct::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
