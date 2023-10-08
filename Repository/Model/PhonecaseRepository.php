<?php

namespace Curzar\Repository\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Curzar\Repository\Api\Data\PhonecaseInterface;
use Curzar\Repository\Api\Data\PhonecaseSearchResultInterfaceFactory;
use Curzar\Repository\Api\PhonecaseRepositoryInterface;
use Curzar\Repository\Model\ResourceModel\Phonecase;
use Curzar\Repository\Model\ResourceModel\Phonecase\CollectionFactory;

class PhonecaseRepository implements PhonecaseRepositoryInterface
{

    /**
     * @var PhonecaseFactory
     */
    private $phonecaseFactory;

    /**
     * @var Phonecase
     */
    private $phonecaseResource;

    /**
     * @var PhonecaseCollectionFactory
     */
    private $phonecaseCollectionFactory;

    /**
     * @var PhonecaseSearchResultInterfaceFactory
     */
    private $searchResultFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    public function __construct(
        PhonecaseFactory $phonecaseFactory,
        Phonecase $phonecaseResource,
        CollectionFactory $phonecaseCollectionFactory,
        PhonecaseSearchResultInterfaceFactory $phonecaseSearchResultInterfaceFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->phonecaseFactory = $phonecaseFactory;
        $this->phonecaseResource = $phonecaseResource;
        $this->phonecaseCollectionFactory = $phonecaseCollectionFactory;
        $this->searchResultFactory = $phonecaseSearchResultInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param int $id
     * @return \Curzar\Repository\Api\Data\PhonecaseInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id)
    {
        $phonecase = $this->phonecaseFactory->create();
        $this->phonecaseResource->load($phonecase, $id);
        if (!$phonecase->getId()) {
            throw new NoSuchEntityException(__('Unable to find Phonecase with ID "%1"', $id));
        }
        return $phonecase;
    }

    /**
     * @param \Curzar\Repository\Api\Data\PhonecaseInterface $phonecase
     * @return \Curzar\Repository\Api\Data\PhonecaseInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(PhonecaseInterface $phonecase)
    {
        $this->phonecaseResource->save($phonecase);
        return $phonecase;
    }

    /**
     * @param \Curzar\Repository\Api\Data\PhonecaseInterface $phonecase
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(PhonecaseInterface $phonecase)
    {
        try {
            $this->phonecaseResource->delete($phonecase);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }

        return true;

    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Curzar\Repository\Api\Data\PhonecaseSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null)
    {
        $collection = $this->phonecaseCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());

        return $searchResults;
    }
}