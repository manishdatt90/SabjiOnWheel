<?php

/** 
 * Adding customizer link under Appearance menu
 */ 
	function iconic_one_pro_customize_button() {
	    $theme_page = add_theme_page(
	        __( 'Iconic One' , 'themonic' ),
	        __( 'Basic Settings' , 'themonic' ),  
	        'edit_theme_options' ,       
	        'customize.php'            
	    );
	} add_action('admin_menu', 'iconic_one_pro_customize_button');


/*
 * Iconic One Customizer - visit Themonic.com
 *
 * @since Iconic One Pro 1.0
 *
 */
function themonic_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'themonic_customize_register' );

/*
 * Loads Theme Customizer preview changes asynchronously.
 *
 * @since Iconic One Pro 1.0
 */
function themonic_customize_preview_js() {
	wp_enqueue_script( 'themonic-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130527', true );
}
add_action( 'customize_preview_init', 'themonic_customize_preview_js' );

//Themonic customizer begins
function themonic_theme_customizer( $wp_customize ) {
     $wp_customize->add_section( 'themonic_logo_section' , array(
    'title'       => __( 'Logo', 'themonic' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );
$wp_customize->add_setting( 'themonic_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themonicl_logo', array(
    'label'    => __( 'Logo', 'themonic' ),
    'section'  => 'themonic_logo_section',
    'settings' => 'themonic_logo',
) ) );
//Footer text area
class Themonic_Textarea_Control extends WP_Customize_Control {
	public $type = 'textarea';
	public function render_content() {
?>
<label>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<textarea rows="4" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
</label>
<?php
	}
}

$wp_customize->add_section('content' , array(
	'priority'    => 200,
));
$wp_customize->add_setting('textarea_copy', array('default' => 'Copyright 2013',));
$wp_customize->add_control(new Themonic_Textarea_Control($wp_customize, 'textarea_copy', array(
	'label' => 'Footer Copyright',
	'section' => 'content',
	'settings' => 'textarea_copy',
)));
$wp_customize->add_section('content' , array(
	'title' => __('Footer','themonic'),
	'priority'    => 300,
));
$wp_customize->add_setting('custom_text_right', array('default' => 'Custom Text Right',));
$wp_customize->add_control(new Themonic_Textarea_Control($wp_customize, 'custom_text_right', array(
	'label' => 'Custom Footer Text Right',
	'section' => 'content',
	'settings' => 'custom_text_right',
)));

//social text area
class Social_Textarea_Control extends WP_Customize_Control {
	public $type = 'textarea';
	public function render_content() {
?>
<label>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<textarea rows="1" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
</label>
<?php
	}
}

$wp_customize->add_setting('io_pro_social_roundcorner');
$wp_customize->add_control('io_pro_social_roundcorner', array(
        'type' => 'checkbox',
        'label' => 'I Like Rounded Corners',
        'section' => 'sl_content',
		'priority'    => 1,
));
$wp_customize->add_section('sl_content' , array(
'title' => __('Social','themonic'),
	'priority'    => 40,
));


$wp_customize->add_setting('twitter_url', array('default' => 'http://twitter.com/',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'twitter_url', array(
	'label' => 'Twitter url',
	'section' => 'sl_content',
	'settings' => 'twitter_url',
)));


$wp_customize->add_setting('facebook_url', array('default' => 'http://facebook.com/',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'facebook_url', array(
	'label' => 'Facebook url',
	'section' => 'sl_content',
	'settings' => 'facebook_url',
)));

$wp_customize->add_setting('plus_url', array('default' => 'http://plus.google.com/',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'plus_url', array(
	'label' => 'Google Plus url',
	'section' => 'sl_content',
	'settings' => 'plus_url',
)));

$wp_customize->add_setting('rss_url', array('default' => 'http://wordpress.org/',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'rss_url', array(
	'label' => 'RSS url',
	'section' => 'sl_content',
	'settings' => 'rss_url',
	'priority'    => 100,
)));
$wp_customize->add_setting('linkedin_url', array('default' => 'http://linkedin.com',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'linkedin_url', array(
	'label' => 'Linkedin url',
	'section' => 'sl_content',
	'settings' => 'linkedin_url',
)));
$wp_customize->add_setting('youtube_url', array('default' => 'http://youtube.com',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'youtube_url', array(
	'label' => 'YouTube url',
	'section' => 'sl_content',
	'settings' => 'youtube_url',
)));

}
add_action('customize_register', 'themonic_theme_customizer');
