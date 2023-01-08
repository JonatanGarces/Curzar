<?php
namespace Curzar\CustomerList\Model\ResourceModel\Customercourses;

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
            \Curzar\CustomerList\Model\Customercourses::class,
            \Curzar\CustomerList\Model\ResourceModel\Customercourses::class
        );
    }
}
