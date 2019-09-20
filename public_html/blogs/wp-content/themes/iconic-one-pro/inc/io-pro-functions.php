<?php
/*-----------------------------------------------------------------------------------*/	
/* Breadcrumb
/*-----------------------------------------------------------------------------------*/
function the_breadcrumb() {
	echo '<a href="';
	echo home_url();
	echo '">Home';
	echo "</a>";
		if (is_category() || is_single()) {
			echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
			the_category(' &bull; ');
				if (is_single()) {
					echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
					the_title();
				}
        } elseif (is_page()) {
            echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
            echo the_title();
		} elseif (is_search()) {
            echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
			echo '"<em>';
			echo the_search_query();
			echo '</em>"';
        }
    }

/*-----------------------------------------------------------------------------------*/	
/* Pagination
/*-----------------------------------------------------------------------------------*/
function themonic_pagination($pages = '', $range = 3)
{ $showitems = ($range * 3)+1;
 global $paged; if(empty($paged)) $paged = 1;
 if($pages == '') {
 global $wp_query; $pages = $wp_query->max_num_pages; if(!$pages)
 { $pages = 1; } }
 if(1 != $pages)
 { echo "<div class='pagination'><ul>";
 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo; First</a></li>";
 if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' class='inactive'>&lsaquo; Previous</a></li>";
 for ($i=1; $i <= $pages; $i++)
 { if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
 { echo ($paged == $i)? "<li class='current'><span class='currenttext'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
 } } if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."' class='inactive'>Next &rsaquo;</a></li>";
 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class='inactive' href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
 echo "</ul></div>"; }}

 //G+ Author integration
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
<h3><?php _e("Iconic One Pro User Information", "themonic"); ?></h3>

<table class="form-table">
<tr>
<th><label for="googleplus"><?php _e("Googleplus"); ?></label></th>
<td>
<input type="text" name="googleplus" id="googleplus" value="<?php echo esc_attr( get_the_author_meta( 'googleplus', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your G+ ID."); ?></span>
</td>
</tr>
<tr>
<th><label for="twitter"><?php _e("Twitter"); ?></label></th>
<td>
<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your Twitter ID."); ?></span>
</td>
</tr>
<tr>
<th><label for="facebook"><?php _e("Facebook"); ?></label></th>
<td>
<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your Facebook ID."); ?></span>
</td>
</tr>
</table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

update_user_meta( $user_id, 'googleplus', $_POST['googleplus'] );
update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
}
//G+ Author integration

//Font Awesome integration
function ioproawesome_css() {
wp_enqueue_style('fontawesome-css', get_bloginfo('stylesheet_directory').'/font/font-awesome.min.css' );
}
add_action('wp_enqueue_scripts', 'ioproawesome_css');

/** Branding
//*<?php $options = get_option('iconiconepro'); ?> 
//*Custom admin login header logo .get_bloginfo('template_directory').'/img/admin-logo.png
<?php echo $options['wp_login_logo'];?>$io_adminlogo = $options['wp_login_logo'];*/

function iconic_one_login_logo()  {
$options = get_option('iconiconepro');
 
if (isset ($options['wp_login_logo']) ){

echo '<style type="text/css">
h1 a {background-image: url(' . $options['wp_login_logo'] . ') !important; }
</style>';
}
}

add_action( 'login_head', 'iconic_one_login_logo' );

add_filter( 'login_headerurl', 'custom_loginlogo_url' );

function custom_loginlogo_url($url) {
	return get_home_url();
}
/**
* Custom admin login header logo
*/


/**flexslider and its css **/
function themonic_slider_scripts() {
    wp_enqueue_script('flexslider', get_bloginfo('stylesheet_directory').'/js/jquery.flexslider-min.js', array('jquery'));
    wp_enqueue_script('flexslider-init', get_bloginfo('stylesheet_directory').'/js/flexslider-init.js', array('jquery', 'flexslider'));
}
add_action('wp_enqueue_scripts', 'themonic_slider_scripts');

function themonic_slider_css() {
    wp_enqueue_style('flexslider', get_bloginfo('stylesheet_directory').'/js/flexslider.css');
}
add_action('wp_enqueue_scripts', 'themonic_slider_css');
/**flexslider and its css **/