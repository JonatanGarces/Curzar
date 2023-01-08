<?php
namespace Curzar\CustomerList\Api;

use Curzar\CustomerList\Api\Data\FileInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface FileRepositoryInterface
 *
 * @api
 */
interface FileRepositoryInterface
{
    /**
     * Create or update a File.
     *
     * @param FileInterface $page
     * @return FileInterface
     */
    public function save(FileInterface $page);

    /**
     * Get a File by Id
     *
     * @param int $id
     * @return FileInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If File with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve Files which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete a File
     *
     * @param FileInterface $page
     * @return FileInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If File with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(FileInterface $page);

    /**
     * Delete a File by Id
     *
     * @param int $id
     * @return FileInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
