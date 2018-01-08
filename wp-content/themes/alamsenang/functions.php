<?php 
require_once('libs/wp_bootstrap_navwalker.php');
add_action( 'after_setup_theme', 'wpt_setup' );
if ( ! function_exists( 'wpt_setup' ) ):
	function wpt_setup() {	
		register_nav_menu( 'primary', __( 'Primary navigation', 'wp_sinov' ) );
	} 
	
	function wpt_register_js() {
		wp_register_script('bootstrap.min', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js',array('slim'));
		
		
		wp_register_script( 'slim', get_template_directory_uri() . '/assets/jquery/jquery-3.2.1.slim.min.js' );
		wp_register_script( 'poper',  get_template_directory_uri() . '/assets/jquery/popper.min.js' );
	
		wp_enqueue_script( 'slim' );
		wp_enqueue_script('bootstrap.min');
		wp_enqueue_script( 'poper' );
		
		wp_register_script('angularjs', get_template_directory_uri() . '/assets/angular/angular.js');
		wp_enqueue_script('angularjs');
	}

	function wpt_register_css() {
		wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
		wp_enqueue_style( 'bootstrap.min' );
	}

	add_action( 'wp_enqueue_scripts', 'wpt_register_css' );
	add_action( 'init', 'wpt_register_js' );

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	add_theme_support( 'post-thumbnails' );

	//wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);
	define('WOOCOMMERCE_USE_CSS', false);
endif;

add_theme_support( 'woocommerce' );

function theme_prefix_setup() {
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
	) );
	
	add_image_size('slidewide',false,420,true);
	add_image_size('small',320,390,false);
	

}

add_action( 'after_setup_theme', 'theme_prefix_setup' );

if(function_exists('register_sidebar')){
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'widget-sidebar',
		'description' => 'Appears as the sidebar on the custom homepage',
		'before_widget' => '<div class="sidebar">',
		'after_widget' => '</div>',
	));
	
	register_sidebar(array(
		'name' => 'Page Sidebar',
		'id' => 'page-sidebar',
		'description' => 'Appears as the sidebar on the page',
		'before_widget' => '<div id="sidebar" class="sidebar">',
		'after_widget' => '</div>',
	));
}