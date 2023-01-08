<?php
namespace Curzar\CustomerList\Api;

use Curzar\CustomerList\Api\Data\CourseInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface CourseRepositoryInterface
 *
 * @api
 */
interface CourseRepositoryInterface
{
    /**
     * Create or update a Course.
     *
     * @param CourseInterface $page
     * @return CourseInterface
     */
    public function save(CourseInterface $page);

    /**
     * Get a Course by Id
     *
     * @param int $id
     * @return CourseInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Course with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve Courses which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete a Course
     *
     * @param CourseInterface $page
     * @return CourseInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Course with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(CourseInterface $page);

    /**
     * Delete a Course by Id
     *
     * @param int $id
     * @return CourseInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
