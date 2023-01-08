<?php
namespace Curzar\CustomerList\Model;

/**
 * Class Customercourses
 */
class Customercourses extends \Magento\Framework\Model\AbstractModel implements
    \Curzar\CustomerList\Api\Data\CustomercoursesInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'curzar_customerlist_customercourses';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\Curzar\CustomerList\Model\ResourceModel\Customercourses::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
