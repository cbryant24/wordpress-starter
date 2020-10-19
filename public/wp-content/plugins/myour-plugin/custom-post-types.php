<?php

/**
 * Register Custom Post Type: Portfolio
 */

function myour_register_portfolio() {
	register_post_type( 'portfolio', array(
			'label' => esc_html__( 'Portfolio', 'myour-plugin' ),
	        'description' => esc_html__( 'Portfolio', 'myour-plugin' ),
	        'supports' => array( 'title','editor','revisions','thumbnail','page-attributes' ),
	        'taxonomies' => array( 'portfolio_categories' ),
	        'hierarchical' => false,
	        'show_in_rest' => true,
	        'public' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'show_in_nav_menus' => true,
	        'show_in_admin_bar' => true,
	        'menu_position' => 20,
	        'menu_icon' => 'dashicons-images-alt2',
	        'can_export' => true,
	        'has_archive' => false,
	        'exclude_from_search' => true,
	        'publicly_queryable' => true,
	        'capability_type' => 'post',
	        'rewrite' => array( 'slug' => 'portfolio', 'with_front' => true  ),
			'labels' => array(
				'name' => esc_html__( 'Portfolio', 'myour-plugin' ),
		        'singular_name' => esc_html__( 'Portfolio', 'myour-plugin' ),
		        'menu_name' => esc_html__( 'Portfolio', 'myour-plugin' ),
		        'parent_item_colon' => esc_html__( 'Parent Portfolio:', 'myour-plugin' ),
		        'all_items' => esc_html__( 'All Portfolio', 'myour-plugin' ),
		        'view_item' => esc_html__( 'View Portfolio', 'myour-plugin' ),
		        'add_new_item' => esc_html__( 'Add New Portfolio', 'myour-plugin' ),
		        'add_new' => esc_html__( 'New Portfolio', 'myour-plugin' ),
		        'edit_item' => esc_html__( 'Edit Portfolio', 'myour-plugin' ),
		        'update_item' => esc_html__( 'Update Portfolio', 'myour-plugin' ),
		        'search_items' => esc_html__( 'Search Portfolio', 'myour-plugin' ),
		        'not_found' => esc_html__( 'No portfolio found', 'myour-plugin' ),
		        'not_found_in_trash' => esc_html__( 'No portfolio found in Trash', 'myour-plugin' ),
			),
		)
	);
}
add_action( 'init', 'myour_register_portfolio' );

function myour_register_portfolio_categories() {
	register_taxonomy( 'portfolio_categories', array ( 0 => 'portfolio' ),
		array(
			'label' => esc_html__( 'Portfolio Categories', 'myour-plugin' ),
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'portfolio-categories' ),
			'labels' => array(
				'name'              => esc_html__( 'Portfolio Categories', 'myour-plugin' ),
		        'singular_name'     => esc_html__( 'Portfolio Categories', 'myour-plugin' ),
		        'search_items'      => esc_html__( 'Search Portfolio Category', 'myour-plugin' ),
		        'all_items'         => esc_html__( 'All Portfolio Category', 'myour-plugin' ),
		        'parent_item'       => esc_html__( 'Parent Portfolio Category', 'myour-plugin' ),
		        'parent_item_colon' => esc_html__( 'Parent Portfolio Category:', 'myour-plugin' ),
		        'edit_item'         => esc_html__( 'Edit Portfolio Category', 'myour-plugin' ),
		        'update_item'       => esc_html__( 'Update Portfolio Category', 'myour-plugin' ),
		        'add_new_item'      => esc_html__( 'Add New Portfolio Category', 'myour-plugin' ),
		        'new_item_name'     => esc_html__( 'New Portfolio Category Name', 'myour-plugin' ),
		        'menu_name'         => esc_html__( 'Portfolio Category', 'myour-plugin' ),
			)
		)
	);
}
add_action( 'init', 'myour_register_portfolio_categories' );