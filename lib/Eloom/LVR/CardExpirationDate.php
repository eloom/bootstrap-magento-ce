<?php

class Eloom_LVR_CardExpirationDate implements Eloom_LVR_Rule {

	const MSG_CARD_EXPIRATION_DATE_INVALID = 'validation.credit_card.card_expiration_date_invalid';
	const MSG_CARD_EXPIRATION_DATE_FORMAT_INVALID = 'validation.credit_card.card_expiration_date_format_invalid';

	protected $message;

	/**
	 * CardExpirationDate constructor.
	 *
	 * @param string $format Date format
	 */
	public function __construct() {
		$this->message = static::MSG_CARD_EXPIRATION_DATE_INVALID;
	}

	/**
	 * Determine if the validation rule passes.
	 *
	 * @param mixed $value
	 *
	 * @return bool
	 */
	public function passes($value) {
		try {
			$timeZone = new \DateTimeZone('America/Sao_Paulo');
			$date = DateTime::createFromFormat('Y/m', $value);
			$date->setTimezone($timeZone);

			return (new Eloom_LVR_ExpirationDateValidator($date->format('Y'), $date->format('m')))->isValid();
		} catch (\InvalidArgumentException $ex) {
			$this->message = static::MSG_CARD_EXPIRATION_DATE_FORMAT_INVALID;

			return false;
		} catch (\Exception $ex) {
			$this->message = static::MSG_CARD_EXPIRATION_DATE_INVALID;

			return false;
		}

		return false;
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
