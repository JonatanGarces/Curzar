<?php

namespace Curzar\Repository\Api;

interface PhonecaseRepositoryInterface
{
    /**
     * @param int $id
     * @return \Curzar\Repository\Api\Data\PhonecaseInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Curzar\Repository\Api\Data\PhonecaseInterface $phonecase
     * @return \Curzar\Repository\Api\Data\PhonecaseInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Curzar\Repository\Api\Data\PhonecaseInterface $phonecase);

    /**
     * @param \Curzar\Repository\Api\Data\PhonecaseInterface $phonecase
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(\Curzar\Repository\Api\Data\PhonecaseInterface $phonecase);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface  $searchCriteria
     * @return \Curzar\Repository\Api\Data\PhonecaseSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}