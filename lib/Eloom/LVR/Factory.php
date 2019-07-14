<?php

class Eloom_LVR_Factory {

	protected static $available_cards = [
		// Firs debit cards
		Eloom_LVR_Cards_Dankort::class,
		Eloom_LVR_Cards_Forbrugsforeningen::class,
		Eloom_LVR_Cards_Maestro::class,
		Eloom_LVR_Cards_VisaElectron::class,
		// Debit cards
		Eloom_LVR_Cards_AmericanExpress::class,
		Eloom_LVR_Cards_DinersClub::class,
		Eloom_LVR_Cards_Discovery::class,
		Eloom_LVR_Cards_Jcb::class,
		Eloom_LVR_Cards_Hipercard::class,
		Eloom_LVR_Cards_Mastercard::class,
		Eloom_LVR_Cards_UnionPay::class,
		Eloom_LVR_Cards_Visa::class,
		Eloom_LVR_Cards_Mir::class,
	];

	/**
	 * @param string $card_number
	 *
	 * @return \Eloom_LVR_Cards_Card
	 * @throws Eloom_LVR_Exceptions_CreditCardException
	 */
	public static function makeFromNumber($card_number) {
		return self::determineCardByNumber($card_number);
	}

	/**
	 * @param string $card_number
	 *
	 * @return mixed
	 * @throws Eloom_LVR_Exceptions_Exceptions\Eloom_LVR_Exceptions_CreditCardException
	 */
	protected static function determineCardByNumber($card_number) {
		foreach (self::$available_cards as $card) {
			if (preg_match($card::$pattern, $card_number)) {
				return new $card($card_number);
			}
		}

		throw new Eloom_LVR_Exceptions_CreditCardException('Card not found.');
	}
}