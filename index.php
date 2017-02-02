<?php
/**
* Plugin Name: Symmetri Workspace
* Description: A plugin made for displaying your works. Developed for the Wordpress Theme 'Symmetri'.
* Version: 1.0
* Author: Katarina Ljungdahl
* Author URI: https://github.com/LJNGDAHL/
* Plugin URI: https://github.com/LJNGDAHL/
* */

// Security is important
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'init', 'symmetri_setup_plugin' );

function symmetri_setup_plugin() {

	$labels = array(
		'name' 					=> 'Work',
		'singular_name'			=> 'Work Item',
		'add_new'				=> 'Add New',
		'add_new_item'			=> 'Add New Work Item',
		'edit_item'				=> 'Edit',
		'new_item'				=> 'Add New Item',
		'all_items'				=> 'All Work Items',
		'view_items'			=> 'Show Work Items',
		'search_items'			=> 'Search Work Item',
		'not_found'				=> 'Did not find any Work Items',
		'not_found_in_trash'	=> 'Did not find in trash can',
		'menu_name'				=> 'Workspace'
	);

	$args = array(
		'labels'				=> $labels,
		'description'			=> 'Work',
		'public'				=> true,
		'menu_position'			=> 2,
		'menu_icon'				=> 'dashicons-camera',
		'supports'				=> array(
										'title',
										'thumbnail', // Called Feature Image
										'editor',
										'page-attributes'

									),
		'has_archive'			=> false,
		'rewrite'				=> array(
										'slug' 		=> 'workspace',
										'with_front'=> true
									)
	);

	// CPT registration
	register_post_type( 'symmetri_cpt_gallery', $args );

	// Create labels for the new taxonomi
	$labels = array(
		'name'				=> 'Project Type',
		'singular_name'		=> 'Project Type',
		'search_items'		=> 'Search Project Type',
		'all_items'			=> 'All Project Types',
		'parent_item'		=> 'Main Type',
		'parent_item_colon'	=> 'Main Type:',
		'edit_item'			=> 'Edit Project Type',
		'update_item'		=> 'Uppdate Project Type',
		'add_new_item'		=> 'Add Project Type',
		'new_item_name'		=> 'New Project Type',
		'menu_name'			=> 'Project Types'
	);

	// Taxonomi settings
	$args = array(
		'labels' 		=> $labels,
		'hierarchical' 	=> true
	);

	// Taxonomi registration
	register_taxonomy( 'symmetri_projecttype', 'symmetri_cpt_gallery', $args );
}
?>
