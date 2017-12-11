<?php
/**
 * WorkScout Theme Customizer.
 *
 * @package WorkScout
 */


Kirki::add_config( 'workscout', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'option',
    'option_name'   => 'workscout',
    'disable_output'   => false,
) );



Kirki::add_section( 'homepage', array(
    'title'          => esc_html__( 'Home Page Options', 'workscout'  ),
    'description'    => esc_html__( 'Options for Page with Job Search and Page with Resume Search', 'workscout'  ),
    'panel'          => '', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'image',
	    'settings'     => 'pp_jobs_search_bg',
	    'label'       => esc_html__( 'Background for search banner on homepage', 'workscout' ),
	    'description' => esc_html__( 'Set image for search banner, should be 1920px wide', 'workscout' ),
	    'section'     => 'homepage',
	    'default'     => '',
	    'priority'    => 10,
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'    => 'pp_transparent_header',
	    'label'       => esc_html__( 'Transparent header', 'workscout' ),
	    'section'     => 'homepage',
	    'description' => esc_html__( 'Enabling transparent header works only on \'Page with Jobs Search and Page with Resumes Search', 'workscout' ),
	    'default'     => false,
	    'priority'    => 12,
	
	) );

	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'    => 'pp_home_job_counter',
	    'label'       => esc_html__( 'Show job counter', 'workscout' ),
	    'section'     => 'homepage',
	    'description' => esc_html__( 'Disable to hide jobs counter', 'workscout' ),
	    'default'     => true,
	    'priority'    => 10,
	
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'dropdown-pages',
	    'settings'    => 'pp_categories_page',
	    'label'       => esc_html__( 'Choose "Browse Categories Page"', 'workscout' ),
	    'section'     => 'homepage',
	    'description' => esc_html__( 'This page needs to use template named "Job Categories Page Template"', 'workscout' ),
	    'priority'    => 10,
	) );



/*section blog*/

Kirki::add_section( 'blog', array(
    'title'          => esc_html__( 'Blog Options', 'workscout'  ),
    'description'    => esc_html__( 'Blog related options', 'workscout'  ),
    'panel'          => '', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'radio-image',
	    'settings'     => 'pp_blog_layout',
	    'label'       => esc_html__( 'Blog layout', 'workscout' ),
	    'description' => esc_html__( 'Choose the sidebar side for blog', 'workscout' ),
	    'section'     => 'blog',
	    'default'     => 'left-sidebar',
	    'priority'    => 10,
	    'choices'     => array(
	        'left-sidebar' => trailingslashit( trailingslashit( get_template_directory_uri() )) . '/images/left-sidebar.png',
	        'right-sidebar' => trailingslashit( trailingslashit( get_template_directory_uri() )) . '/images/right-sidebar.png',
	    ),
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'upload',
	    'settings'     => 'pp_blog_header_upload',
	    'label'       => esc_html__( 'Blog header image', 'workscout' ),
	    'description' => esc_html__( 'Set image for header, should be 1920px wide', 'workscout' ),
	    'section'     => 'blog',
	    'default'     => '',
	    'priority'    => 10,
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'multicheck',
	    'settings'     => 'pp_meta_single',
	    'label'       => esc_html__( 'Post meta informations on single post', 'workscout' ),
	    'description' => esc_html__( 'Set which elements of posts meta data you want to display', 'workscout' ),
	    'section'     => 'blog',
	    'default'     => array('author'),
	    'priority'    => 10,
	    'choices'     => array(
	        'author' 	=> esc_html__( 'Author', 'workscout' ),
	        'date' 		=> esc_html__( 'Date', 'workscout' ),
	        'tags' 		=> esc_html__( 'Tags', 'workscout' ),
	        'cat' 		=> esc_html__( 'Categories', 'workscout' ),
	    ),
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'multicheck',
	    'settings'     => 'pp_blog_meta',
	    'label'       => esc_html__( 'Post meta informations on blog post', 'workscout' ),
	    'description' => esc_html__( 'Set which elements of posts meta data you want to display on blog and archive pages', 'workscout' ),
	    'section'     => 'blog',
	    'default'     => array('author'),
	    'priority'    => 10,
	    'choices'     => array(
	        'author' 	=> esc_html__( 'Author', 'workscout' ),
	        'date' 		=> esc_html__( 'Date', 'workscout' ),
	        'tags' 		=> esc_html__( 'Tags', 'workscout' ),
	        'cat' 		=> esc_html__( 'Categories', 'workscout' ),
	        'com' 		=> esc_html__( 'Comments', 'workscout' ),
	    ),
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'text',
	    'settings'    => 'pp_blog_title',
	    'label'       => esc_html__( 'Blog title', 'workscout' ),
	    'default'     => esc_html__( 'Blog', 'workscout' ),
	    'section'     => 'blog',
	    'priority'    => 10,
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'text',
	    'settings'    => 'pp_blog_subtitle',
	    'label'       => esc_html__( 'Blog subtitle', 'workscout' ),
	    'default'     => esc_html__( 'Keep up to date with the latest news', 'workscout' ),
	    'section'     => 'blog',
	    'priority'    => 10,
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'multicheck',
	    'settings'     => 'pp_post_share',
	    'label'       => esc_html__( 'Share buttons on single post', 'workscout' ),
	    'description' => esc_html__( 'Set which share buttons you want to display on single post', 'workscout' ),
	    'section'     => 'blog',
	    'default'     => array(),
	    'priority'    => 10,
	    'choices'     => array(
	        'facebook' 	=> esc_html__( 'Facebook', 'workscout' ),
	        'twitter' 		=> esc_html__( 'Twitter', 'workscout' ),
	        'google-plus' 		=> esc_html__( 'Google Plus', 'workscout' ),
	        'pinterest' 		=> esc_html__( 'Pinterest', 'workscout' ),
	    ),
	) );



	Kirki::add_field( 'workscout', array(
	    'type'        => 'upload',
	    'settings'     => 'pp_logo_upload',
	    'label'       => esc_html__( 'Logo image', 'workscout' ),
	    'description' => esc_html__( 'Upload logo for your website', 'workscout' ),
	    'section'     => 'title_tagline',
	    'default'     => '',
	    'priority'    => 10,
	) );	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'upload',
	    'settings'     => 'pp_retina_logo_upload',
	    'label'       => esc_html__( 'Retina Logo image', 'workscout' ),
	    'description' => esc_html__( 'Upload Retina logo for your website', 'workscout' ),
	    'section'     => 'title_tagline',
	    'default'     => '',
	    'priority'    => 10,
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'upload',
	    'settings'     => 'pp_transparent_logo_upload',
	    'label'       => esc_html__( 'Home Page Logo for transparent header', 'workscout' ),
	    'description' => esc_html__( 'If you need to use different logo in case yours not readable on transparent header', 'workscout' ),
	    'section'     => 'title_tagline',
	    'default'     => '',
	    'priority'    => 13,
	) );	
	Kirki::add_field( 'workscout', array(
	    'type'        => 'upload',
	    'settings'     => 'pp_transparent_retina_logo_upload',
	    'label'       => esc_html__( 'Home Page Retina Logo for transparent header', 'workscout' ),
	    'description' => esc_html__( 'If you need to use different logo in case yours not readable on transparent header', 'workscout' ),
	    'section'     => 'title_tagline',
	    'default'     => '',
	    'priority'    => 14,
	) );

Kirki::add_section( 'layout', array(
    'title'          => esc_html__( 'Layout Options', 'workscout'  ),
    'description'    => esc_html__( 'Layout and header options', 'workscout'  ),
    'panel'          => '', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'select',
	    'settings'    => 'pp_body_style',
	    'label'       => esc_html__( 'Layout style', 'workscout' ),
	    'section'     => 'layout',
	    'description' => '',
	    'default'     => 'fullwidth',
	    'priority'    => 10,
	    'choices'     => array(
	        'boxed'		=> esc_html__( 'Boxed', 'workscout' ),
	        'fullwidth' => esc_html__( 'Full-width', 'workscout' ),
	    ),
	) );

	

Kirki::add_section( 'shop', array(
    'title'          => esc_html__( 'WooCommerce Options', 'workscout'  ),
    'description'    => esc_html__( 'Shop related options', 'workscout'  ),
    'panel'          => '', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'radio-image',
	    'settings'     => 'pp_shop_layout',
	    'label'       => esc_html__( 'Shop layout', 'workscout' ),
	    'description' => esc_html__( 'Choose the sidebar side for shop', 'workscout' ),
	    'section'     => 'shop',
	    'default'     => 'full-width',
	    'priority'    => 10,
	    'choices'     => array(
	        'left-sidebar' => trailingslashit( trailingslashit( get_template_directory_uri() )) . '/images/left-sidebar.png',
	        'right-sidebar' => trailingslashit( trailingslashit( get_template_directory_uri() )) . '/images/right-sidebar.png',
	        'full-width' => trailingslashit( trailingslashit( get_template_directory_uri() )) . '/images/full-width.png',
	    ),
	) );
	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'    => 'pp_shop_ordering',
	    'label'       => esc_html__( 'Show/hide results count and order select on shop page', 'workscout' ),
	    'section'     => 'shop',
	    'description' => esc_html__( 'With this setting set to On, results count and order select on shop page will be displayed', 'workscout' ),
	    'default'     => true,
	    'priority'    => 10,
	) );


	Kirki::add_field( 'workscout', array(
	    'type'        => 'color',
	    'settings'    => 'pp_main_color',
	    'label'       => esc_html__( 'Select main theme color', 'workscout' ),
	    'section'     => 'colors',
	    'default'     => '#26ae61',
	    'priority'    => 10,
	) );


// ----------- HEADER OPTIONS ----------

Kirki::add_section( 'header', array(
    'title'          => esc_html__( 'Header Options', 'workscout'  ),
    'description'    => esc_html__( 'Header related options', 'workscout'  ),
    'panel'          => '', // Not typically needed.
    'priority'       => 150,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );


	Kirki::add_field( 'workscout', array(
		    'type'        => 'select',
		    'settings'    => 'pp_header_style',
		    'label'       => esc_html__( 'Header style', 'workscout' ),
		    'section'     => 'header',
		    'description' => '',
		    'default'     => 'default',
		    'priority'    => 11,
		    'choices'     => array(
		        'default'		=> esc_html__( 'Default', 'workscout' ),
		        'alternative' 	=> esc_html__( 'Alternative', 'workscout' ),
		        'full-width' 	=> esc_html__( 'Full-width', 'workscout' ),
		    ),
		) );


	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'    => 'pp_minicart_in_header',
	    'label'       => esc_html__( 'Mini shop cart in header', 'workscout' ),
	    'section'     => 'header',
	    'description' => esc_html__( 'Enable/disable mini shop cart in header', 'workscout' ),
	    'default'     => false,
	    'priority'    => 10,
	
	) );	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'    => 'pp_sticky_header',
	    'label'       => esc_html__( 'Sticky header', 'workscout' ),
	    'section'     => 'header',
	    'description' => esc_html__( 'Enable/disable sticky header', 'workscout' ),
	    'default'     => false,
	    'priority'    => 12,
	
	) );


// ----------- REGISTRATION OPTIONS ----------

Kirki::add_section( 'registration', array(
    'title'          => esc_html__( 'Login\Registration Options', 'workscout'  ),
    'description'    => esc_html__( 'User Registration options', 'workscout'  ),
    'panel'          => '', // Not typically needed.
    'priority'       => 150,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'    => 'pp_login_form_status',
	    'label'       => esc_html__( 'Login/Sign Up buttons in header', 'workscout' ),
	    'section'     => 'registration',
	    'description' => esc_html__( 'Enable/disable Login/Sing Up buttons in header', 'workscout' ),
	   	'default'     => true,
	    'priority'    => 10,
	) );	
	Kirki::add_field( 'workscout', array(
		'type'        => 'select',
		'settings'    => 'pp_login_form_system',
		'label'       => __( 'Choose the engine for front-end registartion', 'my_textdomain' ),
		'section'     => 'registration',
		'description' => esc_html__( 'Use WooCommerce, Ultimate Member, or you custom plugin', 'workscout' ),
		'priority'    => 10,
		'default'	  => 'workscout',
		'choices'     => array(
			'woocommerce' 	=> esc_html__( 'WooCommerce', 'workscout' ),
	        'um' 			=> esc_html__( 'Ultimate Member', 'workscout' ),
	        'custom'		=> esc_html__( 'Custom', 'workscout' ),
	        'workscout'		=> esc_html__( 'WorkScout', 'workscout' ),
	    ),
	) );
	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'    => 'pp_woo_redirect_user_page_candidate',
	    'label'       => esc_html__( 'User Page to Candidate Dashboard redirect', 'workscout' ),
	    'section'     => 'registration',
	    'description' => esc_html__( 'If set to "On" the User Page button will link to Candidate Dashboard instead of My Account page (that applies only to candidates)', 'workscout' ),
	    'default'     => false,
	    'priority'    => 10,
	    'active_callback'  => array(
			array(
				'setting'  => 'pp_login_form_system',
				'operator' => 'contains',
				'value'    => array('woocommerce','workscout'),
			),
		)
	) );	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'    => 'pp_woo_redirect_user_page_employer',
	    'label'       => esc_html__( 'User Page to Employer Dashboard redirect', 'workscout' ),
	    'section'     => 'registration',
	    'description' => esc_html__( 'If set to "On" the User Page button will link to Employer Dashboard instead of My Account page  (that applies only to employers)', 'workscout' ),
	    'default'     => false,
	    'priority'    => 10,
	    'active_callback'  => array(
			array(
				'setting'  => 'pp_login_form_system',
				'operator' => 'contains',
				'value'    => array('woocommerce','workscout'),
			),
		)
	) );
	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'    => 'pp_login_form_type',
	    'label'       => esc_html__( 'Login/Sign Up form in popup', 'workscout' ),
	    'section'     => 'registration',
	    'description' => esc_html__( 'If set to "Off" login/sign up box will show up on separate page', 'workscout' ),
	    'default'     => true,
	    'priority'    => 10,
	    'active_callback'  => array(
			array(
				'setting'  => 'pp_login_form_system',
				'operator' => 'contains',
				'value'    => array('woocommerce','custom','workscout'),
			),
		)
	) );
	Kirki::add_field( 'workscout', array(
	    'type'        => 'dropdown-pages',
	    'settings'    => 'pp_login_workscout_page',
	    'label'       => esc_html__( 'User/login form page', 'workscout' ),
	    'section'     => 'registration',
	    'description' => esc_html__( 'Choose page that uses "Page Template Login"', 'workscout' ),
	    'priority'    => 10,
	    'active_callback'  => array(
			array(
				'setting'  => 'pp_login_form_system',
				'operator' => '==',
				'value'    => 'workscout',
			),
		)
	) );	
		
	
	Kirki::add_field( 'workscout', array(
	    'type'        => 'dropdown-pages',
	    'settings'    => 'pp_login_custom_login',
	    'label'       => esc_html__( 'Login form page', 'workscout' ),
	    'section'     => 'registration',
	    'description' => esc_html__( 'Choose page on which you have login form', 'workscout' ),
	    'priority'    => 10,
	    'active_callback'  => array(
			array(
				'setting'  => 'pp_login_form_system',
				'operator' => '==',
				'value'    => 'custom',
			),
		)
	) );	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'dropdown-pages',
	    'settings'    => 'pp_login_custom_register',
	    'label'       => esc_html__( 'Register form page', 'workscout' ),
	    'section'     => 'registration',
	    'description' => esc_html__( 'Choose page on which you have registration form', 'workscout' ),
	    'priority'    => 10,
	    'active_callback'  => array(
			array(
				'setting'  => 'pp_login_form_system',
				'operator' => '==',
				'value'    => 'custom',
			),
		)
	) );	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'dropdown-pages',
	    'settings'    => 'pp_login_custom_userpage',
	    'label'       => esc_html__( 'User page', 'workscout' ),
	    'section'     => 'registration',
	    'description' => esc_html__( 'This page will be linked under "User Page" button in header', 'workscout' ),
	    'priority'    => 10,
	    'active_callback'  => array(
			array(
				'setting'  => 'pp_login_form_system',
				'operator' => '==',
				'value'    => 'custom',
			),
		)
	) );	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'text',
	    'settings'    => 'pp_login_box_shortcode',
	    'label'       => esc_html__( 'Shortcode for login form in popup', 'workscout' ),
	    'section'     => 'registration',
	    'description' => '',
	    'priority'    => 10,
	    'active_callback'  => array(
			array(
				'setting'  => 'pp_login_form_system',
				'operator' => '==',
				'value'    => 'custom',
			),
			array(
				'setting'  => 'pp_login_form_type',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'text',
	    'settings'    => 'pp_registration_box_shortcode',
	    'label'       => esc_html__( 'Shortcode for registartion form in popup', 'workscout' ),
	    'section'     => 'registration',
	    'description' => '',
	   	'default'     => true,
	    'priority'    => 10,
	    'active_callback'  => array(
			array(
				'setting'  => 'pp_login_form_system',
				'operator' => '==',
				'value'    => 'custom',
			),
			array(
				'setting'  => 'pp_login_form_type',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );	


	

// ----------- FOOTER OPTIONS ----------

Kirki::add_section( 'footer', array(
    'title'          => esc_html__( 'Footer Options', 'workscout'  ),
    'description'    => esc_html__( 'Footer related options', 'workscout'  ),
    'panel'          => '', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'textarea',
	    'settings'    => 'pp_copyrights',
	    'label'       => esc_html__( 'Copyrights text', 'workscout' ),
	    'default'     => '&copy; Theme by Purethemes.net. All Rights Reserved.',
	    'section'     => 'footer',
	    'priority'    => 10,
	) );

	Kirki::add_field( 'workscout', array(
    'type'        => 'select',
    'settings'    => 'pp_footer_widgets',
    'label'       => esc_html__( 'Footer widgets layout', 'workscout' ),
    'description' => esc_html__( 'Total width of footer is 16 columns, here you can decide layout based on columns number for each widget area in footer', 'workscout' ),
    'section'     => 'footer',
    'default'     => '5,3,3,5',
    'priority'    => 10,
    'choices'     => array(
        '7,3,6'		=> esc_html__( '7 | 3 | 6', 'workscout' ),
        '7,3,3,3' 	=> esc_html__( '7 | 3 | 3 | 3', 'workscout' ),
        '5,3,3,5' 	=> esc_html__( '5 | 3 | 3 | 5', 'workscout' ),
        '4,4,4,4' 	=> esc_html__( '4 | 4 | 4 | 4', 'workscout' ),
        '8,8' 		=> esc_html__( '8 | 8', 'workscout' ),
        '1/3,2/3' 	=> esc_html__( '1/3 | 2/3', 'workscout' ),
        '2/3,1/3' 	=> esc_html__( '2/3 | 1/3', 'workscout' ),
        '1/3,1/3,1/3' 	=> esc_html__( '1/3 | 1/3 | 1/3', 'workscout' ),
    ),
	) );

Kirki::add_section( 'jobs', array(
    'title'          => esc_html__( 'Jobs Options', 'workscout'  ),
    'description'    => esc_html__( 'Job related options', 'workscout'  ),
    'panel'          => '', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'upload',
	    'settings'     => 'pp_jobs_header_upload',
	    'label'       => esc_html__( 'Jobs header image', 'workscout' ),
	    'description' => esc_html__( 'Used on Job archive page. Set image for header, should be 1920px wide', 'workscout' ),
	    'section'     => 'jobs',
	    'default'     => '',
	    'priority'    => 10,
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'select',
	    'settings'    => 'pp_call_to_action_jobs',
	    'label'       => esc_html__( 'Call to action button in header', 'workscout' ),
	    'section'     => 'jobs',
	    'description' => '',
	    'default'     => 'jobs',
	    'priority'    => 10,
	    'choices'     => array(
	        'job'		=> __( 'Post a Job! It\'s Free!', 'workscout' ),
	        'resume'	=> __( 'Post a Resume! It\'s Free!', 'workscout' ),
	        'nothing' 	=> esc_html__( 'Show nothing', 'workscout' ),
	    ),
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'radio-image',
	    'settings'     => 'pp_job_layout',
	    'label'       => esc_html__( 'Single Job layout', 'workscout' ),
	    'description' => esc_html__( 'Choose the sidebar side for single job', 'workscout' ),
	    'section'     => 'jobs',
	    'default'     => 'right-sidebar',
	    'priority'    => 10,
	    'choices'     => array(
	        'left-sidebar' => trailingslashit( trailingslashit( get_template_directory_uri() )) . '/images/left-sidebar.png',
	        'right-sidebar' => trailingslashit( trailingslashit( get_template_directory_uri() )) . '/images/right-sidebar.png',
	    ),
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'multicheck',
	    'settings'     => 'pp_job_share',
	    'label'       => esc_html__( 'Share buttons on single job', 'workscout' ),
	    'description' => esc_html__( 'Set which share buttons you want to display on single job post', 'workscout' ),
	    'section'     => 'jobs',
	    'default'     => array(),
	    'priority'    => 10,
	    'choices'     => array(
	        'facebook' 	=> esc_html__( 'Facebook', 'workscout' ),
	        'twitter' 		=> esc_html__( 'Twitter', 'workscout' ),
	        'google-plus' 		=> esc_html__( 'Google Plus', 'workscout' ),
	        'pinterest' 		=> esc_html__( 'Pinterest', 'workscout' ),
	        'linkedin' 		=> esc_html__( 'LinkedIn', 'workscout' ),
	    ),
	) );

	Kirki::add_field( 'workscout', array(
		'type'        => 'select',
		'settings'    => 'pp_job_list_logo_position',
		'label'       => __( 'Logo position on jobs list', 'workscout' ),
		'section'     => 'jobs',
		'description' => esc_html__( 'If you don\'t like cropped out logos, move them to the right!', 'workscout' ),
		'priority'    => 10,
		'default'	  => 'left',
		'choices'     => array(
			'left' 	=> esc_html__( 'Left', 'workscout' ),
	        'right' => esc_html__( 'Right', 'workscout' ),
	    ),
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'     => 'pp_enable_related_jobs',
	    'label'       => esc_html__( 'Enable related Jobs on Single Job', 'workscout' ),
	    'section'     => 'jobs',
	    'default'     => 0,
	    'priority'    => 10,
	) );	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'     => 'pp_enable_single_jobs_map',
	    'label'       => esc_html__( 'Enable map on Single Job', 'workscout' ),
	    'section'     => 'jobs',
	    'default'     => 0,
	    'priority'    => 12,
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'select',
	    'settings'     => 'pp_maps_single_zoom',
	    'label'       => esc_html__( 'Default Map zoom level', 'workscout' ),
	    'section'     => 'jobs',
	    'default'     => '10',
	    'choices'     => array(
			'1' 	=> '1',
			'2' 	=> '2',
			'3' 	=> '3',
			'4' 	=> '4',
			'5' 	=> '5',
			'6' 	=> '6',
			'7' 	=> '7',
			'8' 	=> '8',
			'9' 	=> '9',
			'10' 	=> '10',
			'11' 	=> '11',
			'12' 	=> '12',
			'13' 	=> '13',
			'14' 	=> '14',
			'15' 	=> '15',
			'16' 	=> '16',
			'17' 	=> '17',
			'18' 	=> '18',
	    ),
	    'priority'    => 13,
	   
	) );


Kirki::add_section( 'resumes', array(
    'title'          => esc_html__( 'Resumes Options', 'workscout'  ),
    'description'    => esc_html__( 'Resume related options', 'workscout'  ),
    'panel'          => '', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'upload',
	    'settings'     => 'pp_resumes_header_upload',
	    'label'       => esc_html__( 'Resumes header image', 'workscout' ),
	    'description' => esc_html__( 'Used on Resumes archive page. Set image for header, should be 1920px wide', 'workscout' ),
	    'section'     => 'resumes',
	    'default'     => '',
	    'priority'    => 10,
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'select',
	    'settings'    => 'pp_call_to_action_resumes',
	    'label'       => esc_html__( 'Call to action button in header', 'workscout' ),
	    'section'     => 'resumes',
	    'description' => '',
	    'default'     => 'resumes',
	    'priority'    => 10,
	    'choices'     => array(
	        'job'		=> __( 'Post a Job! It\'s Free!', 'workscout' ),
	        'resume'	=> __( 'Post a Resume! It\'s Free!', 'workscout' ),
	        'nothing' 	=> esc_html__( 'Show nothing', 'workscout' ),
	    ),
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'     => 'pp_resume_rounded_photos',
	    'label'       => esc_html__( 'Rounded resumes photos', 'workscout' ),
	    'description' => esc_html__( 'Turn it off for rectangular photos', 'workscout' ),
	    'section'     => 'resumes',
	    'default'     => 0,
	    'priority'    => 10,
	) );


Kirki::add_section( 'maps', array(
    'title'          => esc_html__( 'Maps Options', 'workscout'  ),
    'description'    => esc_html__( 'Maps related options', 'workscout'  ),
    'panel'          => '', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );


	Kirki::add_field( 'workscout', array(
	    'type'        => 'text',
	    'settings'     => 'pp_maps_browser_api',
	    'label'       => esc_html__( 'Google Maps API Key', 'workscout' ),
	    'description' => __( 'Check <a href="http://purethemes.helpscoutdocs.com/article/73-google-maps-api-key-for-workscout">How to generate the API key</a> ', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => '',
	    'priority'    => 10,
	) );	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'     => 'pp_enable_jobs_map',
	    'label'       => esc_html__( 'Enable map on Jobs page', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => 0,
	    'priority'    => 10,
	) );


	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'     => 'pp_enable_all_jobs_map',
	    'label'       => esc_html__( 'Use all jobs map', 'workscout' ),
	    'description' => __( 'If enabled map will show ALL your jobs instead of the jobs currently filteres/searched for. ', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => 0,
	    'priority'    => 10,
	    'active_callback'  => array(
			array(
				'setting'  => 'pp_enable_jobs_map',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'     => 'pp_enable_resumes_map',
	    'label'       => esc_html__( 'Enable map on Resumes page', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => 0,
	    'priority'    => 10,
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'     => 'pp_enable_all_resumes_map',
	    'label'       => esc_html__( 'Use all resumes map', 'workscout' ),
	    'description' => __( 'If enabled map will show ALL your resumes instead of the resumes currently filteres/searched for. ', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => 0,
	    'priority'    => 10,
	    'active_callback'  => array(
			array(
				'setting'  => 'pp_enable_resumes_map',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'     => 'pp_maps_geocode',
	    'label'       => esc_html__( 'Enabel address autosuggestion and radius search', 'workscout' ),
	    'description' => __( 'This might require using Premium Plan in Google Maps API as the daily quota for geocoding is 2,500 free requests per day. ', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => 0,
	    'priority'    => 10,
	) );

	Kirki::add_field( 'workscout', array(
	    'type'        => 'text',
	    'settings'     => 'pp_maps_default_radius',
	    'label'       => esc_html__( 'Default radius value used for search by location', 'workscout' ),
	    'description' => __( 'Leave this field empty to not use geocoding on default search, this will save your API requests number but jobs will be searched only by comparing text of location.', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => '',
	    'priority'    => 10,
	) );	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'     => 'pp_miles_default_map',
	    'label'       => esc_html__( 'Set miles as default (instead of km)', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => 0,
	    'priority'    => 10,
	) );

	Kirki::add_field( 'workscout', array(
		'type'        => 'dimension',
		'settings'    => 'pp_map_height',
		'label'       => __( 'Map height', 'my_textdomain' ),
		'section'     => 'maps',
		'default'     => '400px',
		'priority'    => 10,
	) );


	Kirki::add_field( 'workscout', array(
	    'type'        => 'color',
	    'settings'     => 'pp_maps_marker_color',
	    'label'       => esc_html__( 'Marker color', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => '#808080',
	    'priority'    => 10,
	) );	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'     => 'pp_maps_clusters',
	    'label'       => esc_html__( 'Group nearby markes in clusters', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => 1,
	    'priority'    => 10,
	) );		
	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'     => 'pp_maps_autofit',
	    'label'       => esc_html__( 'Autofit all job markers on map', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => 1,
	    'priority'    => 10,
	) );
	Kirki::add_field( 'workscout', array(
	    'type'        => 'select',
	    'settings'     => 'pp_maps_default_zoom',
	    'label'       => esc_html__( 'Default zoom level', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => '10',
	    'choices'     => array(
			'1' 	=> '1',
			'2' 	=> '2',
			'3' 	=> '3',
			'4' 	=> '4',
			'5' 	=> '5',
			'6' 	=> '6',
			'7' 	=> '7',
			'8' 	=> '8',
			'9' 	=> '9',
			'10' 	=> '10',
			'11' 	=> '11',
			'12' 	=> '12',
			'13' 	=> '13',
			'14' 	=> '14',
			'15' 	=> '15',
			'16' 	=> '16',
			'17' 	=> '17',
			'18' 	=> '18',
	    ),
	    'priority'    => 10,
	    'active_callback'  => array(
			array(
				'setting'  => 'pp_maps_autofit',
				'operator' => '!=',
				'value'    => 1,
			),
		)
	) );
	Kirki::add_field( 'workscout', array(
	    'type'        => 'text',
	    'settings'    => 'pp_map_center',
	    'label'       => esc_html__( 'Custom Center point', 'workscout' ),
	    'description'     => esc_html__( 'Write latitude and longitude separated by come, for example -34.397,150.644', 'workscout' ),
	    'section'     => 'maps',
	    'priority'    => 10,
	    
	) );
	
	Kirki::add_field( 'workscout', array(
	    'type'        => 'select',
	    'settings'     => 'pp_maps_type',
	    'label'       => esc_html__( 'Map type', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => 'ROADMAP',
	    'choices'     => array(
			'ROADMAP' 	=> 'ROADMAP',
			'HYBRID' 	=> 'HYBRID',
			'SATELLITE' => 'SATELLITE',
			'TERRAIN' 	=> 'TERRAIN',
	    ),
	    'priority'    => 10,
	) );	

	Kirki::add_field( 'workscout', array(
	    'type'        => 'switch',
	    'settings'     => 'pp_maps_scroll_zoom',
	    'label'       => esc_html__( 'Set zoom with scrollwheel', 'workscout' ),
	     'description' => __( 'Disabled by default as it might create problems witch scrolling page', 'workscout' ),
	    'section'     => 'maps',
	    'default'     => '0',
	    'priority'    => 10,
	) );

/*


Max Zoom In Level
Max Zoom Out Level*/

add_action('wp_head', 'workscout_stylesheet_content');


function workscout_generate_typo_css($typo){
    if($typo){
        $wpv_ot_default_fonts = array('arial','georgia','helvetica','palatino','tahoma','times','trebuchet','verdana');        
        $ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
        foreach ($typo as  $key => $value) {
            if(isset($value) && !empty($value)) {
                if($key=='font-color') { $key = "color"; }
                if($key=='font-family') { 
                    if ( ! in_array( $value, $wpv_ot_default_fonts ) ) {
                        $value = $ot_google_fonts[$value]['family']; } 
                    }
                echo $key.":".$value.";";
                
            }
        }
    }
}

function workscout_generate_bg_css($typo){
    if($typo){
        foreach ($typo as  $key => $value) {
            if(isset($value) && !empty($value)) {
                if($key=='background-image') $value = "url('".$value."')";
                return esc_attr($key).":".$value.";";
            }
        }
    }
}


function mobile_menu_css(){
    $bodytypo = ot_get_option( 'workscout_body_font');
    $menutypo = ot_get_option( 'workscout_menu_font');
    $logotypo = ot_get_option( 'workscout_logo_font');
    $headerstypo = ot_get_option( 'workscout_headers_font');

    $ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
 
    if(isset($bodytypo['font-family'])) {
        $tempfamily = $bodytypo['font-family'];
        
        $wpv_ot_default_fonts = array('arial','georgia','helvetica','palatino','tahoma','times','trebuchet','verdana');
        if(!empty($tempfamily)) {
	        if ( in_array( $tempfamily, $wpv_ot_default_fonts ) ) {
	            $family = $tempfamily;
	        } else {
	            $ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
	            $family = $ot_google_fonts[$tempfamily]['family'];  
	        }
        }
    } else {
        $family = '';
    }
?>
<style type="text/css">

<?php if(isset($family) && !empty($family)){ ?>
    body,
    input[type="text"],
    input[type="password"],
    input[type="email"],
    textarea,
    select,
    input.newsletter,
    .map-box p,select#archives-dropdown--1, select#cat, select#categories-dropdown--1,
    .widget_search input.search-field, .widget_text select,.map-box p {
        font-family: "<?php echo $family; ?>";
    }
<?php } ?>
    body { <?php workscout_generate_typo_css($bodytypo); ?> }
    h1, h2, h3, h4, h5, h6  { <?php workscout_generate_typo_css($headerstypo); ?> }
    #logo h1 a, #logo h2 a { <?php workscout_generate_typo_css($logotypo); ?> }
    body .menu ul > li > a, body .menu ul li a {  <?php workscout_generate_typo_css($menutypo); ?>  }
   
    </style>
  <?php
}
add_action('wp_head', 'mobile_menu_css');


function workscout_stylesheet_content() { 

$maincolor = Kirki::get_option( 'workscout', 'pp_main_color' ); 
$mapheight = Kirki::get_option( 'workscout', 'pp_map_height', '400px' ); 

?>
<style type="text/css">

.current-menu-item > a,a.button.gray.app-link.opened,ul.float-right li a:hover,.menu ul li.sfHover a.sf-with-ul,.menu ul li a:hover,a.menu-trigger:hover,
.current-menu-parent a,#jPanelMenu-menu li a:hover,.search-container button,.upload-btn,button,input[type="button"],input[type="submit"],a.button,.upload-btn:hover,#titlebar.photo-bg a.button.white:hover,a.button.dark:hover,#backtotop a:hover,.mfp-close:hover,.woocommerce-MyAccount-navigation li.is-active a,.tabs-nav li.active a, .tabs-nav-o li.active a,.accordion h3.active-acc,.highlight.color, .plan.color-2 .plan-price,.plan.color-2 a.button,.tp-leftarrow:hover,.tp-rightarrow:hover,
.pagination ul li a.current-page,.woocommerce-pagination .current,.pagination .current,.pagination ul li a:hover,.pagination-next-prev ul li a:hover,
.infobox,.load_more_resumes,.job-manager-pagination .current,.hover-icon,.comment-by a.reply:hover,.chosen-container .chosen-results li.highlighted,
.chosen-container-multi .chosen-choices li.search-choice,.list-search button,.checkboxes input[type=checkbox]:checked + label:before, .listings-loader,
.widget_range_filter .ui-state-default,.tagcloud a:hover,.filter_by_tag_cloud a.active,.filter_by_tag_cloud a:hover,#wp-calendar tbody td#today,.footer-widget .tagcloud a:hover,.nav-links a:hover, .icon-box.rounded i:after, #mapnav-buttons a:hover,
.comment-by a.comment-reply-link:hover,#jPanelMenu-menu .current-menu-item > a, .button.color { background-color: <?php echo esc_attr($maincolor); ?>; }

a,table td.title a:hover,table.manage-table td.action a:hover,#breadcrumbs ul li a:hover,#titlebar span.icons a:hover,.counter-box i,
.counter,#popular-categories li a i,.list-1 li:before,.dropcap,.resume-titlebar span a:hover i,.resume-spotlight h4, .resumes-content h4,.job-overview ul li i,
.company-info span a:hover,.infobox a:hover,.meta-tags span a:hover,.widget-text h5 a:hover,.app-content .info span ,.app-content .info ul li a:hover,
table td.job_title a:hover,table.manage-table td.action a:hover,.job-spotlight span a:hover,.widget_rss li:before,.widget_rss li a:hover,
.widget_categories li:before,.widget-out-title_categories li:before,.widget_archive li:before,.widget-out-title_archive li:before,
.widget_recent_entries li:before,.widget-out-title_recent_entries li:before,.categories li:before,.widget_meta li:before,.widget_recent_comments li:before,
.widget_nav_menu li:before,.widget_pages li:before,.widget_categories li a:hover,.widget-out-title_categories li a:hover,.widget_archive li a:hover,
.widget-out-title_archive li a:hover,.widget_recent_entries li a:hover,.widget-out-title_recent_entries li a:hover,.categories li a:hover,
.widget_meta li a:hover,#wp-calendar tbody td a,.widget_nav_menu li a:hover,.widget_pages li a:hover,.resume-title a:hover, .company-letters a:hover, .companies-overview li li a:hover,.icon-box.rounded i, .icon-box i,
#titlebar .company-titlebar span a:hover{ color:  <?php echo esc_attr($maincolor); ?>; }
.icon-box.rounded i { border-color: <?php echo esc_attr($maincolor); ?>; }
.resumes li a:before,.resumes-list li a:before,.job-list li a:before,table.manage-table tr:before {	-webkit-box-shadow: 0px 1px 0px 0px rgba(<?php echo workscout_hex2rgb($maincolor, true) ?>,0.7);	-moz-box-shadow: 0px 1px 0px 0px rgba(<?php echo workscout_hex2rgb($maincolor, true) ?>,0.7);	box-shadow: 0px 1px 0px 0px rgba(<?php echo workscout_hex2rgb($maincolor, true) ?>,0.7);}
#popular-categories li a:before {-webkit-box-shadow: 0px 0px 0px 1px rgba(<?php echo workscout_hex2rgb($maincolor, true) ?>,0.7);-moz-box-shadow: 0px 0px 0px 1px rgba(<?php echo workscout_hex2rgb($maincolor, true) ?>,0.7);box-shadow: 0px 0px 0px 1px rgba(<?php echo workscout_hex2rgb($maincolor, true) ?>,0.7);}
table.manage-table tr:hover td,.resumes li:hover,.job-list li:hover { border-color: rgba(<?php echo workscout_hex2rgb($maincolor, true) ?>,0.7); }

table.manage-table tr:hover td,.resumes li:hover,.job-list li:hover, #popular-categories li a:hover { background-color: rgba(<?php echo workscout_hex2rgb($maincolor, true) ?>,0.05); }



#search_map {
	height: <?php echo $mapheight; ?>;
}

<?php $ordering = Kirki::get_option( 'workscout', 'pp_shop_ordering' ); 
if($ordering) { ?>
	.woocommerce-ordering { display: none; }
	.woocommerce-result-count { display: none; }
<?php } ?>

<?php echo ot_get_option( 'pp_custom_css' );  ?>

</style>

<?php }	



/**
 * Convert a hexa decimal color code to its RGB equivalent
 *
 * @param string $hexStr (hexadecimal color value)
 * @param boolean $returnAsString (if set true, returns the value separated by the separator character. Otherwise returns associative array)
 * @param string $seperator (to separate RGB values. Applicable only if second parameter is true.)
 * @return array or string (depending on second parameter. Returns False if invalid hex color value)
 */
function workscout_hex2rgb($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}