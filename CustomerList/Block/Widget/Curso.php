<?php
 namespace Curzar\CustomerList\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Curso extends Template implements BlockInterface
{
    protected $_template = "Curzar_CustomerList::widget/course_widget.phtml";

    protected $course_id;
    protected $sectionFactory;
    protected $fileFactory;
    protected $courseFactory;
    protected $blockFactory;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var SearchCriteriaBuilderFactory
     */
    private $searchCriteriaBuilderFactory;

    /**
     * @param Template\Context $context
     * @param ProductRepositoryInterface $productRepository
     * @param SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,

        \Curzar\CustomerList\Model\SectionFactory $sectionFactory,
        \Curzar\CustomerList\Model\FileFactory $fileFactory,
        \Curzar\CustomerList\Model\BlockFactory $blockFactory,
        \Curzar\CustomerList\Model\CourseFactory $courseFactory,



        array $data = []
    ) {

        $this->sectionFactory = $sectionFactory;
        $this->fileFactory = $fileFactory;
        $this->blockFactory = $blockFactory;
        $this->courseFactory = $courseFactory;

        parent::__construct($context, $data);
    }


    function setCourseId($id){
            $this->course_id = $id;
    }

    function getCourseInfo(){
        $course = $this->courseFactory->create();
        $collection = $course->getCollection()->addFieldToFilter('course_id',['course_id' =>$this->course_id])->getFirstItem();
        return $collection->getName();
    }

        function getCourseUrl(){
        $course = $this->courseFactory->create();
        $collection = $course->getCollection()->addFieldToFilter('course_id',['course_id' =>$this->course_id])->getFirstItem();
        return $collection->getUrl();
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
}