<?php
namespace Curzar\CustomerList\Controller\Adminhtml\Blocks;
class Index extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE='Curzar_CustomerList::blocks';

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
