<?php
namespace Curzar\CustomerList\Controller\Adminhtml\Block;


/**
 * Class Index
 */
class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Curzar_CustomerList::blocks';
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/blocks/index');
        return $resultRedirect;
    }
}
