<?php
namespace Curzar\CustomerList\Model\ResourceModel\Section;

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
            \Curzar\CustomerList\Model\Section::class,
            \Curzar\CustomerList\Model\ResourceModel\Section::class
        );
    }
}
