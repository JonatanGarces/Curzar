<?php
namespace Curzar\CustomerList\Api;

use Curzar\CustomerList\Api\Data\CourseproductInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface CourseproductRepositoryInterface
 *
 * @api
 */
interface CourseproductRepositoryInterface
{
    /**
     * Create or update a Courseproduct.
     *
     * @param CourseproductInterface $page
     * @return CourseproductInterface
     */
    public function save(CourseproductInterface $page);

    /**
     * Get a Courseproduct by Id
     *
     * @param int $id
     * @return CourseproductInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Courseproduct with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve Courseproducts which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete a Courseproduct
     *
     * @param CourseproductInterface $page
     * @return CourseproductInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Courseproduct with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(CourseproductInterface $page);

    /**
     * Delete a Courseproduct by Id
     *
     * @param int $id
     * @return CourseproductInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
