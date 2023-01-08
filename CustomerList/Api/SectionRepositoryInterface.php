<?php
namespace Curzar\CustomerList\Api;

use Curzar\CustomerList\Api\Data\SectionInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface SectionRepositoryInterface
 *
 * @api
 */
interface SectionRepositoryInterface
{
    /**
     * Create or update a Section.
     *
     * @param SectionInterface $page
     * @return SectionInterface
     */
    public function save(SectionInterface $page);

    /**
     * Get a Section by Id
     *
     * @param int $id
     * @return SectionInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Section with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve Sections which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete a Section
     *
     * @param SectionInterface $page
     * @return SectionInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Section with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(SectionInterface $page);

    /**
     * Delete a Section by Id
     *
     * @param int $id
     * @return SectionInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
