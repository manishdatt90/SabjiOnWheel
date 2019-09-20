<?php
/* Set the text domain for the theme or plugin. */

define('Themonic_TEXT_DOMAIN', 'themonic');

/*
 *
 * Require the framework class before doing anything else, so we can use the defined URLs and directories.
 * If you are running on Windows you may have URL problems which can be fixed by defining the framework url first.
 *
 */
//define('Themonic_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('Themonic_Options')) {
    require_once(dirname(__FILE__) . '/options/themonic-reset.php');
}

/*
 *
 * Custom function for filtering the sections array. 
 */
function add_another_section($sections) {
    //$sections = array();
    $sections[] = array(
        'title' => __('A Section added by hook', Themonic_TEXT_DOMAIN),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', Themonic_TEXT_DOMAIN),
		'icon' => 'paper-clip',
		'icon_class' => 'icon-large',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array()
    );

    return $sections;
}
/*
 *
 * Custom function for filtering the args array given by a theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args) {
    //$args['dev_mode'] = false;

    return $args;
}

/*
 * Here you can override default values, uncomment args and change their values.
 * No $args are required, but they can be over ridden if needed.
 *
 */
function setup_framework_options() {
    $args = array();


    $args['dev_mode'] = false;

	$args['dev_mode_icon_class'] = 'icon-large';

    // Default: 'standard'
    $args['admin_stylesheet'] = 'custom';

    // Add HTML before the form.
    $args['intro_text'] = __('<p></p>', Themonic_TEXT_DOMAIN);

    // Add content after the form.
   // $args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', Themonic_TEXT_DOMAIN);

    // Set footer/credit line.
    //$args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', Themonic_TEXT_DOMAIN);

    // Setup custom links in the footer for share icons
    $args['share_icons']['twitter'] = array(
        'link' => 'http://twitter.com/themonicthemes',
        'title' => __('Follow me on Twitter', Themonic_TEXT_DOMAIN),
        'img' => Themonic_OPTIONS_URL . 'img/social/Twitter.png'
    );
    $args['share_icons']['facebook'] = array(
        'link' => 'http://www.facebook.com/themonicthemes',
        'title' => __('Find me on LinkedIn', Themonic_TEXT_DOMAIN),
        'img' => Themonic_OPTIONS_URL . 'img/social/Facebook.png'
    );

	$args['import_icon'] = 'download';

	$args['import_icon_class'] = 'icon-2x';

    // Set a custom option name. Don't forget to replace spaces with underscores!
    $args['opt_name'] = 'iconiconepro';

    // Set a custom menu icon.
    //$args['menu_icon'] = '';

    // Set a custom title for the options page.
    // Default: Options
    $args['menu_title'] = __('Iconic One Pro', Themonic_TEXT_DOMAIN);

    // Set a custom page title for the options page.
    // Default: Options
    $args['page_title'] = __('Iconic One Pro Options', Themonic_TEXT_DOMAIN);

    // Set a custom page slug for options page (wp-admin/themes.php?page=***).
    // Default: themonic_options
    $args['page_slug'] = 'iconic_one_pro_options';

    $args['page_position'] = 32;

    // Set a custom page icon class (used to override the page icon next to heading)
    //$args['page_icon'] = 'icon-themes';

	// Default: iconfont
	//$args['icon_type'] = 'image';
	$args['dev_mode_icon_type'] = 'iconfont';
	$args['import_icon_type'] = 'iconfont';

    // Disable the panel sections showing as submenu items.
    // Default: true
    //$args['allow_sub_menu'] = false;

    // Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
    $args['help_tabs'][] = array(
        'id' => 'themonic-opts-1',
        'title' => __('Support and Help', Themonic_TEXT_DOMAIN),
        'content' => __('<p>Visit themonic.com/support or use the contact form for super quick support</p>', Themonic_TEXT_DOMAIN)
    );
    $args['help_tabs'][] = array(
        'id' => 'themonic-opts-2',
        'title' => __('Credit', Themonic_TEXT_DOMAIN),
        'content' => __('<p>Modified NHP/Redux Framework</p> https://github.com/leemason/NHP-Theme-Options-Framework | https://github.com/ghost1227/Redux-Framework', Themonic_TEXT_DOMAIN)
    );

    // Set the help sidebar for the options page.
    $args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', Themonic_TEXT_DOMAIN);

    $sections = array();

    $sections[] = array(

		'icon_type' => 'iconfont',
		'icon' => 'home',
		// Set the class for this icon.
		// This field is ignored unless $args['icon_type'] = 'iconfont'
		'icon_class' => 'icon-2x',
        'title' => __('Getting Started', Themonic_TEXT_DOMAIN),
		'desc' => __('<p class="description">Kindly read the following section carefully.</p>', Themonic_TEXT_DOMAIN),
		'fields' => array(
			array(
				'id' => 'font_awesome_info',
				'type' => 'raw_html',
				'html' => '<h3 style="text-align: center; border-bottom: none;">First Things First</h3>
				<h4 style="font-size: 1.1em;">Use Live Customizer - for logo upload etc.</h4>
				<p>Simply go through the Live Customizer, it is available under Appearance >> Basic Settings, you can also access it by going to (http://websitename.com/wp-admin/customize.php) to change the logo image, top social bookmark links, background color, footer copyright etc. 
				All other Advanced customization can be made via this panel, you do not have to touch any code or login to ftp for the most 
				needed customizations. Click on Design Settings to start customizing.</p>
				<h4 style="font-size: 1.1em;">Step by Step Documentation</h4>
				<p style="font-size: 1.1em;">The sections on the left have been explained in details 
				in the online documentation with high resolution screenshots. It can be accessed at this location
				http://themonic.com/online-documentation-usage-guide-for-iconic-one-pro/, it is also available via your Member area.
				We have explained the steps in a beginner friendly approach so even if you are new to WordPress 
				you can easily setup things in just under 10 minutes.</p>
				Current Version:<h5 style="font-size: 1.1em;">Iconic One PRO v1.2</h5>
				<p>Changelog.txt is available in the theme folder root directory and in your member area.</p>
			    '
			)
		)
    );

      $sections[] = array(
		'icon' => 'off',
		'icon_class' => 'icon-2x',
        'title' => __('Main Settings', Themonic_TEXT_DOMAIN),
        'desc' => __('<p class="description">Enable or Disable the following features.</p>', Themonic_TEXT_DOMAIN),
        'fields' => array(
			
			 array(
                'id' => 'themonic_home_author',
                'type' => 'checkbox',
                'title' => __('Show Author ID on Home Page', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enables Author ID display on home page with small thumb.', Themonic_TEXT_DOMAIN),
                'desc' => __('Enabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '1' // 1 = checked | 0 = unchecked
            ),
		
            array(
                'id' => 'themonic_breadcrumb',
                'type' => 'checkbox',
                'title' => __('Breadcrumb Option', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable Breadcrumb', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
			array(
                'id' => 'io_pro_featured_single_post',
                'type' => 'checkbox',
                'title' => __('Show Featured Images on Single Posts', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Auto Select Featured Image, shown below title', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
			array(
                'id' => 'themonic_pagination',
                'type' => 'checkbox',
                'title' => __('Pagination Option', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable Pagination', Themonic_TEXT_DOMAIN),
                'desc' => __('Enabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '1' // 1 = checked | 0 = unchecked
            ),
			array(
                'id' => 'themonic_related_posts',
                'type' => 'checkbox',
                'title' => __('Related Posts', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable Related posts', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
			array(
                'id' => 'themonic_rp_thumbs',
                'type' => 'checkbox',
                'title' => __('Related Posts Thumbnails', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable Related posts thumbnails', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
			array(
                'id' => 'iconic_one_pro_footer_widget',
                'type' => 'checkbox',
                'title' => __('Footer Widget Area', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable Footer Widget Area', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
		         
        )
    );
	
	$sections[] = array(
		'icon' => 'cog',
		'icon_class' => 'icon-2x',
        'title' => __('Design Settings', Themonic_TEXT_DOMAIN),
        'desc' => __('<p class="description">Use these setting to change the appearance of your website</p>', Themonic_TEXT_DOMAIN),
        'fields' => array(
            array(
                'id' => 'io_theme_color',
                'type' => 'color',
                'title' => __('Customize Theme Color', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Change the main theme color', Themonic_TEXT_DOMAIN),
                'desc' => __('Use of a bit darker colors is recommended, if you have to use light color -> make use of the Menu link color setting given below.', Themonic_TEXT_DOMAIN),
                'std' => '#00A1E0'
            ),
            array(
                'id' => 'nav_menu_link',
                'type' => 'color',
                'title' => __('Menu link color', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Change the link color', Themonic_TEXT_DOMAIN),
                'desc' => __('Use this setting only if you are going to use light color background in the above"Theme Color" setting, else leave empty.', Themonic_TEXT_DOMAIN),
                'std' => ''
            ),
           
            array(
                'id' => 'iop_favicon',
                'type' => 'upload',
                'title' => __('Favicon Upload', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Upload your website favicon', Themonic_TEXT_DOMAIN),
                'desc' => __('', Themonic_TEXT_DOMAIN)
            ),
			array(
                'id' => 'wp_login_logo',
                'type' => 'upload',
                'title' => __('WP-Login Screen Logo', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Upload logo for Admin/Author login screen for Branding', Themonic_TEXT_DOMAIN),
                'desc' => __('', Themonic_TEXT_DOMAIN)
            ),
			              
        )
    );

	  $sections[] = array(
		'icon' => 'rocket',
		'icon_class' => 'icon-2x',
        'title' => __('Ad Management', Themonic_TEXT_DOMAIN),
        'desc' => __('<p class="description">Ad management console, use to this insert Adsense ads or html at locations defined. First Activate the area and then place the code.</p>', Themonic_TEXT_DOMAIN),
        'fields' => array(
		
		array(
                'id' => 'below_title_check',
                'type' => 'checkbox',
                'title' => __('Activate Below Title Hook #AD1', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable the following below title hook, after enabling enter the ad code below', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
				
		array(
                'id' => 'below_title_hook',
                'type' => 'textarea',
                'title' => __('Below Title Hook #AD1', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('You could use it to display Adsense ads below the title where it earns the most', Themonic_TEXT_DOMAIN),
                'desc' => __('', Themonic_TEXT_DOMAIN),
                'std' => 'HTML is also allowed.'
            ),
			
			array(
                'id' => 'below_header_check',
                'type' => 'checkbox',
                'title' => __('Activate Below Header Hook #AD2', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable the following hook', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
			
		array(
                'id' => 'below_header_hook',
                'type' => 'textarea',
                'title' => __('Below the Header Hook #AD2', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Use it to insert Ad code directly below the navigation', Themonic_TEXT_DOMAIN),
                'desc' => __('', Themonic_TEXT_DOMAIN),
                'std' => 'HTML is also allowed.',
             ),
			
			array(
                'id' => 'above_header_check',
                'type' => 'checkbox',
                'title' => __('Activate Above Header Hook #AD3', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable the following hook', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
			
			array(
                'id' => 'above_header_hook',
                'type' => 'textarea',
                'title' => __('Above the Header Hook #AD3', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Use it to insert Ad code above Header', Themonic_TEXT_DOMAIN),
                'desc' => __('', Themonic_TEXT_DOMAIN),
				'std' => 'HTML is also allowed.',
           ),
			
			array(
                'id' => 'below_article_check',
                'type' => 'checkbox',
                'title' => __('Activate Below Article Hook #AD4', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable the following hook', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
			
			array(
                'id' => 'below_article_hook',
                'type' => 'textarea',
                'title' => __('After Article Hook #AD4', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Use it to insert Ad code after the article', Themonic_TEXT_DOMAIN),
                'desc' => __('', Themonic_TEXT_DOMAIN),
                'std' => 'HTML is also allowed.',
            )
        
        )
    );
	
	$sections[] = array(
		'icon' => 'thumbs-up',
		'icon_class' => 'icon-2x',
        'title' => __('Social', Themonic_TEXT_DOMAIN),
        'desc' => __('<p class="description">First Enable Social Sharing and then select the buttons to show.</p>', Themonic_TEXT_DOMAIN),
        'fields' => array(
         	array(
                'id' => 'themonic_social_share',
                'type' => 'checkbox',
                'title' => __('Social Sharing', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable Social Bookmarking on posts', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
			array(
                'id' => 'themonic_facebook',
                'type' => 'checkbox',
                'title' => __('Facebook Share Option', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable Facebook button', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
			array(
                'id' => 'themonic_gplus',
                'type' => 'checkbox',
                'title' => __('Google Plus Share Option', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable Google+ button', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
			array(
                'id' => 'themonic_twitter',
                'type' => 'checkbox',
                'title' => __('Twitter Share Option', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable Twitter button', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
				array(
                'id' => 'themonic_pin',
                'type' => 'checkbox',
                'title' => __('Pinterest Share Option', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable Pinterest button', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            )
	
		)
    );
	
	$sections[] = array(
		'icon' => 'play',
		'icon_class' => 'icon-2x',
        'title' => __('Slider', Themonic_TEXT_DOMAIN),
        'desc' => __('<p class="description">Setup the Homepage Slider and Category Page Slider.</p>', Themonic_TEXT_DOMAIN),
        'fields' => array(
			
			array(
                'id' => 'themonic_slider',
                'type' => 'checkbox',
                'title' => __('Home Page Slider', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable or Disable Home Page Slider', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
			
			array(
                'id' => 'themonic_slider_category',
                'type' => 'cats_select',
                'title' => __('Select Home Page Slider Category', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('', Themonic_TEXT_DOMAIN),
                'desc' => __('Select the Category from which you want to show slider on Home page.', Themonic_TEXT_DOMAIN),
                'args' => array('number' => '') // Uses get_categories()
            ),
					
				array(
                'id' => 'themonic_category_slider',
                'type' => 'checkbox',
                'title' => __('Category Page Slider', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Enable Category Page slider, it will slide images from its respective category.', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => true,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),		
        )
    );
	
   $sections[] = array(
		'icon' => 'wrench',
		'icon_class' => 'icon-2x',
        'title' => __('Footer', Themonic_TEXT_DOMAIN),
        'desc' => __('<p class="description">For Tracking codes, it will load in the end to improve performance</p>', Themonic_TEXT_DOMAIN),
        'fields' => array(
			
			array(
                'id' => 'enable_footer_code',
                'type' => 'checkbox',
                'title' => __('Enable Footer Analytics Code', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Check this to activate the area below', Themonic_TEXT_DOMAIN),
                'desc' => __('Disabled by default', Themonic_TEXT_DOMAIN),
                'switch' => false,
                'std' => '0' // 1 = checked | 0 = unchecked
            ),
			
			array(
                'id' => 'footer_analytics',
                'type' => 'textarea',
                'title' => __('Footer Analytics Code', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('for eg. Google Analytics, Statcounter etc.', Themonic_TEXT_DOMAIN),
                'desc' => __('', Themonic_TEXT_DOMAIN),
                'std' => '',
            ),
			
				array(
                'id' => 'themonic_credit_link',
                'type' => 'checkbox',
                'title' => __('Credit link', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Uncheck this if you want to remove the credit link', Themonic_TEXT_DOMAIN),
                'desc' => __('', Themonic_TEXT_DOMAIN),
                'switch' => false,
                'std' => '1' // 1 = checked | 0 = unchecked
            ),
			
			array(
                'id' => 'themonic_affiliate',
                'type' => 'text',
                'title' => __('Affiliate ID', Themonic_TEXT_DOMAIN),
                'sub_desc' => __('Adds your affiliate ID to the footer credit link. Free registeration at Themonic.com/affiliate', Themonic_TEXT_DOMAIN),
                'desc' => __('Enter your Affiliate ID to  get 50% of all sales referred by you, no hassle monthly payouts. ', Themonic_TEXT_DOMAIN)
            ),
        
        )
    );
	

    $tabs = array();

    if(file_exists(trailingslashit(dirname(__FILE__)) . 'support.html')) {
        $tabs['docs'] = array(
			'icon' => 'medkit',
			'icon_class' => 'icon-2x',
            'title' => __('Support', Themonic_TEXT_DOMAIN),
            'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'support.html'))
        );
    }

    global $Themonic_Options;
    $Themonic_Options = new Themonic_Options($sections, $args, $tabs);

}
add_action('init', 'setup_framework_options', 0);

/*
 *
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}

/*
 *
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value) {
    $error = false;
    $value =  'just testing';
    /*
    do your validation

    if(something) {
        $value = $value;
    } elseif(somthing else) {
        $error = true;
        $value = $existing_value;
        $field['msg'] = 'your custom error message';
    }
    */

    $return['value'] = $value;
    if($error == true) {
        $return['error'] = $field;
    }
    return $return;
}
