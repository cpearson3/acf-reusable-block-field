<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('CP3_acf_field_acf_reusable_block_field') ) :


class CP3_acf_field_acf_reusable_block_field extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/	
		$this->name = 'acf_reusable_block_field';
			
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		$this->label = __('Reusable Block Field', 'acf_reusable_block_field');
	
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		$this->category = 'relational';
		
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		$this->defaults = array(
			'default_id'	=> '',
		);
			
		// do not delete!
    	parent::__construct();
	}
	
	/*
	*  render_field_settings()
	*/
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*
		*  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
		*  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
		*
		*  More than one setting can be added by copy/paste the above code.
		*  Please note that you must also have a matching $defaults value for the field name (font_size)
		*/
		
		// default_value
		acf_render_field_setting(
			$field,
			array(
				'label'        => __( 'Default Value', 'acf' ),
				'instructions' => __( 'Assign a default block ID is none is given', 'acf' ),
				'type'         => 'text',
				'name'         => 'default_value',
			)
		);

	}

	/*
	*  render_field()
	*/
	function render_field( $field ) {
		/*
		*  Review the data of $field.
		*  This will show what data is available
		*/

		/* Query Reusable Blocks */
		$blockArgs = array(
			'post_type' => 'wp_block',
			'posts_per_page' => -1,
			'orderby' => 'title'
		);

		$blockQuery = get_posts($blockArgs);
		
		/*
		*  Create select input
		*/
		?>
		<select name="<?php echo esc_attr($field['name']) ?>" id="<?php echo esc_attr($field['id']) ?>">
		<?php
		foreach ($blockQuery as $block):
			$selected = ( ( $field['value'] == $block->ID ) || ( empty( $field['value'] ) && $block->ID == $field['default_value'] ) ) ? 'selected="selected"' : '';
		?>
			<option <?php echo $selected ?> value="<?php echo $block->ID; ?>"><?php echo $block->post_title; ?></option>
		<?php
		endforeach;
		?>
		</select>		
		<?php
	}
	
}


// initialize
new CP3_acf_field_acf_reusable_block_field();


// class_exists check
endif;

?>