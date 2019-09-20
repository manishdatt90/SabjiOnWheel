<?php

$options = get_option('iconiconepro'); 

/*[Header Section]*/
if ( ! function_exists( 'iop_head' ) ) {
	function iop_head() { 
	global $options
?>
<style type="text/css">

<!--Theme color-->
	<?php if ($options['io_theme_color'] != '') { ?>
.themonic-nav .current-menu-item > a, .themonic-nav .current-menu-ancestor > a, .themonic-nav .current_page_item > a, .themonic-nav .current_page_ancestor > a {
    background: <?php echo $options['io_theme_color']; ?>;
    color: #FFFFFF;
    font-weight: bold;
}
.themonic-nav ul.nav-menu, .themonic-nav div.nav-menu > ul {
    background: none repeat scroll 0 0 #F3F3F3;
    border-bottom: 5px solid <?php echo $options['io_theme_color']; ?>;
    }		
	
.themonic-nav li a:hover {
	background: <?php echo $options['io_theme_color']; ?>;
}
.themonic-nav li:hover {
	background: <?php echo $options['io_theme_color']; ?>;
}

li.current-menu-item{
	background:<?php echo $options['io_theme_color']; ?>
}

.themonic-nav .current-menu-item > a, .themonic-nav .current-menu-ancestor > a, .themonic-nav .current_page_item > a, .themonic-nav .current_page_ancestor > a {
     color: <?php echo $options['nav_menu_link']; ?>;
    font-weight: bold;
}

.themonic-nav li a:hover {
	color: <?php echo $options['nav_menu_link']; ?>;
}
.categories a {
    background:<?php echo $options['io_theme_color']; ?>;
}
.read-more a {
					color: <?php echo $options['io_theme_color']; ?>;
				}
.featured-post {
    color: <?php echo $options['io_theme_color']; ?>;
}

#emailsubmit {
    background: <?php echo $options['io_theme_color']; ?>;
}

#searchsubmit {
    background: <?php echo $options['io_theme_color']; ?>;
}

.themonic-nav .current-menu-item > a, .themonic-nav .current-menu-ancestor > a, .themonic-nav .current_page_item > a, .themonic-nav .current_page_ancestor > a {
    background: <?php echo $options['io_theme_color']; ?>;
}

.comments-area article {
    border-color: #E1E1E1 #E1E1E1 <?php echo $options['io_theme_color']; ?>;
}

	<?php } ?>
	<?php if( get_theme_mod( 'io_pro_social_roundcorner' ) == '1') { ?>
			.socialmedia img { border-radius: 20px;}
	<?php } ?>
</style>

<?php }
}

?>