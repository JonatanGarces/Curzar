<?php
namespace Curzar\CustomerList\Controller\Adminhtml\File;


/**
 * Class Index
 */
class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Curzar_CustomerList::files';
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/files/index');
        return $resultRedirect;
    }
}
