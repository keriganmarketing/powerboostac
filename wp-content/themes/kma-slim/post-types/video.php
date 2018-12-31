<?php

/**
 * Registers the `video` post type.
 */
function video_init() {
	register_post_type( 'video', array(
		'labels'                => array(
			'name'                  => __( 'Videos', 'complete' ),
			'singular_name'         => __( 'Video', 'complete' ),
			'all_items'             => __( 'All Videos', 'complete' ),
			'archives'              => __( 'Video Archives', 'complete' ),
			'attributes'            => __( 'Video Attributes', 'complete' ),
			'insert_into_item'      => __( 'Insert into Video', 'complete' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Video', 'complete' ),
			'featured_image'        => _x( 'Featured Image', 'video', 'complete' ),
			'set_featured_image'    => _x( 'Set featured image', 'video', 'complete' ),
			'remove_featured_image' => _x( 'Remove featured image', 'video', 'complete' ),
			'use_featured_image'    => _x( 'Use as featured image', 'video', 'complete' ),
			'filter_items_list'     => __( 'Filter Videos list', 'complete' ),
			'items_list_navigation' => __( 'Videos list navigation', 'complete' ),
			'items_list'            => __( 'Videos list', 'complete' ),
			'new_item'              => __( 'New Video', 'complete' ),
			'add_new'               => __( 'Add New', 'complete' ),
			'add_new_item'          => __( 'Add New Video', 'complete' ),
			'edit_item'             => __( 'Edit Video', 'complete' ),
			'view_item'             => __( 'View Video', 'complete' ),
			'view_items'            => __( 'View Videos', 'complete' ),
			'search_items'          => __( 'Search Videos', 'complete' ),
			'not_found'             => __( 'No Videos found', 'complete' ),
			'not_found_in_trash'    => __( 'No Videos found in trash', 'complete' ),
			'parent_item_colon'     => __( 'Parent Video:', 'complete' ),
			'menu_name'             => __( 'Videos', 'complete' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'page-attributes' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'video',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'video_init' );

/**
 * Sets the post updated messages for the `video` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `video` post type.
 */
function video_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['video'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Video updated. <a target="_blank" href="%s">View Video</a>', 'complete' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'complete' ),
		3  => __( 'Custom field deleted.', 'complete' ),
		4  => __( 'Video updated.', 'complete' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Video restored to revision from %s', 'complete' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Video published. <a href="%s">View Video</a>', 'complete' ), esc_url( $permalink ) ),
		7  => __( 'Video saved.', 'complete' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Video submitted. <a target="_blank" href="%s">Preview Video</a>', 'complete' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Video scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Video</a>', 'complete' ),
		date_i18n( __( 'M j, Y @ G:i', 'complete' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Video draft updated. <a target="_blank" href="%s">Preview Video</a>', 'complete' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'video_updated_messages' );

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5c1813e48af3b',
		'title' => 'Video Info',
		'fields' => array(
			array(
				'key' => 'field_5c1813f848e44',
				'label' => 'YouTube ID',
				'name' => 'youtube_id',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'https://www.youtube.com/watch?v=',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'video',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));
	
	endif;