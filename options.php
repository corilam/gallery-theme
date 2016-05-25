<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'theme-textdomain' ),
		'two' => __( 'Two', 'theme-textdomain' ),
		'three' => __( 'Three', 'theme-textdomain' ),
		'four' => __( 'Four', 'theme-textdomain' ),
		'five' => __( 'Five', 'theme-textdomain' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'theme-textdomain' ),
		'two' => __( 'Pancake', 'theme-textdomain' ),
		'three' => __( 'Omelette', 'theme-textdomain' ),
		'four' => __( 'Crepe', 'theme-textdomain' ),
		'five' => __( 'Waffle', 'theme-textdomain' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'Social & Analytics', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Google Analytics', 'theme-textdomain' ),
		'desc' => __( 'Add your tracking number here. Should be formatted UA-XXXXX-Y.', 'theme-textdomain' ),
		'id' => 'google_analytics',
		'std' => 'UA-XXXXX-Y',
		'class' => 'mini',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Social Info', 'theme-textdomain' ),
		'desc' => __( 'Add urls for the social networks you want to display. Leave blank if not in use.' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __( 'Facebook URL', 'theme-textdomain' ),
		'desc' => __( 'Add your Facebook url.', 'theme-textdomain' ),
		'id' => 'facebook_url',
		'std' => 'https://facebook.com',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Twitter URL', 'theme-textdomain' ),
		'desc' => __( 'Add your Twitter url', 'theme-textdomain' ),
		'id' => 'twitter_url',
		'std' => 'https://twitter.com',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Pinterest URL', 'theme-textdomain' ),
		'desc' => __( 'Add your Pinterest url', 'theme-textdomain' ),
		'id' => 'pinterest_url',
		'std' => 'https://pinterest.com',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'GPlus URL', 'theme-textdomain' ),
		'desc' => __( 'Add your Google+ url', 'theme-textdomain' ),
		'id' => 'gplus_url',
		'std' => 'https://plus.google.com',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Instagram URL', 'theme-textdomain' ),
		'desc' => __( 'Add your Instagram url', 'theme-textdomain' ),
		'id' => 'instagram_url',
		'std' => 'http://instagram.com',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'LinkedIn URL', 'theme-textdomain' ),
		'desc' => __( 'Add your Linkedin URL', 'theme-textdomain' ),
		'id' => 'linkedin_url',
		'std' => 'http://linkedin.com',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Flickr URL', 'theme-textdomain' ),
		'desc' => __( 'Add your Flickr URL', 'theme-textdomain' ),
		'id' => 'flickr_url',
		'std' => 'http://flickr.com',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Email URL', 'theme-textdomain' ),
		'desc' => __( 'Add your contact email address', 'theme-textdomain' ),
		'id' => 'email_url',
		'std' => 'email@yourdomain.com',
		'type' => 'text'
	);

	/*$options[] = array(
		'name' => __( 'Input with Placeholder', 'theme-textdomain' ),
		'desc' => __( 'A text input field with an HTML5 placeholder.', 'theme-textdomain' ),
		'id' => 'example_placeholder',
		'placeholder' => 'Placeholder',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Input Select Small', 'theme-textdomain' ),
		'desc' => __( 'Small Select Box.', 'theme-textdomain' ),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array
	);

	$options[] = array(
		'name' => __( 'Input Select Wide', 'theme-textdomain' ),
		'desc' => __( 'A wider select box.', 'theme-textdomain' ),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array
	);

	if ( $options_categories ) {
		$options[] = array(
			'name' => __( 'Select a Category', 'theme-textdomain' ),
			'desc' => __( 'Passed an array of categories with cat_ID and cat_name', 'theme-textdomain' ),
			'id' => 'example_select_categories',
			'type' => 'select',
			'options' => $options_categories
		);
	}

	if ( $options_tags ) {
		$options[] = array(
			'name' => __( 'Select a Tag', 'options_check' ),
			'desc' => __( 'Passed an array of tags with term_id and term_name', 'options_check' ),
			'id' => 'example_select_tags',
			'type' => 'select',
			'options' => $options_tags
		);
	}

	$options[] = array(
		'name' => __( 'Select a Page', 'theme-textdomain' ),
		'desc' => __( 'Passed an pages with ID and post_title', 'theme-textdomain' ),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages
	);

	$options[] = array(
		'name' => __( 'Input Radio (one)', 'theme-textdomain' ),
		'desc' => __( 'Radio select with default options "one".', 'theme-textdomain' ),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array
	);

	$options[] = array(
		'name' => __( 'Example Info', 'theme-textdomain' ),
		'desc' => __( 'This is just some example information you can put in the panel.', 'theme-textdomain' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __( 'Input Checkbox', 'theme-textdomain' ),
		'desc' => __( 'Example checkbox, defaults to true.', 'theme-textdomain' ),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox'
	);*/

	$options[] = array(
		'name' => __( 'Theme Style Settings', 'theme-textdomain' ),
		'type' => 'heading'
	);

	/*$options[] = array(
		'name' => __( 'Check to Show a Hidden Text Input', 'theme-textdomain' ),
		'desc' => __( 'Click here and see what happens.', 'theme-textdomain' ),
		'id' => 'example_showhidden',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Hidden Text Input', 'theme-textdomain' ),
		'desc' => __( 'This option is hidden unless activated by a checkbox click.', 'theme-textdomain' ),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text'
	);*/
	
	$options[] = array(
		'name' => __( 'Logo', 'theme-textdomain' ),
		'desc' => __( 'Upload your logo here', 'theme-textdomain' ),
		'id' => 'logo_uploader',
		'std' => '',
		'type' => 'upload'
	);

	/*$options[] = array(
		'name' => "Example Image Selector",
		'desc' => "Images for layout.",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
			'2c-r-fixed' => $imagepath . '2cr.png'
		)
	);

	$options[] = array(
		'name' =>  __( 'Example Background', 'theme-textdomain' ),
		'desc' => __( 'Change the background CSS.', 'theme-textdomain' ),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background'
	);

	$options[] = array(
		'name' => __( 'Multicheck', 'theme-textdomain' ),
		'desc' => __( 'Multicheck description.', 'theme-textdomain' ),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array
	);

	$options[] = array(
		'name' => __( 'Colorpicker', 'theme-textdomain' ),
		'desc' => __( 'No color selected by default.', 'theme-textdomain' ),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color'
	);*/

	$options[] = array( 'name' => 'General Font',
	'desc' => '',
	'id' => 'google_font',
	'std' => array( 'face' => 'Rokkitt, serif'),
	'type' => 'typography',
	'options' => array(
		'faces' => options_typography_get_google_fonts(),
		'styles' => false )
	);
	
	$options[] = array( 'name' => 'Choose the Font for your Site Title',
	'desc' => '',
	'id' => 'google_font_title',
	'std' => array( 'face' => 'Rokkitt, serif'),
	'type' => 'typography',
	'options' => array(
		'faces' => options_typography_get_google_fonts(),
		'styles' => false )
	);

	$options[] = array(
		'name' => __( 'Site Info', 'theme-textdomain' ),
		'desc' => __( 'Copyright info and company name goes here. Use HTML for links', 'theme-textdomain' ),
		'id' => 'example_textarea',
		'std' => 'Gallery Theme by Stafford Creative - Powered by Wordpress',
		'type' => 'textarea'
	);
	
	/*$options[] = array(
		'name' => __( 'Text Editor', 'theme-textdomain' ),
		'type' => 'heading'
	);*/

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	/*$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => __( 'Default Text Editor', 'theme-textdomain' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'theme-textdomain' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);*/

	return $options;
}