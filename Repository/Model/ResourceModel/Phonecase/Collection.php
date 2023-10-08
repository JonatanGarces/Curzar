<?php

namespace Curzar\Repository\Model\ResourceModel\Phonecase;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Curzar\Repository\Model\ResourceModel\Phonecase;

class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Curzar\Repository\Model\Phonecase::class,
        Phonecase::class);
    }
}