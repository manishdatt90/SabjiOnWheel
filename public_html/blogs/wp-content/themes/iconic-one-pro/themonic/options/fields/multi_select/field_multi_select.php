<?php
require_once(dirname(__FILE__).'/../select/'.'field_select.php'); 
class Themonic_Options_multi_select extends Themonic_Options_select {

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since Themonic_Options 1.0.0
    */
    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
		$this->field['multiselect'] = true;
    }
}
