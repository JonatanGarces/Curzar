<?php

namespace Curzar\Graphql\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;
use Magento\Config\Model\Config\Factory as ConfigFactory;

class RemoveUrlSuffixConfig implements DataPatchInterface, PatchRevertableInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var ResourceConfig
     */
    private $resourceConfig;

    /**
     * @var ConfigFactory
     */
    private $configFactory;

    /**
     * RemoveUrlSuffixConfig constructor.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param ResourceConfig $resourceConfig
     * @param ConfigFactory $configFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        ResourceConfig $resourceConfig,
        ConfigFactory $configFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->resourceConfig = $resourceConfig;
        $this->configFactory = $configFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        // Remove URL suffix configuration for products
        $this->removeUrlSuffixConfig('catalog/seo/product_url_suffix');

        // Remove URL suffix configuration for categories
        $this->removeUrlSuffixConfig('catalog/seo/category_url_suffix');

        $this->moduleDataSetup->endSetup();
    }

    /**
     * Remove URL suffix configuration
     *
     * @param string $configPath
     */
    private function removeUrlSuffixConfig($configPath)
    {
        $this->resourceConfig->deleteConfig($configPath);
    }

    /**
     * {@inheritdoc}
     */
    public function revert()
    {
        $this->moduleDataSetup->startSetup();

        // Restore the original configuration for products
        $this->restoreUrlSuffixConfig('catalog/seo/product_url_suffix');

        // Restore the original configuration for categories
        $this->restoreUrlSuffixConfig('catalog/seo/category_url_suffix');

        $this->moduleDataSetup->endSetup();
    }

    /**
     * Restore the original URL suffix configuration
     *
     * @param string $configPath
     */
    private function restoreUrlSuffixConfig($configPath)
    {
        $configData = $this->configFactory->create(['data' => ['section' => 'catalog/seo']]);
        $configData->setDataByPath($configPath, 'html');
        $configData->save();
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
