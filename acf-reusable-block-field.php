<?php
/*
Plugin Name: ACF Reusable Block Field
Plugin URI: https://clarencepearson.com/acf-reusable-block-field
Description: Reference reusable block posts with Advanced Custom Fields
Version: 1.0.0
Author: Clarence Pearson
Author URI: clarencepearson.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('CP3_acf_plugin_acf_reusable_block_field') ) :

class CP3_acf_plugin_acf_reusable_block_field {
	
	// vars
	var $settings;
	
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	void
	*  @return	void
	*/
	
	function __construct() {
		
		// settings
		// - these will be passed into the field class.
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ )
		);
		
		
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_field')); // v5
		add_action('acf/register_fields', 		array($this, 'include_field')); // v4
	}
	
	
	/*
	*  include_field
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to false
	*  @return	void
	*/
	
	function include_field( $version = false ) {
		
		// support empty $version
		if( !$version ) $version = 4;
		
		
		// load textdomain
		load_plugin_textdomain( 'TEXTDOMAIN', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
		
		
		// include
		include_once('fields/class-acf-field-reusable-block.php');
	}
	
}


// initialize
new CP3_acf_plugin_acf_reusable_block_field();


// class_exists check
endif;
	
?>