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
		wp_register_script( 'newsbox',  'https://www.jquery-az.com/boots/js/newsbox/jquery.bootstrap.newsbox.min.js',array('jquery'));
	
		wp_enqueue_script( 'slim' );
		wp_enqueue_script('bootstrap.min');
		wp_enqueue_script( 'poper' );
		wp_enqueue_script( 'newsbox' );
		
		// wp_register_script('angularjs', get_template_directory_uri() . '/assets/angular/angular.js');
		// wp_enqueue_script('angularjs');
		
		/* wp_register_script('jcf', get_template_directory_uri() . '/assets/jcf/js/jcf.min.js',array('jquery'));
		wp_enqueue_script('jcf');
		
		wp_register_script('jcf.radio', get_template_directory_uri() . '/assets/jcf/js/jcf.radio.js',array('jcf'));
		wp_enqueue_script('jcf.radio');
		
		wp_register_script('jcf.checkbox', get_template_directory_uri() . '/assets/jcf/js/jcf.checkbox.js',array('jcf'));
		wp_enqueue_script('jcf.checkbox'); */
		
	}

	function wpt_register_css() {
		wp_register_style( 'bootstrap.min', get_stylesheet_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
		wp_register_style( 'fontawesome.min', 'http://fontawesome.io/assets/font-awesome/css/font-awesome.css' );
		wp_enqueue_style( 'bootstrap.min' );
		wp_enqueue_style( 'fontawesome.min' );
		
		//wp_register_style( 'app', get_template_directory_uri() . '/assets/web/css/app.css',array('style'));
		//wp_register_style( 'woocommerce', get_template_directory_uri() . '/assets/web/css/woocommerce/woocommerce.css',array('style'));
		//wp_register_style( 'page', get_template_directory_uri() . '/assets/web/css/page.css',array('style'));
		wp_register_style( 'jcf', get_stylesheet_directory_uri() . '/assets/jcf/css/theme-minimal/jcf.css',array('style'));
		//wp_enqueue_style( 'woocommerce' );
		//wp_enqueue_style( 'app' );
		//wp_enqueue_style( 'page' );
		wp_enqueue_style( 'jcf' );
		
		$parent_style = 'storefront-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'child-style',
			get_stylesheet_directory_uri() . '/assets/web/css/app.css',
			array( $parent_style ),
			wp_get_theme()->get('Version')
		);
		
		
	}

	add_action( 'wp_enqueue_scripts', 'wpt_register_css' );
	add_action( 'init', 'wpt_register_js' );

	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	add_theme_support( 'post-thumbnails' );
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

// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumb';
    $home_title         = 'Homepage';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="breadcrumb-item i item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
  
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
 
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="breadcrumb-item item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="breadcrumb-item item-cat">'.$parents.'</li>';
                    
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="breadcrumb-item  item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="breadcrumb-item item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
               
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="breadcrumb-item item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="breadcrumb-item item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="breadcrumb-item item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="breadcrumb-item item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            //echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="breadcrumb-item item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            //echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="breadcrumb-item item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="breadcrumb-item item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            //echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="breadcrumb-item item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="breadcrumb-item item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="breadcrumb-item item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}

function storefront_page() {
	front_loop_before();
}

function front_loop_before(){
	custom_breadcrumbs();
}

function front_loop_after(){
	print "";
}

function homepage_content(){
	get_template_part( 'content', 'home' );
}

// remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);
// add_action('woocommerce_single_product_summary','woocommerce_output_product_data_tabs',60);


add_action('storefront_page','storefront_page');
add_action('woocommerce_before_main_content','front_loop_before');
add_action('home','homepage_content');