<?php
/**
 * Recent posts Thumbnail widget
 * Display most recent posts from specified categories.
 * Author: Shashank Singh | Themonic.com
 */

//register widgets
class themonicwidget extends WP_Widget {
    function themonicwidget() {
        parent::WP_Widget(false, $name = 'Iconic One Pro Recent Posts Thumbnails');
    }
	function form($instance) {             
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $io_posts = isset( $instance['io_posts'] ) ? esc_attr( $instance['io_posts'] ) : '';
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('io_posts'); ?>"><?php _e('Number of Posts Displayed:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('io_posts'); ?>" name="<?php echo $this->get_field_name('io_posts'); ?>" type="text" value="<?php echo $io_posts; ?>" /></label></p>
        <?php
    }
	function widget($args, $instance) {
    extract( $args );
    $title = apply_filters('widget_title', $instance['title']);
    $io_posts = $instance['io_posts'];
    ?>
      <?php echo $before_widget; ?>
         <?php if ( $title )
            echo $before_title . $title . $after_title; ?>
 
                 <ul>
    <?php
        global $post;
        $args = array( 'numberposts' => $io_posts);
        $myposts = get_posts( $args );
        foreach( $myposts as $post ) : setup_postdata($post); ?>
       <div class="themonicpt"><li>
		    <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
			<a href="<?php the_permalink();?>"><?php the_post_thumbnail('themonic-thumbnail'); ?></a>
			<?php else :?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themonic' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
        <img class="alignleft" src="<?php echo get_stylesheet_directory_uri(); ?>/img/sidethumb/default.png" />
    </a>
        <?php endif;?>
			<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
	    </li></div> <div class="clear"></div>
        <?php endforeach; ?>
</ul>
 
         <?php echo $after_widget; ?>
<?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("themonicwidget");'));
