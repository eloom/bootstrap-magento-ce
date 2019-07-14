<?php

class Eloom_LVR_CardExpirationYear implements Eloom_LVR_Rule {

	const MSG_CARD_EXPIRATION_YEAR_INVALID = 'validation.credit_card.card_expiration_year_invalid';

	protected $message;
	/**
	 * Month field name.
	 *
	 * @var string
	 */
	protected $month;

	/**
	 * CardExpirationYear constructor.
	 *
	 * @param string $month
	 */
	public function __construct($month) {
		$this->message = static::MSG_CARD_EXPIRATION_YEAR_INVALID;
		$this->month = $month;
	}

	/**
	 * Determine if the validation rule passes.
	 *
	 * @param mixed $value
	 *
	 * @return bool
	 */
	public function passes($value) {
		return (new Eloom_LVR_ExpirationDateValidator($value, $this->month))->isValid();
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
