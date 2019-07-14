<?php

abstract class Eloom_LVR_Cards_Card {
	/**
	 * Regular expression for card number recognition.
	 *
	 * @var string
	 */
	public static $pattern;

	/**
	 * Credit card type: "debit", "credit".
	 *
	 * @var string
	 */
	protected $type;

	/**
	 * Credit card name.
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Brand name.
	 *
	 * @var string
	 */
	protected $brand;

	/**
	 * Card number length's.
	 *
	 * @var array
	 */
	protected $number_length;

	/**
	 * CVC code length's.
	 *
	 * @var array
	 */
	protected $cvc_length;

	/**
	 * Test cvc code checksum against Luhn algorithm.
	 *
	 * @var bool
	 */
	protected $checksum_test;

	/**
	 * @var string
	 */
	private $card_number;

	/**
	 * Card constructor.
	 *
	 * @param string $card_number
	 *
	 * @throws Eloom_LVR_Exceptions_CreditCardException
	 */
	public function __construct($card_number = '') {
		$this->checkImplementation();

		if ($card_number) {
			$this->setCardNumber($card_number);
		}
	}

	/**
	 * @param string $card_number
	 *
	 * @return $this
	 * @throws Eloom_LVR_Exceptions_CreditCardPatternException
	 */
	public function setCardNumber($card_number) {
		$this->card_number = preg_replace('/\s+/', '', $card_number);

		$this->isValidCardNumber();

		if (!$this->validPattern()) {
			throw new Eloom_LVR_Exceptions_CreditCardPatternException(
				sprintf('Wrong "%s" card pattern', $this->card_number)
			);
		}

		return $this;
	}

	/**
	 * @return bool
	 * @throws Eloom_LVR_Exceptions_CreditCardChecksumException
	 * @throws Eloom_LVR_Exceptions_CreditCardCharactersException
	 * @throws Eloom_LVR_Exceptions_CreditCardException
	 * @throws Eloom_LVR_Exceptions_CreditCardLengthException
	 */
	public function isValidCardNumber() {
		if (!$this->card_number) {
			throw new Eloom_LVR_Exceptions_CreditCardException('Card number is not set');
		}

		if (!is_numeric(preg_replace('/\s+/', '', $this->card_number))) {
			throw new Eloom_LVR_Exceptions_CreditCardCharactersException(
				sprintf('Card number "%s" contains invalid characters', $this->card_number)
			);
		}

		if (!$this->validLength()) {
			throw new Eloom_LVR_Exceptions_CreditCardLengthException(
				sprintf('Incorrect "%s" card length', $this->card_number)
			);
		}

		if (!$this->validChecksum()) {
			throw new Eloom_LVR_Exceptions_CreditCardChecksumException(
				sprintf('Invalid card number: "%s". Checksum is wrong', $this->card_number)
			);
		}

		return true;
	}

	/**
	 * @return string
	 */
	public function type() {
		return $this->type;
	}

	/**
	 * @return string
	 */
	public function name() {
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function brand() {
		return $this->brand;
	}

	/**
	 * @param $cvc
	 *
	 * @return bool
	 */
	public function isValidCvc($cvc) {
		return is_numeric($cvc)
			&& self::isValidCvcLength($cvc, $this->cvc_length);
	}

	/**
	 * Check CVS length against possible lengths.
	 *
	 * @param string|int $cvc
	 *
	 * @param array $available_lengths
	 *
	 * @return bool
	 */
	public static function isValidCvcLength($cvc, array $available_lengths = [3, 4]) {
		return
			is_numeric($cvc)
			&& in_array(strlen($cvc), $available_lengths, true);
	}

	/**
	 * @throws Eloom_LVR_Exceptions_CreditCardException
	 */
	protected function checkImplementation() {
		if (!$this->type || !is_string($this->type) || !in_array($this->type, ['debit', 'credit'])) {
			throw new Eloom_LVR_Exceptions_CreditCardTypeException('Credit card type is missing');
		}

		if (!$this->name || !is_string($this->name)) {
			throw new Eloom_LVR_Exceptions_CreditCardNameException('Credit card name is missing or is not a string');
		}

		if (!static::$pattern || !is_string(static::$pattern)) {
			throw new Eloom_LVR_Exceptions_CreditCardPatternException(
				'Credit card number recognition pattern is missing or is not a string'
			);
		}

		if (empty($this->number_length) || !is_array($this->number_length)) {
			throw new Eloom_LVR_Exceptions_CreditCardLengthException(
				'Credit card number length is missing or is not an array'
			);
		}

		if (empty($this->cvc_length) || !is_array($this->cvc_length)) {
			throw new Eloom_LVR_Exceptions_CreditCardCvcException(
				'Credit card cvc code length is missing or is not an array'
			);
		}

		if ($this->checksum_test === null || !is_bool($this->checksum_test)) {
			throw new Eloom_LVR_Exceptions_CreditCardChecksumException(
				'Credit card checksum test is missing or is not a boolean'
			);
		}
	}

	/**
	 * @return bool
	 */
	protected function validPattern() {
		return (bool)preg_match(static::$pattern, $this->card_number);
	}

	/**
	 * @return bool
	 */
	protected function validLength() {
		return in_array(strlen($this->card_number), $this->number_length, true);
	}

	/**
	 * @return bool
	 */
	protected function validChecksum() {
		return !$this->checksum_test || $this->checksumTest();
	}

	/**
	 * @return bool
	 */
	protected function checksumTest() {
		$checksum = 0;
		$len = strlen($this->card_number);
		for ($i = 2 - ($len % 2); $i <= $len; $i += 2) {
			$checksum += $this->card_number[$i - 1];
		}
		// Analyze odd digits in even length strings or even digits in odd length strings.
		for ($i = $len % 2 + 1; $i < $len; $i += 2) {
			$digit = $this->card_number[$i - 1] * 2;
			if ($digit < 10) {
				$checksum += $digit;
			} else {
				$checksum += $digit - 9;
			}
		}

		return ($checksum % 10) === 0;
	}
}
