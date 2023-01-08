<?php
namespace Curzar\CustomerList\Api;

use Curzar\CustomerList\Api\Data\EnrollmentInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface EnrollmentRepositoryInterface
 *
 * @api
 */
interface EnrollmentRepositoryInterface
{
    /**
     * Create or update a Enrollment.
     *
     * @param EnrollmentInterface $page
     * @return EnrollmentInterface
     */
    public function save(EnrollmentInterface $page);

    /**
     * Get a Enrollment by Id
     *
     * @param int $id
     * @return EnrollmentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Enrollment with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve Enrollments which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete a Enrollment
     *
     * @param EnrollmentInterface $page
     * @return EnrollmentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Enrollment with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(EnrollmentInterface $page);

    /**
     * Delete a Enrollment by Id
     *
     * @param int $id
     * @return EnrollmentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
