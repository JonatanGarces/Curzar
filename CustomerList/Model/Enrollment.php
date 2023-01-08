<?php
namespace Curzar\CustomerList\Model;

/**
 * Class Enrollment
 */
class Enrollment extends \Magento\Framework\Model\AbstractModel implements
    \Curzar\CustomerList\Api\Data\EnrollmentInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'curzar_customerlist_enrollment';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\Curzar\CustomerList\Model\ResourceModel\Enrollment::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
