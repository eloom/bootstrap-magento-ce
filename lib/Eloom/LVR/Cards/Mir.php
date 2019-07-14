<?php

/**
 * Class Mir.
 * @link https://nspk.com/
 * @author eugene.sazykin@gmail.com
 */
class Eloom_LVR_Cards_Mir extends Eloom_LVR_Cards_Card implements Eloom_LVR_Contracts_CreditCard {
	/**
	 * Regular expression for card number recognition.
	 *
	 * @var string
	 */
	public static $pattern = '/^220/';

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
	protected $name = 'mir';

	/**
	 * Brand name.
	 *
	 * @var string
	 */
	protected $brand = 'Mir';

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
