<?php

/*	Widget Name: Feed Subscribe Widget */


// Initialize the feed widget.
add_action( 'widgets_init', 'themonic_feed_subscribe' );


// Register widget.
function themonic_feed_subscribe() {
	register_widget( 'themonic_subscribe_widget' );
}

// Widget class.
class themonic_subscribe_widget extends WP_Widget {

/*	Widget Setup */
	
	function themonic_subscribe_widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'themonic_subscribe_widget', 'description' => __('Feedburner Subscription Widget.', 'themonic') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'themonic_subscribe_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'themonic_subscribe_widget', __('Iconic One Pro Email Subscription', 'themonic'), $widget_ops, $control_ops );
	}

/*	Display Widget*/
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$desc = $instance['desc'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?>
        	
			<div class="themonic-subscribe">
                
                <?php /* Display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>

                <form style="" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $desc; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" _lpchecked="1">
				<input type="text" value="Your email Address..." onblur="if (this.value == '') {this.value = 'Your email Address...';}" onfocus="if (this.value == 'Your email Address...') {this.value = '';}"  name="email">
				<input type="hidden" value="<?php echo $desc; ?>" name="uri"><input type="hidden" name="loc" value="en_US"><input id="emailsubmit" type="submit" value="Subscribe">
				</form>
                
            </div><!--subscribe_widget-->
		
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}


/*Update Widget*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		/* Stripslashes for html inputs */
		$instance['desc'] = stripslashes( $new_instance['desc']);

		/* No need to strip tags for.. */

		return $instance;
	}

/*	Widget Settings*/
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		'desc' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'themonic') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Feedburner id (http://feeds.feedburner.com/<b>themonic</b>):', 'themonic') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['desc'] ), ENT_QUOTES)); ?>" />
		</p>
		
	<?php
	}
}
?>