<?php

##eloom.licenca##

class Eloom_Bootstrap_Model_Inbox extends Mage_Core_Model_Abstract {

  /**
   * Add major severity message
   *
   * @param string $title
   * @param string|array $description
   * @param string $url
   * @param bool $isInternal
   * @return Mage_AdminNotification_Model_Inbox
   */
  public function addMajor($title, $description, $url = '', $isInternal = true) {
    return Mage::getModel('adminnotification/inbox')->addMajor($title, $description, $url, $isInternal);
  }

  /**
   * Add minor severity message
   *
   * @param string $title
   * @param string|array $description
   * @param string $url
   * @param bool $isInternal
   * @return Mage_AdminNotification_Model_Inbox
   */
  public function addMinor($title, $description, $url = '', $isInternal = true) {
    return Mage::getModel('adminnotification/inbox')->addMinor($title, $description, $url, $isInternal);
  }

  /**
   * Add notice
   *
   * @param string $title
   * @param string|array $description
   * @param string $url
   * @param bool $isInternal
   * @return Mage_AdminNotification_Model_Inbox
   */
  public function addNotice($title, $description, $url = '', $isInternal = true) {
    return Mage::getModel('adminnotification/inbox')->addNotice($title, $description, $url, $isInternal);
  }

}
