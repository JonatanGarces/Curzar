<?php
namespace Curzar\CustomerList\Model;

/**
 * Class Course
 */
class Course extends \Magento\Framework\Model\AbstractModel implements
    \Curzar\CustomerList\Api\Data\CourseInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'curzar_customerlist_course';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\Curzar\CustomerList\Model\ResourceModel\Course::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
