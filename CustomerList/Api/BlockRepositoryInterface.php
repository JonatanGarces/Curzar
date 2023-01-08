<?php
namespace Curzar\CustomerList\Api;

use Curzar\CustomerList\Api\Data\BlockInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface BlockRepositoryInterface
 *
 * @api
 */
interface BlockRepositoryInterface
{
    /**
     * Create or update a Block.
     *
     * @param BlockInterface $page
     * @return BlockInterface
     */
    public function save(BlockInterface $page);

    /**
     * Get a Block by Id
     *
     * @param int $id
     * @return BlockInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Block with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve Blocks which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete a Block
     *
     * @param BlockInterface $page
     * @return BlockInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Block with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(BlockInterface $page);

    /**
     * Delete a Block by Id
     *
     * @param int $id
     * @return BlockInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
