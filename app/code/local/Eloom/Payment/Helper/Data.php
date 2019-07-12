<?php

##eloom.licenca##

class Eloom_Payment_Helper_Data extends Mage_Core_Helper_Abstract {

  const PAGSEGURO_CC = 'eloom_pagseguro_cc';

  const PAGSEGUTO_BOLETO = 'eloom_pagseguro_boleto';

  /**
   * PayU CC
   */
  const PAYU_CC = 'eloom_payu_cc';

  /**
   * PayU Boleto
   */
  const PAYU_BOLETO = 'eloom_payu_boleto';

	/**
	 * PayU Terminal
	 */
	const PAYU_TERMINAL = 'eloom_payu_terminal';

  /**
   * Mercado Pago CC
   */
  const MERCADO_PAGO_CC = 'eloom_mercadopago_cc';

  /**
   * Mercado Pago Boleto
   */
  const MERCADO_PAGO_BOLETO = 'eloom_mercadopago_boleto';

	/**
	 * Yapay CC
	 */
	const YAPAY_CC = 'eloom_yapay_cc';

	/**
	 * Yapay Boleto
	 */
	const YAPAY_BOLETO = 'eloom_yapay_boleto';

	/**
	 * Yapay Terminal
	 */
	const YAPAY_TERMINAL = 'eloom_yapay_terminal';

  /**
   * Códigos dos meios de pagamento da élOOm.
   * 
   */
  protected static $_paymentMethods = array(self::PAGSEGURO_CC, self::PAGSEGUTO_BOLETO,
	  self::PAYU_CC, self::PAYU_BOLETO, self::PAYU_TERMINAL,
	  self::MERCADO_PAGO_BOLETO, self::MERCADO_PAGO_CC,
	  self::YAPAY_CC, self::YAPAY_BOLETO, self::YAPAY_TERMINAL);

  /**
   * Nome dos módulos dos meios de pagamento da élOOm.
   * 
   */
  protected static $_paymentMethodsModuleNames = array(self::PAGSEGURO_CC => 'eloom_pagseguro',
      self::PAGSEGUTO_BOLETO => 'eloom_pagseguro',
      self::PAYU_CC => 'eloom_payu',
      self::PAYU_BOLETO => 'eloom_payu',
      self::PAYU_TERMINAL => 'eloom_payu',
      self::MERCADO_PAGO_BOLETO => 'eloom_mercadopago',
      self::MERCADO_PAGO_CC => 'eloom_mercadopago',
	    self::YAPAY_BOLETO => 'eloom_yapay',
	    self::YAPAY_CC => 'eloom_yapay',
	    self::YAPAY_TERMINAL => 'eloom_yapay',
	  );

  /**
   * Nome das pastas onde está o arquivo success-detail.phtml.
   */
  protected static $_successDetailSkinName = array(self::PAGSEGURO_CC => 'pagseguro',
      self::PAGSEGUTO_BOLETO => 'pagseguro',
      self::PAYU_CC => 'payu',
      self::PAYU_BOLETO => 'payu',
			self::PAYU_TERMINAL => 'payu',
      self::MERCADO_PAGO_BOLETO => 'mercadopago',
      self::MERCADO_PAGO_CC => 'mercadopago',
	  self::YAPAY_CC => 'yapay',
	  self::YAPAY_BOLETO => 'yapay',
	  self::YAPAY_TERMINAL => 'yapay'
	  );

	public function listEloomPaymentMethod() {
		return self::$_paymentMethods;
	}

  public function isPagSeguro($paymentMethodCode) {
    return self::PAGSEGURO_CC == $paymentMethodCode || self::PAGSEGUTO_BOLETO == $paymentMethodCode;
  }

  public function isPayU($paymentMethodCode) {
    return self::PAYU_CC == $paymentMethodCode || self::PAYU_BOLETO == $paymentMethodCode || self::PAYU_TERMINAL == $paymentMethodCode;
  }

	public function isYapay($paymentMethodCode) {
		return self::YAPAY_CC == $paymentMethodCode || self::YAPAY_BOLETO == $paymentMethodCode || self::YAPAY_TERMINAL == $paymentMethodCode;
	}

  public function isMercadoPago($paymentMethodCode) {
    return self::MERCADO_PAGO_CC == $paymentMethodCode || self::MERCADO_PAGO_BOLETO == $paymentMethodCode;
  }

  /**
   * Verifica se o método de pagamento consta na lista de Payment Methods da élOOm.
   * 
   * @return type boolean
   */
  public function getPaymentMethodModuleName($paymentMethodCode) {
    return self::$_paymentMethodsModuleNames[$paymentMethodCode];
  }

  /**
   * Retorna o Path onde está a pasta do arquivo success-detail.pthml
   * 
   * @return type boolean
   */
  public function getSuccessDetailSkinName($paymentMethodCode) {
    return self::$_successDetailSkinName[$paymentMethodCode];
  }

  public function getPayment() {
    $orderId = Mage::getSingleton('checkout/session')->getLastOrderId();
    $order = Mage::getModel('sales/order')->load($orderId);
    return $order->getPayment();
  }

  /**
   * Truncate a float number, example: <code>truncate(-1.49999, 2); // returns -1.49
   * truncate(.49999, 3); // returns 0.499
   * </code>
   * @param float $val Float number to be truncate
   * @param int f Number of precision
   * @return float
   */
  function truncate($val, $f = '2') {
    if (($p = strpos($val, '.')) !== false) {
      $val = floatval(substr($val, 0, $p + 1 + $f));
    }
    return $val;
  }

}
