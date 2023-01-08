<?php
namespace Curzar\CustomerList\Block;
use Magento\Customer\Model\Context;

/**
 * Class Index
 */
class Index extends \Magento\Framework\View\Element\Template 
{
    protected $sectionFactory;
    protected $fileFactory;
    protected $courseFactory;
    protected $course_id;
    protected $_template = 'Curzar_CustomerList:index.phtml';
    protected $_urlInterface;



    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Curzar\CustomerList\Model\SectionFactory $sectionFactory,
        \Curzar\CustomerList\Model\FileFactory $fileFactory,
        \Curzar\CustomerList\Model\BlockFactory $blockFactory,
        \Curzar\CustomerList\Model\CourseFactory $courseFactory,
        \Magento\Framework\UrlInterface $urlinterface,

  
        array $data = []
    ) {
        $this->sectionFactory = $sectionFactory;
        $this->fileFactory = $fileFactory;
        $this->blockFactory = $blockFactory;
        $this->courseFactory = $courseFactory;
        $this->_urlInterface = $urlinterface;


        $this->_customerSession = $customerSession;

      if(!$customerSession->isLoggedIn()) {
        $customerSession->setAfterAuthUrl($this->_urlInterface->getCurrentUrl());
       $customerSession->authenticate();
      }
        parent::__construct($context, $data);
    }

       protected function _prepareLayout()
    {
        $this->course_id = $this->_request->getParam('course_id');

        $this->pageConfig->getTitle()->set($this->getCourseInfo());
        //$infoBlock = $this->paymentHelper->getInfoBlock($this->getOrder()->getPayment(), $this->getLayout());
        //$this->setChild('payment_info', $infoBlock);
    }


    function getCourseInfo(){
        $course = $this->courseFactory->create();
        $collection = $course->getCollection()->addFieldToFilter('course_id',['course_id' =>$this->course_id])->getFirstItem();
        return $collection->getName();
    }


    function getSections()
    {
        $section = $this->sectionFactory->create();
        $collection = $section->getCollection()->addFieldToFilter('course_id',['course_id' => $this->course_id])->setOrder('position','ASC');
        return $collection;
    }   

    function getBlocks($section_id){
        $block = $this->blockFactory->create();
        $collection = $block->getCollection()->addFieldToFilter('section_id',['section_id' => $section_id])->setOrder('position','ASC');
        return $collection;
    }

    function getFiles($block_id){
        $file = $this->fileFactory->create();
        $collection = $file->getCollection()->addFieldToFilter('block_id',['block_id' => $block_id])->setOrder('position','ASC');
        return $collection;
    }


    function AnchorDownloadFile($url,$name){
        $html = '<div class="d-flex text-muted pt-3"><a href="'.$url.'" target="_blank">'.$name.'</a></div>';
        return $html;
    }




}
