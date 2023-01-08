<?php
namespace Curzar\CustomerList\Model\ResourceModel;

/**
 * Class Courseproduct
 */
class Courseproduct extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init('curzar_customerlist_courseproduct', 'courseproduct_id');
    }
}
