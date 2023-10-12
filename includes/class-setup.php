<?php
/**
 * Plugin setup functions and definitions.
 *
 * @package Oact
 */

namespace Oact\Includes;

class Setup {

  function __construct() {

    add_filter( 'theme_page_templates', [ $this, 'page_templates' ] );
    add_filter( 'page_template', [ $this, 'page_template_locations' ] );
    add_action( 'wp_head', [ $this, 'favicon' ] );

    register_activation_hook( oact_file(), [ $this, 'activation' ] );
    register_deactivation_hook( oact_file(), [$this, 'deactivation' ] );
    register_uninstall_hook( oact_file(), [ self::class, 'uninstall' ] );
    add_action( 'plugins_loaded', [ $this, 'load_textdomain' ] );

    // Replace the 'register_uninstall_hook' with following if Freemius SDK is used.
    // oact_fs()->add_action('after_uninstall', [$this, 'uninstall']);

  }

  /**
   * # Add favicon
   */
  public function favicon() {

    ?>
      <link rel="shortcut icon" href="<?php echo oact_directory_uri(); ?>/assets/img/favicon.png" />
    <?php

  }

  /**
   * # Add custom page templates
   *
   * @link https://wordpress.stackexchange.com/a/350995/201597
   */
  public function page_templates( $templates ) {

    $templates['page-templates/oact-alarm.php'] = esc_html__( 'Alarm Clock (Oact)', 'oact' );
    $templates['page-templates/oact-timer.php'] = esc_html__( 'Timer (Oact)', 'oact' );
    $templates['page-templates/oact-stopwatch.php'] = esc_html__( 'Stopwatch (Oact)', 'oact' );
    $templates['page-templates/oact-time.php'] = esc_html__( 'Time (Oact)', 'oact' );
    $templates['page-templates/oact-pomodoro.php'] = esc_html__( 'Pomodoro (Oact)', 'oact' );
    $templates['page-templates/oact-contact.php'] = esc_html__( 'Contact (Oact)', 'oact' );
    $templates['page-templates/oact-terms.php'] = esc_html__( 'Terms of Use (Oact)', 'oact' );
    $templates['page-templates/oact-privacy.php'] = esc_html__( 'Privacy (Oact)', 'oact' );

    return $templates;

  }

  /**
   * # Custom page templates locations
   *
   * @link https://wordpress.stackexchange.com/a/350995/201597
   */
  public function page_template_locations( $page_template ) {

    if ( get_page_template_slug() == 'page-templates/oact-alarm.php' ) {
      $page_template = oact_directory() . '/page-templates/oact-alarm.php';
    }

    if ( get_page_template_slug() == 'page-templates/oact-timer.php' ) {
      $page_template = oact_directory() . '/page-templates/oact-timer.php';
    }

    if ( get_page_template_slug() == 'page-templates/oact-stopwatch.php' ) {
      $page_template = oact_directory() . '/page-templates/oact-stopwatch.php';
    }

    if ( get_page_template_slug() == 'page-templates/oact-time.php' ) {
      $page_template = oact_directory() . '/page-templates/oact-time.php';
    }

    if ( get_page_template_slug() == 'page-templates/oact-pomodoro.php' ) {
      $page_template = oact_directory() . '/page-templates/oact-pomodoro.php';
    }

    if ( get_page_template_slug() == 'page-templates/oact-contact.php' ) {
      $page_template = oact_directory() . '/page-templates/oact-contact.php';
    }

    if ( get_page_template_slug() == 'page-templates/oact-terms.php' ) {
      $page_template = oact_directory() . '/page-templates/oact-terms.php';
    }

    if ( get_page_template_slug() == 'page-templates/oact-privacy.php' ) {
      $page_template = oact_directory() . '/page-templates/oact-privacy.php';
    }

    return $page_template;

  }


  /**
   * # Plugin Activation
   */
  public function activation() {
  }

  /**
   * # Plugin Deactivation
   */
  public function deactivation() {
  }

  /**
   * # Plugin Uninstall
   */
  public static function uninstall() {

    global $wpdb;

    // $wpdb->query("DELETE FROM {$wpdb->posts} WHERE post_type IN ('opos-sales', 'opos-frames', 'opos-glasses', 'opos-w-customers')");
    // $wpdb->query("DELETE FROM {$wpdb->postmeta} WHERE post_id NOT IN (SELECT id FROM {$wpdb->posts})");

    // $wpdb->query("DELETE FROM {$wpdb->term_taxonomy} WHERE taxonomy = 'opos-glasses-cat'");

    // $wpdb->query("DELETE FROM {$wpdb->usermeta} WHERE meta_key IN ('opos_company', 'opos_contactno', 'opos_address', 'opos_city', 'opos_postalcode')");

    // $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name = 'opos_options'");

  }

  /**
   * # Translate Plugin
   */
  public function load_textdomain() {
    load_plugin_textdomain( 'oact', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
  }

}
new Setup();
