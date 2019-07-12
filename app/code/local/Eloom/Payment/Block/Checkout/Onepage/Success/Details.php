<?php

##eloom.licenca##

class Eloom_Payment_Block_Onepage_Success_Details extends Mage_Checkout_Block_Onepage_Success {

	private $paymentMethod;
	private $isEloomMethod;

	protected function _construct() {
		parent::_construct();
		$this->paymentMethod = Mage::helper('eloom_payment')->getPayment()->getMethodInstance()->getCode();
		$this->isEloomMethod = Mage::helper('eloom_payment')->isEloomPaymentMethod($this->paymentMethod);
		if ($this->isEloomMethod) {
			$name = Mage::helper('eloom_payment')->getSuccessDetailSkinName($this->paymentMethod);
			$this->setTemplate('eloom/' . $name . '/checkout/onepage/success-details.phtml');
		}
	}

	public function getBlock() {
		if ($this->isEloomMethod) {
			$name = Mage::helper('eloom_payment')->getPaymentMethodModuleName($this->paymentMethod);
			$block = $this->getLayout()->getBlockSingleton($name . '/checkout_onepage_success');
			if ($block) {
				return $block;
			}
		}
		return null;
	}

}
