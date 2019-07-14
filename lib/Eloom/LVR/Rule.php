<?php

interface Eloom_LVR_Rule {

	/**
	 * Determine if the validation rule passes.
	 *
	 * @param mixed $value
	 * @return bool
	 */
	public function passes($value);

	/**
	 * Get the validation error message.
	 *
	 * @return string
	 */
	public function message();
}