<?php
namespace Curzar\CustomerList\Block;

/**
 * Class History
 */
use \Magento\Sales\Model\ResourceModel\Order\CollectionFactoryInterface;

use \Magento\Framework\App\ObjectManager;

class History extends \Magento\Framework\View\Element\Template
{    
	protected $_template = 'Curzar_CustomerList::history.phtml';
    protected $_resource;
    protected $_urlInterface;
    protected $_customerSession;

    protected $customercoursesfactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\UrlInterface $urlinterface,
        \Curzar\CustomerList\Model\CustomercoursesFactory $customercoursesfactory,

        array $data = []
    ) {
        $this->_customerSession = $customerSession;
        $this->customercoursesfactory = $customercoursesfactory;
        $this->_urlInterface = $urlinterface;
        if(!$customerSession->isLoggedIn()) {
        $customerSession->setAfterAuthUrl($this->_urlInterface->getCurrentUrl());
        $customerSession->authenticate();
        }
        parent::__construct($context, $data);
    }

    public function getViewUrl($course_id){
        return $this->getUrl('curzar/course/index', ['course_id' => $course_id]);
    }
 
    public function getCustomer(){
        return $this->_customerSession->getCustomer()->getId();
    }

    public function getCustomerCourses(){
        $customerId = $this->getCustomer();
      return  $this->customercoursesfactory->create()->getCollection()->addFieldToFilter('customer_id',['customer_id' => $customerId]);
    }


 protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $page_size = $this->getPagerCount();
        $page_data = $this->getCustomData();
       
       if ($this->getCustomData()) {
            $pager = $this->getLayout()->createBlock(
                \Magento\Theme\Block\Html\Pager::class,
                'custom.pager.name'
            )
                ->setAvailableLimit($page_size)
                ->setShowPerPage(true)
                ->setCollection($page_data);
            $this->setChild('pager', $pager);
            $this->getCustomData()->load();
        }
        return $this;
    }



    public function getPagerHtml(){
        return $this->getChildHtml('pager');
    }


    public function getCustomData()
    {
        // get param values
        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : 5; // set minimum records
        // get custom collection
        $collection = $this->getCustomerCourses();
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);
        return $collection;
    }


    public function getPagerCount()
    {
        // get collection
        $minimum_show = 5; // set minimum records
        $page_array = [];
        $list_data =$this->getCustomerCourses();
        $list_count = ceil(count($list_data->getData()));
        $show_count = $minimum_show + 1;
        if (count($list_data->getData()) >= $show_count) {
            $list_count = $list_count / $minimum_show;
            $page_nu = $total = $minimum_show;
            $page_array[$minimum_show] = $minimum_show;
            for ($x = 0; $x <= $list_count; $x++) {
                $total = $total + $page_nu;
                $page_array[$total] = $total;
            }
        } else {
            $page_array[$minimum_show] = $minimum_show;
            $minimum_show = $minimum_show + $minimum_show;
            $page_array[$minimum_show] = $minimum_show;
        }
        return $page_array;
    }

    public function getEmptyOrdersMessage()
    {
        return __('You have placed no orders.');
    }



}


