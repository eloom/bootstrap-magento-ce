<?php

class Eloom_LVR_Cards_Dankort extends Eloom_LVR_Cards_Card implements Eloom_LVR_Contracts_CreditCard {
	/**
	 * Regular expression for card number recognition.
	 *
	 * @var string
	 */
	public static $pattern = '/^5019/';

	/**
	 * Credit card type.
	 *
	 * @var string
	 */
	protected $type = 'debit';

	/**
	 * Credit card name.
	 *
	 * @var string
	 */
	protected $name = 'dankort';

	/**
	 * Brand name.
	 *
	 * @var string
	 */
	protected $brand = 'Dankort';

	/**
	 * Card number length's.
	 *
	 * @var array
	 */
	protected $number_length = [16];

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
