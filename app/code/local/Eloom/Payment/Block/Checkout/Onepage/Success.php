<?php

##eloom.licenca##

class Eloom_Payment_Block_Checkout_Onepage_Success extends Mage_Checkout_Block_Onepage_Success {

  public function getViewOrder() {
    return true;
  }

  public function getCanViewOrder() {
    return true;
  }

  public function getCanPrintOrder() {
    return true;
  }

}
