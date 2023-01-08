<?php
namespace Curzar\CustomerList\Model\ResourceModel;

/**
 * Class Course
 */
class Course extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init('curzar_customerlist_course', 'course_id');
    }
}
