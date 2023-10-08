<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Curzar\Graphql\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * Format new option uid in base64 encode for selected custom options
 */
class PhonecaseList implements ResolverInterface
{
    protected $phonecaseRepository;
    protected $searchCriteriaBuilder;
    protected $phonecase;

    public function __construct(
        \Curzar\Repository\Api\PhonecaseRepositoryInterface $phonecaseRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder  $searchCriteriaBuilder,
        \Curzar\Repository\Model\PhonecaseFactory $phonecase
    )
    {
        $this->phonecaseRepository = $phonecaseRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->phonecase = $phonecase;

    }

    /**
     * Create a option uid for selected option in "<option-type>/<option-id>/<option-value-id>" format
     *
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     *
     * @return string
     *
     * @throws GraphQlInputException
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {

       /* 
       $phonecase = $this->phonecase->create();
        $phonecase->setModel('IPHONE 14 PRO MAX');
        $phonecase->setBrand('IPHONE');
        $this->phonecaseRepository->save($phonecase);

        $phonecase = $this->phonecase->create();
        $phonecase->setModel('IPHONE 14 PRO');
        $phonecase->setBrand('IPHONE');
        $this->phonecaseRepository->save($phonecase);
        */

        $this->searchCriteriaBuilder->setCurrentPage(1)->setPageSize(200);
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $list =  $this->phonecaseRepository->getList($searchCriteria);
        $items = $list->getItems();

       
       return $items ?? [];
    }
}
