<?php
/**
 * Enqueue scripts and styles for admin panel and front end.
 *
 * @package Oact
 */

namespace Oact\Includes;

use Oact\Helpers\Helpers;

class Scripts {

  function __construct() {

    add_action( 'wp_head', [ $this, 'ie_scripts' ] );
    add_action( 'wp_enqueue_scripts', [ $this, 'frontend'] );
    add_action( 'admin_enqueue_scripts', [ $this, 'admin' ], 9999 );

  }

  /**
   * # IE compatibility scripts
   */
  public function ie_scripts() {

    $current_template = get_page_template_slug();

    if ( strpos( $current_template, 'oact-' ) === false ) {
      return;
    }

    ?>
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    <?php

  }

  /**
   * # Enqueue scripts and styles for front-end.
   */
  public function frontend() {

    $current_template = get_page_template_slug();

    if ( strpos( $current_template, 'oact-' ) === false ) {
      return;
    }

    global $oact_opt;

    $current_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
    $alarm = 'page-templates/oact-alarm.php';
    $timer = 'page-templates/oact-timer.php';
    $stopwatch = 'page-templates/oact-stopwatch.php';
    $time = 'page-templates/oact-time.php';
    $pomodoro = 'page-templates/oact-pomodoro.php';

    /**
     * Styles
     */
    Helpers::enqueue( 'style', 'oact-main', '/assets/css/main.css' );

    if ( $current_template == $pomodoro ) {
      Helpers::enqueue( 'style', 'fontawesome', '/assets/css/all.css' );
      Helpers::enqueue( 'style', 'circletimer', '/assets/css/circletimer.css' );
      Helpers::enqueue( 'style', 'pomodoro', '/assets/css/pomodoro.css' );
    }

    /**
     * Scripts
     */
    Helpers::enqueue( 'script', 'oact-lang', '/assets/js/lang/en.js' );
    Helpers::enqueue( 'script', 'oact-main', '/assets/js/main.js', ['jquery'] );

    if ( $current_template == $alarm ) {
      Helpers::enqueue( 'script', 'oact-alarm', '/assets/js/alarm.js', ['jquery', 'oact-main'] );
    }

    if ( $current_template == $timer ) {
      Helpers::enqueue( 'script', 'oact-timer', '/assets/js/timer.js', ['jquery'] );
    }

    if ( $current_template == $stopwatch ) {
      Helpers::enqueue( 'script', 'oact-stopwatch', '/assets/js/stopwatch.js', ['jquery'] );
    }

    if ( $current_template == $time ) {
      Helpers::enqueue( 'script', 'moment-timezones', '/assets/js/moment-timezone-with-data-10-year-range.js', ['moment'] );
      Helpers::enqueue( 'script', 'oact-time', '/assets/js/time.js', ['jquery'] );
    }

    if ( $current_template == $pomodoro ) {
      Helpers::enqueue( 'script', 'circletimer', '/assets/js/circletimer.min.js', ['jquery'] );
      Helpers::enqueue( 'script', 'oact-pomodoro', '/assets/js/pomodoro.js', ['jquery'] );
    }

    wp_localize_script( 'oact-main', 'oactObj', [
      'ajaxUrl' => admin_url('admin-ajax.php'),
      'pluginUrl' => oact_directory_uri(),
      'nonce' => wp_create_nonce('oact_ajax_nonce'),
      'localhost' => $oact_opt->localhost,
      'debug' => $oact_opt->debug
    ] );

  }

  /**
   * # Enqueue scripts and styles for admin panel.
   */
  public function admin() {

    global $current_screen, $oact_opt;

    /**
     * Styles
     */
    Helpers::enqueue( 'style', 'oact-admin', '/assets/css/admin.css' );

    /**
     * Scripts
     */
    Helpers::enqueue( 'script', 'oact-admin', '/assets/js/admin.js', ['jquery'] );

    wp_localize_script( 'oact-admin', 'oactObj', [
      'pluginUrl' => oact_directory_uri(),
      'nonce' => wp_create_nonce('oact_ajax_nonce'),
      'postType' => $current_screen->post_type,
      'base' => $current_screen->base,
      'localhost' => $oact_opt->localhost
    ] );

  }

}
new Scripts();
