<?php
class Themonic_Options_checkbox {

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
    }

    /**
     * Field Render Function.
     *
     * Takes the vars and outputs the HTML for the field in the settings
     *
     * @since Themonic_Options 1.0.0
    */
    function render() {
        $name = $this->args['opt_name'] . '[' . $this->field['id'] . ']';
        $id = $this->field['id'];
        $desc = isset( $this->field['desc'] ) ? $this->field['desc'] : '';
        $class = isset( $this->field['class'] ) ? $this->field['class'] : '';
        $switch = isset( $this->field['switch'] ) ? $this->field['switch'] : apply_filters( 'themonic_checkbox_switch_default', false );
        ?>

    	<label <?php if ( $switch ) : ?>class="switch_wrap"<?php endif; ?>>
			<input name="<?php echo $name; ?>" id="<?php echo $id; ?>" class="<?php echo $class; ?>" value="1" <?php echo checked( $this->value, '1', false ); ?> type="checkbox" />
			<?php if ( $switch ) : ?><div class="switch"><span class="bullet"><i class="icon-off"></i></span></div><?php endif; ?>
		</label>
		<?php if ( ! empty( $desc ) ) : ?>
			<label for="<?php echo $id; ?>"><?php echo $desc; ?></label>
		<?php endif; ?>

        <?php
    }
}
