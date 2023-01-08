<?php

namespace Curzar\CustomerList\Block\Onepage;

use Magento\Framework\App\ObjectManager;


class CustomSuccess extends \Magento\Checkout\Block\Onepage\Success
{
    protected $orderItemsDetails;


    public function __construct(
       \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Sales\Model\Order\Config $orderConfig,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Sales\Model\Order $orderItemsDetails,

        array $data = []

    ) {
         parent::__construct($context, $checkoutSession, $orderConfig, $httpContext, $data);
                 $this->orderItemsDetails = $orderItemsDetails;

    }



   public function getCustomURl(){
        return $this->getUrl('curzar/course/history');
    }


    public function getOrderProducts(){

                $IncrementId  = $this->_checkoutSession->getLastRealOrder()->getIncrementId();
                $order = $this->orderItemsDetails->loadByIncrementId($IncrementId);
       return $order;

        //$lid  = $this->_checkoutSession->getLastOrderId();
        //$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        //$order = $objectManager->create('Magento\Sales\Model\Order')->load($lid);
        //$items = $order->getAllItems();
        //foreach($items as $i){
        //$_product = $objectManager->create('Magento\Catalog\Model\Product')->load($i->getProductId())->getSku();
        //}

    }
}