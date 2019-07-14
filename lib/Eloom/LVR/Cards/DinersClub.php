<?php

class Eloom_LVR_Cards_DinersClub extends Eloom_LVR_Cards_Card implements Eloom_LVR_Contracts_CreditCard {
	/**
	 * Regular expression for card number recognition.
	 *
	 * @var string
	 */
	public static $pattern = '/^3(0[0-5]|[68][0-9])[0-9]/';

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
	protected $name = 'dinersclub';

	/**
	 * Brand name.
	 *
	 * @var string
	 */
	protected $brand = 'Diners Club International';

	/**
	 * Card number length's.
	 *
	 * @var array
	 */
	protected $number_length = [14];

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
