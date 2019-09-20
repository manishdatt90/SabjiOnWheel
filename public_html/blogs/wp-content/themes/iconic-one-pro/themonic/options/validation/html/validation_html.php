<?php
class Themonic_Validation_html {
	
	/**
	 * Field Constructor.
	 *
	 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
	 *
	 * @since Themonic_Options 1.0.0
	*/
	function __construct($field, $value, $current) {
		$this->field = $field;
		$this->value = $value;
		$this->current = $current;
		$this->validate();
	}//function

	/**
	 * Field Render Function.
	 *
	 * Takes the vars and validates them
	 *
	 * @since Themonic_Options 1.0.0
	*/
	function validate() {
		$this->value = wp_kses_post($this->value);
	}
}
