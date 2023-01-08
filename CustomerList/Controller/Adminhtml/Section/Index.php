<?php
namespace Curzar\CustomerList\Controller\Adminhtml\Section;


/**
 * Class Index
 */
class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Curzar_CustomerList::sections';
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/sections/index');
        return $resultRedirect;
    }
}
