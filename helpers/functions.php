<?php
/**
 * Functions that helps to ease plugin development.
 *
 * @package Oact
 */

function oact_directory() {
	return ABSPATH . 'wp-content/plugins/oact';
}

function oact_directory_uri() {
	return plugins_url() . '/oact';
}

function oact_file() {
	return oact_directory() . '/oact.php';
}

function oact_data() {
	return get_plugin_data( oact_file() );
}
