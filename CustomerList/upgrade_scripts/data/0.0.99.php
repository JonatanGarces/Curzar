<?php 
/**
 * This script `included` via class method, inherits this variable from that context
 * @var $setup \Magento\Framework\Setup\ModuleDataSetupInterface
 */
 $setup;

/**
 * This script `included` via class method, inherits this variable from that context
 * @var $setup \Magento\Framework\Setup\ModuleContextInterface
 */
 $context;

//insert data  
//             $connection = $setup->getConnection();      
//             $select = $connection->select()
//                 ->from(
//                     $this->relationProcessor->getTable('catalog_product_link'),
//                     ['product_id', 'linked_product_id']
//                 )
//                 ->where('link_type_id = ?', Link::LINK_TYPE_GROUPED);
// 
//             $connection->query(
//                 $connection->insertFromSelect(
//                     $select, $this->relationProcessor->getMainTable(),
//                     ['parent_id', 'child_id'],
//                     AdapterInterface::INSERT_IGNORE
//                 )
//             ); 

//update data
// $connection = $setup->getConnection('sales');
// $select = $connection->select()
//     ->from($setup->getTable('sales_order_payment'), 'entity_id')
//     ->columns(['additional_information'])
//     ->where('additional_information LIKE ?', '%token_metadata%');
//     ...
//     $connection->update(
//         $setup->getTable('sales_order_payment'),
//         ['additional_information' => serialize($additionalInfo)],
//         ['entity_id = ?' => $item['entity_id']]
//     );
// }      
 


//$connection = $setup->getConnection();  
//             $connection->query(
//                 $connection->insertFromSelect(
//                     $select, $this->relationProcessor->getMainTable(),
//                     ['parent_id', 'child_id'],
//                     AdapterInterface::INSERT_IGNORE
//                 )
//             ); 

		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

       $fieldList = [
           'price',
           'special_price',
           'special_from_date',
           'special_to_date',
           'minimal_price',
           'cost',
           'tier_price'
          //'weight',
       ];
       foreach ($fieldList as $field) {
           $applyTo = explode(
               ',',
               $eavSetup->getAttribute(\Magento\Catalog\Model\Product::ENTITY, $field, 'apply_to')
           );
           if (!in_array('course_product', $applyTo)) {
               $applyTo[] = 'course_product';
               $eavSetup->updateAttribute(
                   \Magento\Catalog\Model\Product::ENTITY,
                   $field,
                   'apply_to',
                   implode(',', $applyTo)
               );
           }
       }
