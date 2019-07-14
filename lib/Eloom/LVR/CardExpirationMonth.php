<?php

class Eloom_LVR_CardExpirationMonth implements Eloom_LVR_Rule {
	const MSG_CARD_EXPIRATION_MONTH_INVALID = 'validation.credit_card.card_expiration_month_invalid';

	/**
	 * Year field name.
	 *
	 * @var string
	 */
	protected $year;

	protected $message;

	/**
	 * CardExpirationMonth constructor.
	 *
	 * @param string $year
	 */
	public function __construct($year) {
		$this->message = static::MSG_CARD_EXPIRATION_MONTH_INVALID;
		$this->year = $year;
	}

	/**
	 * Determine if the validation rule passes.
	 *
	 * @param mixed $value
	 *
	 * @return bool
	 */
	public function passes($value) {
		return (new Eloom_LVR_ExpirationDateValidator($this->year, $value))->isValid();
	}

	/**
	 * Get the validation error message.
	 *
	 * @return string
	 */
	public function message() {
		return Mage::helper('eloom_payment')->__($this->message);
	}
}
