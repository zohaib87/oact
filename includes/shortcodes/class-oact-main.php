<?php
/**
 * Sample shortcode
 *
 * @link https://developer.wordpress.org/reference/functions/add_shortcode/
 *
 * @package Oact
 */

namespace Oact\Includes\Shortcodes;

class Oact_Main {

  function __construct() {

    add_shortcode( 'oact_main', [ $this, 'oact_main' ] );

  }

  public function oact_main( $atts, $content = null ) {

    return 'Shortcode must always return the output and should never echo it.';

  }

}
new Oact_Main();
