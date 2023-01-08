<?php
namespace Curzar\CustomerList\Controller\Adminhtml\Section;


/**
 * Class NewAction
 */
class NewAction extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Curzar_CustomerList::sections';
    protected $resultPageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
