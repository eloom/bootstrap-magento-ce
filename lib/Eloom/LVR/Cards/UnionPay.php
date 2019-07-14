<?php


class Eloom_LVR_Cards_UnionPay extends Eloom_LVR_Cards_Card implements Eloom_LVR_Contracts_CreditCard {
	/**
	 * Regular expression for card number recognition.
	 *
	 * @var string
	 */
	public static $pattern = '/^62(?!(2126|2925))/'; // 622126 and 622925 are starts for Discovery

	/**
	 * Credit card type.
	 *
	 * @var string
	 */
	protected $type = 'credit';

	/**
	 * Credit card name.
	 *
	 * @var string
	 */
	protected $name = 'unionpay';

	/**
	 * Brand name.
	 *
	 * @var string
	 */
	protected $brand = 'Union Pay';

	/**
	 * Card number length's.
	 *
	 * @var array
	 */
	protected $number_length = [16, 17, 18, 19];

	/**
	 * CVC code length's.
	 *
	 * @var array
	 */
	protected $cvc_length = [3];

	/**
	 * Test cvc code checksum against Luhn algorithm.
	 *
	 * @var bool
	 */
	protected $checksum_test = false;
}
