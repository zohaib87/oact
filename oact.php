<?php
/**
 * Plugin Name: Oact
 * Description: Online alarm clock timer. Set the hour and minute for the online alarm clock. The alarm message will appear, and the preselected sound will be played at the set time.
 * Version:     0.0.1
 * Author:      Muhammad Zohaib
 * Author URI:  https://www.xecreators.pk
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: oact
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require 'helpers/functions.php';

/**
 * Plugin setup functions and definitions.
 */
require oact_directory() . '/includes/class-setup.php';

/**
 * Object for containing default values.
 */
require oact_directory() . '/helpers/class-defaults.php';

/**
 * Class that holds helper methods.
 */
require oact_directory() . '/helpers/class-helpers.php';

/**
 * Class for reusable sections.
 */
require oact_directory() . '/helpers/class-views.php';

/**
 * Class to get and use plugin options.
 */
require oact_directory() . '/helpers/class-plugin-options.php';

/**
 * Enqueue scripts and styles for admin and front end.
 */
require oact_directory() . '/includes/class-scripts.php';

/**
 * MetaBoxes
 */
require oact_directory() . '/includes/metaboxes/class-sample.php';

/**
 * Menu or sub-menu Pages
 */
require oact_directory() . '/includes/class-menu-pages.php';
require oact_directory() . '/includes/callbacks/class-plugin-options.php';

/**
 * Class for adding custom post types.
 */
require oact_directory() . '/includes/class-custom-post-types.php';

/**
 * Class for adding custom taxonomies.
 */
require oact_directory() . '/includes/class-custom-taxonomies.php';

/**
 * Shortcodes
 */
require oact_directory() . '/includes/shortcodes/class-oact-main.php';
