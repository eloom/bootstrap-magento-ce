<?php


class Eloom_LVR_Cards_Hipercard extends Eloom_LVR_Cards_Card implements Eloom_LVR_Contracts_CreditCard {
	/**
	 * Regular expression for card number recognition.
	 *
	 * @var string
	 */
	public static $pattern = '/^(606282\d{10}(\d{3})?)|(3841\d{15})/';

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
	protected $name = 'hipercard';

	/**
	 * Brand name.
	 *
	 * @var string
	 */
	protected $brand = 'Hipercard';

	/**
	 * Card number length's.
	 *
	 * @var array
	 */
	protected $number_length = [13, 16, 19];

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
	protected $checksum_test = true;
}
