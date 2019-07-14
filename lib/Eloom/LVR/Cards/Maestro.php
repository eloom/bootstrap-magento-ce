<?php

class Eloom_LVR_Cards_Maestro extends Eloom_LVR_Cards_Card implements Eloom_LVR_Contracts_CreditCard {
	/**
	 * Regular expression for card number recognition.
	 *
	 * @var string
	 */
	public static $pattern = '/^(5(018|0[235]|[678])|6(1|39|7|8|9))/';

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
	protected $name = 'maestro';

	/**
	 * Brand name.
	 *
	 * @var string
	 */
	protected $brand = 'Maestro';

	/**
	 * Card number length's.
	 *
	 * @var array
	 */
	protected $number_length = [12, 13, 14, 15, 16, 17, 18, 19];

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
