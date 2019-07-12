<?php

##eloom.licenca##

class Eloom_Bootstrap_Model_Config extends Mage_Core_Model_Abstract
{

  const XML_PATH_URL_REP_VIRTUAL = 'eloombootstrap/url/toolsweb';

  const XML_PATH_PRODUCT_PAGE_BUY_FLOATING_BUTTON = 'eloombootstrap/product_page/buy_floating_button';

  public function _construct()
  {
    parent::_construct();
  }

  /**
   * Retrieve store model instance
   *
   * @return Mage_Core_Model_Store
   */
  public function getStore()
  {
    return Mage::app()->getStore();
  }

  public function getConfig($path)
  {
    return Mage::getStoreConfig($path, Mage::app()->getStore()->getStoreId());
  }

  public function getConfigFlag($path)
  {
    return Mage::getStoreConfigFlag($path, Mage::app()->getStore()->getStoreId());
  }

  public function getUrlRepVirtual()
  {
    return $this->getConfig(self::XML_PATH_URL_REP_VIRTUAL);
  }

  public function isBuyFloatingButtonInProductPage()
  {
    return $this->getConfigFlag(self::XML_PATH_PRODUCT_PAGE_BUY_FLOATING_BUTTON);
  }

}
