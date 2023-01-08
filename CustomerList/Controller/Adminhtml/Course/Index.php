<?php
namespace Curzar\CustomerList\Controller\Adminhtml\Course;


/**
 * Class Index
 */
class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Curzar_CustomerList::courses';
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/courses/index');
        return $resultRedirect;
    }
}
