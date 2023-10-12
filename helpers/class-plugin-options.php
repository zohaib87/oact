<?php
/**
 * Plugin functions and definitions.
 *
 * @package Oact
 */

namespace Oact\Helpers;

use Oact\Helpers\Helpers;
use Oact\Helpers\Defaults;

class Plugin_Options {

  // Others
  public $debug, $localhost;

  function __construct() {

    // Assign Option values to variables
    add_action( 'init', [ $this, 'init_vars' ] );

  }

  /**
   * # Initialize variables for use.
   */
	public function init_vars() {

    // Others
    $this->debug = $this->debug();
    $this->localhost = $this->localhost();

  }

  /**
   * # Check if debug mode and log is enabled
   */
  protected function debug() {

    if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {

      if ( defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG ) {

        return true;

      }

    }

    return false;

  }

  /**
   * # Check if its localhost
   */
  protected function localhost() {

    $localhost = array(
      '127.0.0.1',
      '::1'
    );

    if ( in_array( $_SERVER['REMOTE_ADDR'], $localhost ) ) {

      return true;

    } else {

      return false;

    }

  }

}
global $oact_opt;
$oact_opt = new Plugin_Options();
