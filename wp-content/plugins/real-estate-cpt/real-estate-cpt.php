<?php

/*
Plugin Name:  Real Estate CPT
Version: 1.0
Description: Добавляет CPT Объект недвижимости.
Author: Maryna Kurylko
Author URI: 
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: real-estate-cpt
*/


/** Enqueuing the Stylesheet for the CTA Button */

function enqueue_scripts() {
	global $post;
	if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'district') ) {
	wp_register_style( 'custom-styles',  plugin_dir_url( __FILE__ ) . 'css/style.css' );
		 wp_enqueue_style( 'custom-styles' );
	}
  }
  add_action( 'wp_enqueue_scripts', 'enqueue_scripts');



//CPT
function post_type_objects() {
	$post_type_objects_labels = array(
		'name'               => _x( 'Объекты недвижимости', 'post type general name' ),
		'singular_name'      => _x( 'Объект недвижимости', 'post type singular name' ),
		'add_new'            => _x( 'Добавить новый', 'Объект' ),
		'add_new_item'       => __( 'Добавить новый объект'  ),
		'edit_item'          => __( 'Изменить объект' ),
		'new_item'           => __( 'Новый объект' ),
		'all_items'          => __( 'Все объекты' ),
		'view_item'          => __( 'ПРосмотреть' ),
		'search_items'       => __( 'Искть объект недвижимости' ),
		'not_found'          => __( 'Объект недвижимости не найден' ),
		'not_found_in_trash' => __( 'Объект недвижимости не найден в корзине' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Объекты недвижимости'
	);
	$post_type_objects_args = array(
		'labels'        => $post_type_objects_labels,
		'description'   => 'Display Real Estate Object',
		'public'        => true,
		'menu_icon'		=> 'dashicons-building',
		'menu_position' => 25,
		//'taxonomies'    => array('service-category' ),
		'supports'      => array( 'title', 'thumbnail', 'excerpt', 'editor'),
		'has_archive'   => false,
		'hierarchical'  => false
	);
	register_post_type( 'objects', $post_type_objects_args );
	}
	add_action( 'init', 'post_type_objects' );

/* Custom Taxonomy - Category For Services */

function register_taxonomy_district(){
    $labels = array(
        'name' => _x('Район', 'taxonomy general name'),
        'singular_name' => _x('Район', 'taxonomy singular name'),
        'search_items' => __('Искать районы'),
        'all_items' => __('Все районы'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Редактировать район'),
        'update_item' => __('Обновить район'),
        'add_new_item' => __('Добавить новый район'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Район'),
    );
    $args = array(
        'hierarchical' => true, // make it hierarchical (like categories)
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'public' => true,
        'show_in_menu' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        //'rewrite'           => [ 'slug' => '/' ],
    );
    register_taxonomy('district', ['objects'], $args);
}

add_action('init', 'register_taxonomy_district');


//shortcode to display Service category items

function objects_shortcode( $atts ) {

	extract( shortcode_atts(
	  array(
		 'district' => '',
	  ), $atts )
	);
ob_start();
	
$arg = array(
	'post_type'	    => 'objects', 
	'order'		    => 'ASC',
	'orderby'	    => 'date',
	'posts_per_page'    => -1,
	'tax_query' => array(
		array(
			'taxonomy' => 'district',
			'field'    => 'slug',
			'terms'    =>  $atts ,
		)
		));

$query = new WP_Query( $arg );

if ( $query->have_posts() ) { ?>
<div class="row">
	<?php while ( $query->have_posts() ) {
		$query->the_post(); 
		// $out .= ' ?>
		<div class="col-12 col-md-6 col-lg-12 col-xl-6 d-flex">
			<div class="card aside-objects mb-2">
				<a href="<?php the_permalink();?>"><img src="<?php the_field('image') ;?>" alt="" class="card-img-top"/></a>
				<div class="card-body p-2">
					<p class="card-text"><small><?php the_field('name') ;?></small></p>
				</div>
			</div>
		</div>		
	<?php } ?>
	</div>

<?php } 
wp_reset_query(); 

return ob_get_clean();

}

add_shortcode( 'object', 'objects_shortcode' );


//all onjects shortcode
function all_obj_shortcode( $atts ) {

	extract( shortcode_atts(
	  array(
		
	  ), $atts )
	);
ob_start();
	
$arg = array(
	'post_type'	    => 'objects', 
	'order'		    => 'ASC',
	'orderby'	    => 'date',
	'posts_per_page'    => -1,
);

$query = new WP_Query( $arg );

if ( $query->have_posts() ) { ?>
<div class="row">
	<?php while ( $query->have_posts() ) {
		$query->the_post(); 
		// $out .= ' ?>
		<div class="col-12 col-md-6 col-lg-12 col-xl-6 d-flex">
			<div class="card aside-objects mb-2">
				<a href="<?php the_permalink();?>"><img src="<?php the_field('image') ;?>" alt="" class="card-img-top"/></a>
				<div class="card-body p-2">
					<p class="card-text"><small><?php the_field('name') ;?></small></p>
				</div>
			</div>
		</div>		
	<?php } ?>
	</div>

<?php } 
wp_reset_query(); 

return ob_get_clean();

}

add_shortcode( 'objects', 'all_obj_shortcode' );


