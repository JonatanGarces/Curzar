<?php

namespace Curzar\Graphql\Setup\Patch\Data;

use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Catalog\Model\Product;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;

class UpdateImageAttributesScope implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var CategorySetupFactory
     */
    private $categorySetupFactory;

    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * UpdateImageAttributesScope constructor.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param CategorySetupFactory $categorySetupFactory
     * @param Config $eavConfig
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        CategorySetupFactory $categorySetupFactory,
        Config $eavConfig
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->categorySetupFactory = $categorySetupFactory;
        $this->eavConfig = $eavConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $this->updateAttributeScope('image');
        $this->updateAttributeScope('thumbnail');
        $this->updateAttributeScope('small_image');

        $this->moduleDataSetup->endSetup();
    }

    /**
     * Update attribute scope to global if not already set
     *
     * @param string $attributeCode
     * @return void
     */
    public function updateAttributeScope($attributeCode)
    {
        $eavSetup = $this->categorySetupFactory->create(['setup' => $this->moduleDataSetup]);

        $currentScope = $eavSetup->getAttribute(Product::ENTITY, $attributeCode);
        $entityTypeId = $eavSetup->getEntityTypeId(Product::ENTITY);

        // Check if the attribute is not already set to global
        if ($currentScope != \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL) {
            $eavSetup->updateAttribute($entityTypeId, $attributeCode, 'is_global', \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL);
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}