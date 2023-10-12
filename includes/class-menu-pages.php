<?php
/**
 * Register custom menu and sub-menu pages.
 *
 * @link https://developer.wordpress.org/reference/functions/add_menu_page/
 * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
 *
 * @package Oact
 */

namespace Oact\Includes;

use Oact\Includes\Callbacks\Plugin_Options;

class Menu_Pages {

  function __construct() {

    // add_action( 'admin_menu', [ $this, 'add_menu_pages' ] );

  }

  /**
   * # Add menu and sub-menu pages
   */
  public function add_menu_pages() {

    $plugin_options = new Plugin_Options();

    /* Menu Pages */
    add_menu_page(
      esc_html__( 'Oact', 'oact' ),
      esc_html__( 'Oact', 'oact' ),
      'manage_options',
      'oact-options',
      [$plugin_options, 'html'],
      'dashicons-welcome-widgets-menus'
    );

    /* Submenu Pages */
    add_submenu_page(
      'oact-options',
      esc_html__( 'Plugin Options', 'oact' ),
      esc_html__( 'Plugin Options', 'oact' ),
      'manage_options',
      'oact-options',
      [ $plugin_options, 'html' ],
      1
    );

    add_submenu_page(
      'oact-options',
      esc_html__('Sample Post Type', 'oact'),
      esc_html__('Sample Post Type', 'oact'),
      'manage_options',
      'edit.php?post_type=oact-cpt'
    );

    add_submenu_page(
      'oact-options',
      esc_html__('Sample Categories', 'oact'),
      esc_html__('Sample Categories', 'oact'),
      'manage_options',
      'edit-tags.php?taxonomy=oact-cat&post_type=oact-cpt'
    );

    add_submenu_page(
      'oact-options',
      esc_html__('Sample Tags', 'oact'),
      esc_html__('Sample Tags', 'oact'),
      'manage_options',
      'edit-tags.php?taxonomy=oact-tag&post_type=oact-cpt'
    );

  }

}
new Menu_Pages();
