<?php

##eloom.licenca##

class Eloom_Bootstrap_ZipCodeController extends Mage_Core_Controller_Front_Action {

  /**
   * Initialize
   */
  protected function _construct() {
    
  }

  public function indexAction() {
    if (!$this->getRequest()->isPost()) {
      return;
    }
    $zipcode = $this->getRequest()->getParam('zipcode');

    $toolsweb = Mage::getModel('eloombootstrap/toolsweb');
    $endereco = $toolsweb->getAddress($zipcode);
    if (!($endereco instanceof Eloom_Bootstrap_Endereco)) {
      $repVirtual = Mage::getModel('eloombootstrap/repvirtual');
      $endereco = $repVirtual->getAddress($zipcode);
    }
    $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($endereco));
  }

}
