<?php
namespace Curzar\CustomerList\Api;

use Curzar\CustomerList\Api\Data\CustomercoursesInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface CustomercoursesRepositoryInterface
 *
 * @api
 */
interface CustomercoursesRepositoryInterface
{
    /**
     * Create or update a Customercourses.
     *
     * @param CustomercoursesInterface $page
     * @return CustomercoursesInterface
     */
    public function save(CustomercoursesInterface $page);

    /**
     * Get a Customercourses by Id
     *
     * @param int $id
     * @return CustomercoursesInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Customercourses with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve Customercoursess which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete a Customercourses
     *
     * @param CustomercoursesInterface $page
     * @return CustomercoursesInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Customercourses with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(CustomercoursesInterface $page);

    /**
     * Delete a Customercourses by Id
     *
     * @param int $id
     * @return CustomercoursesInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
