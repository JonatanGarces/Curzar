<?php
namespace Curzar\Repository\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface PhonecaseInterface extends ExtensibleDataInterface
{
    const ID = 'id';
    const MODEL = 'model';
    const BRAND = 'brand';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param $id
     * @return int
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getModel();

    /**
     * @param $model
     * @return string
     */
    public function setModel($model);

    /**
     * @return string
     */
    public function getBrand();

    /**
     * @param $brand
     * @return string
     */
    public function setBrand($brand);

    /**
     * @return Curzar\Repository\Api\Data\PhonecaseExtensionInterface
     */
    public function getExtensionAttributes();

    /**
     * @param Curzar\Repository\Api\Data\PhonecaseExtensionInterface $extensionAttributes
     * @return mixed
     */
    public function setExtensionAttributes(PhonecaseExtensionInterface $extensionAttributes);

}
