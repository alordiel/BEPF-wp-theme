<?php
//Creating a post type for lessons
add_action( 'init', 'pp_phrase_lessons_cpt' );
function pp_phrase_lessons_cpt() {
  $labels = array(
    'name'               => _x( 'Resources', 'post type general name', 'bepf' ),
    'singular_name'      => _x( 'Resource', 'post type singular name', 'bepf' ),
    'menu_name'          => _x( 'Resources', 'admin menu', 'bepf' ),
    'name_admin_bar'     => _x( 'Resource', 'add new on admin bar', 'bepf' ),
    'add_new'            => _x( 'Add New', 'Resource', 'bepf' ),
    'add_new_item'       => __( 'Add New', 'bepf' ),
    'new_item'           => __( 'New resource', 'bepf' ),
    'edit_item'          => __( 'Edit resource', 'bepf' ),
    'view_item'          => __( 'View resource', 'bepf' ),
    'all_items'          => __( 'All resources', 'bepf' ),
    'search_items'       => __( 'Search resources', 'bepf' ),
    'parent_item_colon'  => __( 'Parent resources:', 'bepf' ),
    'not_found'          => __( 'No resource found.', 'bepf' ),
    'not_found_in_trash' => __( 'No resource found in Trash.', 'bepf' )
  );

  $args = array(
    'labels'              => $labels,
    'description'         => __( 'Description.', 'bepf' ),
    'public'              => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_nav_menus'   => true,
    'show_in_menu'        => true,
    'query_var'           => true,
    'rewrite'             => array( 'slug' => 'resources' ),
    'capability_type'     => 'post',
    'exclude_from_search' => true,
    'has_archive'         => true,
    'hierarchical'        => false,
    'menu_position'       => null,
    'menu_icon'           => 'dashicons-media-interactive',
    'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );
  register_post_type( 'resources', $args );
}

add_action( 'init', 'bepf_resources_taxonomy' );
function bepf_resources_taxonomy() {
  register_taxonomy(
    'resource-type',
    'resources',
    array(
      'hierarchical'      => true,
      'public'            => true,
      'label'             => __('Resource type','bepf'),
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'resource-type', 'hierarchical' => true ),
      'show_ui'           => true,
      'show_admin_column' => true
    )
  );

  register_taxonomy(
    'resource-topic',
    'resources',
    array(
      'hierarchical'      => true,
      'public'            => true,
      'query_var'         => true,
      'label'             => __('Resource topic', 'bepf'),
      'rewrite'           => array( 'slug' => 'resource-topic', 'hierarchical' => true ),
      'show_ui'           => true,
      'show_admin_column' => true
    )
  );
}
