<?php


function sixdegrees_scripts()  { 

  
}
add_action( 'wp_enqueue_scripts', 'sixdegrees_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header

add_theme_support( 'post-thumbnails' ); 

add_action( 'init', 'create_site_post_types' );

function create_site_post_types() {

	register_post_type( 'position',
		array(
			'labels' => array(
				'name' => 'Position',
				'singular_name' => 'Position',
				'add_new' => 'Add Position',
			),
			'public' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'query_var' => true,
			'has_archive' => false,
			'supports' => array('title'),
			'show_in_nav_menus' => true,
			'can_export' => true,
			'hierarchical' => false,
			'exclude_from_search' => true,
			'rewrite' => array('slug' => 'position','with_front' => false),
		)
	);

	register_post_type( 'header',
		array(
			'labels' => array(
				'name' => 'Header',
				'singular_name' => 'Header',
				'add_new' => 'Add Header',
			),
			'public' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'query_var' => true,
			'has_archive' => false,
			'supports' => array('title'),
			'show_in_nav_menus' => true,
			'can_export' => true,
			'hierarchical' => false,
			'exclude_from_search' => true,
			'rewrite' => array('slug' => 'header','with_front' => false),
		)
	);

	register_post_type( 'about',
		array(
			'labels' => array(
				'name' => 'About',
				'singular_name' => 'About',
				'add_new' => 'Add About',
			),
			'public' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'query_var' => true,
			'has_archive' => false,
			'supports' => array('title'),
			'show_in_nav_menus' => true,
			'can_export' => true,
			'hierarchical' => false,
			'exclude_from_search' => true,
			'rewrite' => array('slug' => 'about','with_front' => false),
		)
	);

	
	register_post_type( 'services',
		array(
			'labels' => array(
				'name' => 'Services',
				'singular_name' => 'Service',
				'add_new' => 'Add Service',
			),
			'public' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'query_var' => true,
			'has_archive' => false,
			'supports' => array('title'),
			'show_in_nav_menus' => true,
			'can_export' => true,
			'hierarchical' => false,
			'exclude_from_search' => true,
			'rewrite' => array('slug' => 'services','with_front' => false),
		)
	);

	register_post_type( 'team',
		array(
			'labels' => array(
				'name' => 'Team',
				'singular_name' => 'Team Member',
				'add_new' => 'Add Team Member',
			),
			'public' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'query_var' => true,
			'has_archive' => false,
			'supports' => array('title'),
			'show_in_nav_menus' => true,
			'can_export' => true,
			'hierarchical' => false,
			'exclude_from_search' => true,
			'rewrite' => array('slug' => 'team','with_front' => false),
		)
	);

	register_post_type( 'news',
		array(
			'labels' => array(
				'name' => 'News',
				'singular_name' => 'News',
				'add_new' => 'Add News',
			),
			'public' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'query_var' => true,
			'has_archive' => false,
			'supports' => array('title'),
			'show_in_nav_menus' => true,
			'can_export' => true,
			'hierarchical' => false,
			'exclude_from_search' => true,
			'rewrite' => array('slug' => 'news','with_front' => false),
		)
	);

	register_post_type( 'candidates',
		array(
			'labels' => array(
				'name' => 'Candidates',
				'singular_name' => 'Candidates',
				'add_new' => 'Add Candidates',
			),
			'public' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'query_var' => true,
			'has_archive' => false,
			'supports' => array('title'),
			'show_in_nav_menus' => true,
			'can_export' => true,
			'hierarchical' => false,
			'exclude_from_search' => true,
			'rewrite' => array('slug' => 'candidates','with_front' => false),
		)
	);

	
	register_post_type( 'contact',
		array(
			'labels' => array(
				'name' => 'Contact',
				'singular_name' => 'Contact',
				'add_new' => 'Add Contact',
			),
			'public' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'query_var' => true,
			'has_archive' => false,
			'supports' => array('title'),
			'show_in_nav_menus' => true,
			'can_export' => true,
			'hierarchical' => false,
			'exclude_from_search' => true,
			'rewrite' => array('slug' => 'contact','with_front' => false),
		)
	);


}

function add_custom_controller($controllers) {
    $controllers[] = 'sitedata';
    return $controllers;
}
add_filter('json_api_controllers', 'add_custom_controller');


function set_custom_controller_path() {
  return get_template_directory()."/lib/custom-apis/site_data.php";
}

add_filter('json_api_sitedata_controller_path', 'set_custom_controller_path');



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Page Settings',
		'menu_title'	=> 'Page Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}
