<?php
/**
 * Class for adding custom post types.
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Oact
 */

namespace Oact\Includes;

class Custom_Post_Types {

  function __construct() {

    add_action( 'init', array($this, 'register') );
    register_activation_hook( __FILE__, array($this, 'rewrite_flush') );

  }

  protected function sample() {

    $labels = array(
      'name'               => esc_html__('Samples', 'oact'),
      'singular_name'      => esc_html__('Sample', 'oact'),
      'menu_name'          => esc_html__('Samples', 'oact'),
      'name_admin_bar'     => esc_html__('Sample', 'oact'),
      'add_new'            => esc_html__('Add New', 'oact'),
      'add_new_item'       => esc_html__('Add New Sample', 'oact'),
      'new_item'           => esc_html__('New Sample', 'oact'),
      'edit_item'          => esc_html__('Edit Sample', 'oact'),
      'view_item'          => esc_html__('View Sample', 'oact'),
      'all_items'          => esc_html__('All Samples', 'oact'),
      'search_items'       => esc_html__('Search Samples', 'oact'),
      'parent_item_colon'  => esc_html__('Parent Samples:', 'oact'),
      'not_found'          => esc_html__('No Samples found.', 'oact'),
      'not_found_in_trash' => esc_html__('No Samples found in Trash.', 'oact'),
    );

    $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => false,
      'menu_icon'          => 'dashicons-portfolio',
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'oact-cpt' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'supports'           => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
    );
    return register_post_type( 'oact-cpt', $args );

  }

  public function register() {

    $this->sample();

  }

  public function rewrite_flush() {

    $this->register();
    flush_rewrite_rules();

  }

}
new Custom_Post_Types();
