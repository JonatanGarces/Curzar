<?php
namespace Curzar\CustomerList\Ui\Component\Listing\DataProviders\Curzar;


/**
 * Class Sections
 */
class Sections extends \Magento\Ui\DataProvider\AbstractDataProvider
{    
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Curzar\CustomerList\Model\ResourceModel\Section\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }
}
