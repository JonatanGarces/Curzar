<?php

namespace Curzar\CustomerList\Controller\Course;

use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Framework\App\Action\Action;


class Index extends Action
{
    protected $_pageFactory;


public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return  parent::__construct($context);
    }

	    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
       // $order_id = $this->_request->getParam('order_id');
        //titulo de la pagina:
        //$resultPage->getConfig()->getTitle()->set($order_id);


        $navigationBlock = $resultPage->getLayout()->getBlock('customer_account_navigation');
        
        if ($navigationBlock) {
            $navigationBlock->setActive('curzar/course/history');
        }
        return $resultPage;
    }
}
