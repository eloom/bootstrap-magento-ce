<?php

class Eloom_LVR_CardNumber implements Eloom_LVR_Rule {
	const MSG_CARD_INVALID = 'validation.credit_card.card_invalid';
	const MSG_CARD_PATTER_INVALID = 'validation.credit_card.card_pattern_invalid';
	const MSG_CARD_LENGTH_INVALID = 'validation.credit_card.card_length_invalid';
	const MSG_CARD_CHECKSUM_INVALID = 'validation.credit_card.card_checksum_invalid';

	protected $message = '';

	/**
	 * Determine if the validation rule passes.
	 *
	 * @param mixed $value
	 *
	 * @return bool
	 */
	public function passes($value) {
		try {
			return Eloom_LVR_Factory::makeFromNumber($value)->isValidCardNumber();
		} catch (Eloom_LVR_Exceptions_CreditCardLengthException $ex) {
			$this->message = self::MSG_CARD_LENGTH_INVALID;

			return false;
		} catch (Eloom_LVR_Exceptions_CreditCardChecksumException $ex) {
			$this->message = self::MSG_CARD_CHECKSUM_INVALID;

			return false;
		} catch (Eloom_LVR_Exceptions_CreditCardException $ex) {
			$this->message = self::MSG_CARD_INVALID;

			return false;
		}
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
