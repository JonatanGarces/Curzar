<?php

namespace Curzar\Repository\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface PhonecaseSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Curzar\Repository\Api\Data\PhonecaseInterface[]
     */
    public function getItems();

    /**
     * @param \Curzar\Repository\Api\Data\PhonecaseInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}