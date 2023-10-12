<?php
/**
 * Class for adding custom taxonomies.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 *
 * @package Oact
 */

namespace Oact\Includes;

class Custom_Taxonomies {

  function __construct() {

    add_action( 'init', array($this, 'register'), 0 );

  }

  protected function sample_categories() {

    $labels = array(
      'name'              => esc_html__('Categories', 'oact'),
      'singular_name'     => esc_html__('Category', 'oact'),
      'search_items'      => esc_html__('Search Categories', 'oact'),
      'all_items'         => esc_html__('All Categories', 'oact'),
      'parent_item'       => esc_html__('Parent Category', 'oact'),
      'parent_item_colon' => esc_html__('Parent Category:', 'oact'),
      'edit_item'         => esc_html__('Edit Category', 'oact'),
      'update_item'       => esc_html__('Update Category', 'oact'),
      'add_new_item'      => esc_html__('Add New Category', 'oact'),
      'new_item_name'     => esc_html__('New Category Name', 'oact'),
      'menu_name'         => esc_html__('Categories', 'oact'),
    );

    $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'oact-cat' ),
    );

    return $args;

  }

  protected function sample_tags() {

    $labels = array(
      'name'              => esc_html__('Tags', 'oact'),
      'singular_name'     => esc_html__('Tag', 'oact'),
      'search_items'      => esc_html__('Search Tags', 'oact'),
      'all_items'         => esc_html__('All Tags', 'oact'),
      'parent_item'       => esc_html__('Parent Tag', 'oact'),
      'parent_item_colon' => esc_html__('Parent Tag:', 'oact'),
      'edit_item'         => esc_html__('Edit Tag', 'oact'),
      'update_item'       => esc_html__('Update Tag', 'oact'),
      'add_new_item'      => esc_html__('Add New Tag', 'oact'),
      'new_item_name'     => esc_html__('New Tag Name', 'oact'),
      'menu_name'         => esc_html__('Tags', 'oact'),
    );

    $args = array(
      'hierarchical'      => false,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'oact-tag' ),
    );

    return $args;

  }

  public function register() {

    register_taxonomy( 'oact-cat', array('oact-cpt'), $this->sample_categories() );
    register_taxonomy( 'oact-tag', array('oact-cpt'), $this->sample_tags() );

  }

}
new Custom_Taxonomies();
