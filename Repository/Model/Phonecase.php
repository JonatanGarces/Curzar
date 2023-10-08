<?php

namespace Curzar\Repository\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Curzar\Repository\Api\Data\PhonecaseExtensionInterface;
use Curzar\Repository\Api\Data\PhonecaseInterface;

class Phonecase extends AbstractExtensibleModel implements PhonecaseInterface
{

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return parent::getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return parent::getData(self::MODEL);
    }

    /**
     * @inheritDoc
     */
    public function setModel($model)
    {
        return $this->setData(self::MODEL, $model);
    }

    /**
     * @inheritDoc
     */
    public function getBrand()
    {
        return parent::getData(self::BRAND);
    }

    /**
     * @inheritDoc
     */
    public function setBrand($brand)
    {
        return $this->setData(self::BRAND, $brand);
    }

    /**
     * @inheritDoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritDoc
     */
    public function setExtensionAttributes(
        PhonecaseExtensionInterface $extensionAttributes
    ) {
        $this->_setExtensionAttributes($extensionAttributes);
    }

    protected function _construct()
    {
        $this->_init(ResourceModel\Phonecase::class);
    }
}