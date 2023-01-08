<?php
namespace Curzar\CustomerList\Model\ResourceModel\Course;

/**
 * Class Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(
            \Curzar\CustomerList\Model\Course::class,
            \Curzar\CustomerList\Model\ResourceModel\Course::class
        );
    }
}
