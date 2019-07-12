<?php

##eloom.licenca##

class Eloom_Payment_Block_Sales_Order_Creditmemo_Totals extends Mage_Sales_Block_Order_Creditmemo_Totals {

	protected function _initTotals() {
		parent::_initTotals();

		/**
		 * Descontos
		 */
		$amt = $this->getSource()->getPayuDiscountAmount();
		if ($amt != 0) {
			$this->addTotalBefore(new Varien_Object(array(
				'code' => 'eloom_payu_discount',
				'value' => $amt,
				'base_value' => $this->getSource()->getPayuBaseDiscountAmount(),
				'label' => Mage::helper('eloom_payu')->__('Discount'))), 'grand_total');
		}

		$amt = $this->getOrder()->getMercadopagoDiscountAmount();
		if ($amt != 0) {
			$this->addTotalBefore(new Varien_Object(array(
				'code' => 'eloom_mercadopago_discount',
				'value' => $amt,
				'base_value' => $this->getOrder()->getMercadopagoBaseDiscountAmount(),
				'label' => Mage::helper('eloom_mercadopago')->__('Discount'))), 'grand_total');
		}

		$amt = $this->getOrder()->getMercadopagoCampaignAmount();
	    if ($amt != 0) {
	      $this->addTotal(new Varien_Object(array(
	          'code' => 'eloom_mercadopago_campaign',
	          'value' => $amt,
	          'base_value' => $this->getOrder()->getMercadopagoBaseCampaignAmount(),
	          'label' => Mage::helper('eloom_mercadopago')->__('MercadoPago Campaign Discount'))));
	    }
    
		$amt = $this->getSource()->getPagseguroDiscountAmount();
		if ($amt != 0) {
			$this->addTotalBefore(new Varien_Object(array(
				'code' => 'eloom_pagseguro_discount',
				'value' => $amt,
				'base_value' => $this->getSource()->getPagseguroBaseDiscountAmount(),
				'label' => Mage::helper('eloom_pagseguro')->__('Discount'))), 'grand_total');
		}

		$amt = $this->getSource()->getYapayDiscountAmount();
		if ($amt != 0) {
			$this->addTotalBefore(new Varien_Object(array(
				'code' => 'eloom_yapay_discount',
				'value' => $amt,
				'base_value' => $this->getSource()->getYapayBaseDiscountAmount(),
				'label' => Mage::helper('eloom_yapay')->__('Discount'))), 'grand_total');
		}

		/**
		 * Juros
		 */
		$amt = $this->getSource()->getPayuInterestAmount();
		if ($amt != 0) {
			$this->addTotalBefore(new Varien_Object(array(
				'code' => 'eloom_payu_interest',
				'value' => $amt,
				'base_value' => $this->getSource()->getPayuBaseInterestAmount(),
				'label' => Mage::helper('eloom_payu')->__('Interest'))), 'grand_total');
		}

		$amt = $this->getOrder()->getMercadopagoInterestAmount();
		if ($amt != 0) {
			$this->addTotalBefore(new Varien_Object(array(
				'code' => 'eloom_mercadopago_interest',
				'value' => $amt,
				'base_value' => $this->getOrder()->getMercadopagoBaseInterestAmount(),
				'label' => Mage::helper('eloom_mercadopago')->__('Interest'))), 'grand_total');
		}

		$amt = $this->getSource()->getPagseguroInterestAmount();
		if ($amt != 0) {
			$this->addTotalBefore(new Varien_Object(array(
				'code' => 'eloom_pagseguro_interest',
				'value' => $amt,
				'base_value' => $this->getSource()->getPagseguroBaseInterestAmount(),
				'label' => Mage::helper('eloom_pagseguro')->__('Interest'))), 'grand_total');
		}

		$amt = $this->getSource()->getYapayInterestAmount();
		if ($amt != 0) {
			$this->addTotalBefore(new Varien_Object(array(
				'code' => 'eloom_yapay_interest',
				'value' => $amt,
				'base_value' => $this->getSource()->getYapayBaseInterestAmount(),
				'label' => Mage::helper('eloom_yapay')->__('Interest'))), 'grand_total');
		}

		return $this;
	}

}
