<?php
/*
 * Header Section of Iconic One
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Iconic One Pro
 * 
 * @since Iconic One Pro 1.0
 */
?><!DOCTYPE html>
<?php $options = get_option('iconiconepro'); ?>

<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if(  isset($options['iop_favicon']) && $options['iop_favicon'] != '' ){ ?>
<link rel="shortcut icon" href="<?php echo $options['iop_favicon'];?>" />
<?php }?>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php iop_head(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php $options = get_option('iconiconepro'); ?>
	
<div id="page" class="hfeed site">
<?php if($options['above_header_check'] == '1') { // display above header #AD3()?>
			<div class="themonic-ad3"><?php echo $options['above_header_hook']; ?></div>
		<?php } ?>
	<header id="masthead" class="site-header" role="banner">
			<?php if ( get_theme_mod( 'themonic_logo' ) ) : ?>
		<div class="themonic-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'themonic_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
		</div>
		<div class="socialmedia">
			<?php if( get_theme_mod( 'twitter_url' ) !== '' ) { ?>
				<a href="<?php echo get_theme_mod( 'twitter_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Follow us on Twitter"/></a> 
			<?php } ?>
			<?php if( get_theme_mod( 'facebook_url' ) !== '' ) { ?>
					<a href="<?php echo get_theme_mod( 'facebook_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Follow us on Facebook"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'plus_url' ) !== '' ) { ?>
					<a href="<?php echo get_theme_mod( 'plus_url', 'default_value' ); ?>" rel="author" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Follow us on Google Plus"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'linkedin_url' ) !== '' ) { ?>
			 <a href="<?php echo get_theme_mod( 'linkedin_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.png" alt="Linkedin"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'youtube_url' ) !== '' ) { ?>
			 <a href="<?php echo get_theme_mod( 'youtube_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/youtube.png" alt="YouTube"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'rss_url' ) !== '' ) { ?>
			<a class="rss" href="<?php echo get_theme_mod( 'rss_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/rss.png" alt="Follow us on rss"/></a>			
			<?php } ?>
		</div>
			<?php else : ?>
		<hgroup>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<br .../> <a class="site-description"><?php bloginfo( 'description' ); ?></a>
		</hgroup>
		<div class="socialmedia">
			<?php if( get_theme_mod( 'twitter_url' ) !== '' ) { ?>
				<a href="<?php echo get_theme_mod( 'twitter_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Follow us on Twitter"/></a> 
			<?php } ?>
			<?php if( get_theme_mod( 'facebook_url' ) !== '' ) { ?>
					<a href="<?php echo get_theme_mod( 'facebook_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Follow us on Facebook"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'plus_url' ) !== '' ) { ?>
					<a href="<?php echo get_theme_mod( 'plus_url', 'default_value' ); ?>" rel="author" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Follow us on Google Plus"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'linkedin_url' ) !== '' ) { ?>
			 <a href="<?php echo get_theme_mod( 'linkedin_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.png" alt="Linkedin"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'youtube_url' ) !== '' ) { ?>
			 <a href="<?php echo get_theme_mod( 'youtube_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/youtube.png" alt="YouTube"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'rss_url' ) !== '' ) { ?>
			<a class="rss" href="<?php echo get_theme_mod( 'rss_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/rss.png" alt="Follow us on rss"/></a>			
			<?php } ?>
		</div>
		<?php endif; ?>

		<nav id="site-navigation" class="themonic-nav" role="navigation">
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'themonic' ); ?>"><?php _e( 'Skip to content', 'themonic' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-top', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
		<div class="clear"></div>
	</header><!-- #masthead -->
	<?php if($options['below_header_check'] == '1') { // display below nav #AD3()?>
			<div class="themonic-ad2"><?php echo $options['below_header_hook']; ?></div>
		<?php } ?>
	<div id="main" class="wrapper">
	