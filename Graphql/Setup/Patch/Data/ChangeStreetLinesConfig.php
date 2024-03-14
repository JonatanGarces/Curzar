<?php

namespace Curzar\Graphql\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Config\Model\ResourceModel\Config;
use Magento\Config\Model\Config\Factory;

class ChangeStreetLinesConfig implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var Config
     */
    private $configResource;

    /**
     * @var Factory
     */
    private $configFactory;

    /**
     * ChangeStreetLinesConfig constructor.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param Config $configResource
     * @param Factory $configFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        Config $configResource,
        Factory $configFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->configResource = $configResource;
        $this->configFactory = $configFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        // Change the configuration value here
        $configPath = 'customer/address/street_lines';
        $newValue = 3; // Set the desired number of lines

        $this->configResource->saveConfig(
            $configPath,
            $newValue
        );

        $this->moduleDataSetup->endSetup();
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
