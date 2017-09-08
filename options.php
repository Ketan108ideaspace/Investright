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
 * If you are making your theme translatable, you should replace 'investright_admin'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'investright_admin' ),
		'two' => __( 'Two', 'investright_admin' ),
		'three' => __( 'Three', 'investright_admin' ),
		'four' => __( 'Four', 'investright_admin' ),
		'five' => __( 'Five', 'investright_admin' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'investright_admin' ),
		'two' => __( 'Pancake', 'investright_admin' ),
		'three' => __( 'Omelette', 'investright_admin' ),
		'four' => __( 'Crepe', 'investright_admin' ),
		'five' => __( 'Waffle', 'investright_admin' )
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
		'name' => __( 'Header', 'investright_admin' ),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => __('Logo :', 'investright_admin'),
		'desc' => __('Please upload website logo here (314 X 72)', 'investright_admin'),
		'id' => 'logo',
		'type' => 'upload'
	);
	
	$options[] = array(
		'name' => __('Favicon :', 'investright_admin'),
		'desc' => __('Please upload website favicon icon here', 'investright_admin'),
		'id' => 'favicon',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Facebook Url :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'facebook_url',
		'placeholder' => 'Please enter facebook url',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Twitter Url :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'twitter_url',
		'placeholder' => 'Please enter twitter url',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Youtube Url :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'youtube_url',
		'placeholder' => 'Please enter youtube url',
		'type' => 'text'
	);
		
	$options[] = array(
		'name' => __( 'Report a Concern link :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'report_a_concern_link',
		'placeholder' => 'Please enter report a concern link',
		'type' => 'text'
	);
	
	/*Footer Info*/
	$options[] = array(
		'name' => __('Footer', 'investright_admin'),
		'type' => 'heading');
    
	$options[] = array(
		'name' => __( 'Reception :', 'investright_admin' ),
		//'desc' => __( 'A text input field.', 'investright_admin' ),
		'id' => 'reception_number',
		'placeholder' => 'Please enter reception number',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Fax :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'fax_number',
		'placeholder' => 'Please enter fax number',
		'type' => 'text'
	);

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => __( 'Address :', 'investright_admin' ),
		//'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'investright_admin' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'footer_address',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	
	$options[] = array(
		'name' => __( 'Reception and Deliveries :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'reception_deliveries',
		'placeholder' => 'Please enter reception and deliveries',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Iphone App Url :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'itunesstore_url',
		'placeholder' => 'Please enter iphone app url',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Google App Url :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'playstore_url',
		'placeholder' => 'Please enter google app url',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Report a Concern link :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'footer_report_a_concern_link',
		'placeholder' => 'Please enter report a concern link',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Copyright Text :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'copyright_text',
		'placeholder' => 'Please enter copyright text',
		'type' => 'text'
	);
	
	/*Home Page Info*/
	$options[] = array(
		'name' => __('Home Page-EN', 'investright_admin'),
		'type' => 'heading');
		

	$options[] = array(
		'name' => __( 'Home Page Top Notification Bar :', 'investright_admin' ),
		//'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'investright_admin' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'notification_msg_en',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	
	$options[] = array(
		'name' => __( 'Right hand side block below the banner :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'rightblocktitle_en',
		'placeholder' => 'Please enter title name',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'rightblocktxt_en',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'id' => 'rightblocklink_en',
		'placeholder' => 'Please enter link',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'rightblockcheckbox_en',
		'desc' => __( 'Open a new window.', 'investright_admin' ),
		'type' => 'checkbox'
	);
	
	
	$options[] = array(
		'name' => __( 'Left hand side block below the banner :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'leftblocktitle_en',
		'placeholder' => 'Please enter title name',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'leftblocktxt_en',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'id' => 'leftblocklink_en',
		'placeholder' => 'Please enter link',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'leftblockcheckbox_en',
		'desc' => __( 'Open a new window.', 'investright_admin' ),
		'type' => 'checkbox'
	);
	
	$options[] = array(
		'name' => __( 'Video block :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'videoblocktitle_en',
		'placeholder' => 'Please enter title name',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'videoblocktxt_en',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'id' => 'videoblocklink_en',
		'placeholder' => 'Please enter link',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'videoblockcheckbox_en',
		'desc' => __( 'Open a new window.', 'investright_admin' ),
		'type' => 'checkbox'
	);
	$options[] = array(
		'name' => __( 'Video embeds url code:', 'investright_admin' ),
		'id' => 'videoblockembeds_en',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'name' => __('Video Thumbnail (688 x 443):', 'investright_admin'),
		'id' => 'homepage_video_thumb_en',
		'type' => 'upload'
	);
	
	/*Home Page Info*/
	$options[] = array(
		'name' => __('Home Page-繁體中文', 'investright_admin'),
		'type' => 'heading');
		

	$options[] = array(
		'name' => __( 'Home Page Top Notification Bar :', 'investright_admin' ),
		//'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'investright_admin' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'notification_msg_zh-hant',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	
	$options[] = array(
		'name' => __( 'Right hand side block below the banner :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'rightblocktitle_zh-hant',
		'placeholder' => 'Please enter title name',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'rightblocktxt_zh-hant',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'id' => 'rightblocklink_zh-hant',
		'placeholder' => 'Please enter link',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'rightblockcheckbox_zh-hant',
		'desc' => __( 'Open a new window.', 'investright_admin' ),
		'type' => 'checkbox'
	);
	
	
	$options[] = array(
		'name' => __( 'Left hand side block below the banner :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'leftblocktitle_zh-hant',
		'placeholder' => 'Please enter title name',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'leftblocktxt_zh-hant',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'id' => 'leftblocklink_zh-hant',
		'placeholder' => 'Please enter link',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'leftblockcheckbox_zh-hant',
		'desc' => __( 'Open a new window.', 'investright_admin' ),
		'type' => 'checkbox'
	);
	
	$options[] = array(
		'name' => __( 'Video block :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'videoblocktitle_zh-hant',
		'placeholder' => 'Please enter title name',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'videoblocktxt_zh-hant',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'id' => 'videoblocklink_zh-hant',
		'placeholder' => 'Please enter link',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'videoblockcheckbox_zh-hant',
		'desc' => __( 'Open a new window.', 'investright_admin' ),
		'type' => 'checkbox'
	);
	$options[] = array(
		'name' => __( 'Video embeds url code:', 'investright_admin' ),
		'id' => 'videoblockembeds_zh-hant',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'name' => __('Video Thumbnail (688 x 443):', 'investright_admin'),
		'id' => 'homepage_video_thumb_zh-hant',
		'type' => 'upload'
	);
	
	
	/*Home Page Info*/
	$options[] = array(
		'name' => __('Home Page-ਪੰਜਾਬੀ', 'investright_admin'),
		'type' => 'heading');
		

	$options[] = array(
		'name' => __( 'Home Page Top Notification Bar :', 'investright_admin' ),
		//'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'investright_admin' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'notification_msg_pa',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	
	$options[] = array(
		'name' => __( 'Right hand side block below the banner :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'rightblocktitle_pa',
		'placeholder' => 'Please enter title name',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'rightblocktxt_pa',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'id' => 'rightblocklink_pa',
		'placeholder' => 'Please enter link',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'rightblockcheckbox_pa',
		'desc' => __( 'Open a new window.', 'investright_admin' ),
		'type' => 'checkbox'
	);
	
	
	$options[] = array(
		'name' => __( 'Left hand side block below the banner :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'leftblocktitle_pa',
		'placeholder' => 'Please enter title name',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'leftblocktxt_pa',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'id' => 'leftblocklink_pa',
		'placeholder' => 'Please enter link',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'leftblockcheckbox_pa',
		'desc' => __( 'Open a new window.', 'investright_admin' ),
		'type' => 'checkbox'
	);
	
	$options[] = array(
		'name' => __( 'Video block :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'videoblocktitle_pa',
		'placeholder' => 'Please enter title name',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'videoblocktxt_pa',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'id' => 'videoblocklink_pa',
		'placeholder' => 'Please enter link',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'videoblockcheckbox_pa',
		'desc' => __( 'Open a new window.', 'investright_admin' ),
		'type' => 'checkbox'
	);
	$options[] = array(
		'name' => __( 'Video embeds url code:', 'investright_admin' ),
		'id' => 'videoblockembeds_pa',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$options[] = array(
		'name' => __('Video Thumbnail (688 x 443):', 'investright_admin'),
		'id' => 'homepage_video_thumb_pa',
		'type' => 'upload'
	);
	
	
	/*Home Page Info*/
	$options[] = array(
		'name' => __('404 & Index Level Page', 'investright_admin'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __( '404 Page Suggested Page 1 :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'suggested_pages_name_1',
		'placeholder' => 'Please enter suggested page title name',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'suggested_pages_link_1',
		'placeholder' => 'Please enter suggested page link',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( '404 Page Suggested Page 2 :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'suggested_pages_name_2',
		'placeholder' => 'Please enter suggested page title name',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'suggested_pages_link_2',
		'placeholder' => 'Please enter suggested page link',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( '404 Page Suggested Page 3 :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'suggested_pages_name_3',
		'placeholder' => 'Please enter suggested page title name',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'suggested_pages_link_3',
		'placeholder' => 'Please enter suggested page link',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( '404 Page Suggested Page 4 :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'suggested_pages_name_4',
		'placeholder' => 'Please enter suggested page title name',
		'type' => 'text'
	);

	$options[] = array(
		'id' => 'suggested_pages_link_4',
		'placeholder' => 'Please enter suggested page link',
		'type' => 'text'
	);
    $options[] = array(
        'name' => __( '404 Page Suggested Page 5 :', 'investright_admin' ),
        //'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
        'id' => 'suggested_pages_name_5',
        'placeholder' => 'Please enter suggested page title name',
        'type' => 'text'
    );
    $options[] = array(
        'id' => 'suggested_pages_link_5',
        'placeholder' => 'Please enter suggested page link',
        'type' => 'text'
    );
	$options[] = array(
		'name' => __( '1st Color Code for Main Level Index page :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => '1st_color',
		'placeholder' => 'Please enter 1st Color Code for Main Level Index page',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( '2nd Color Code for Main Level Index page :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => '2nd_color',
		'placeholder' => 'Please enter 2nd Color Code for Main Level Index page',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( '3rd Color Code for Main Level Index page:', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => '3rd_color',
		'placeholder' => 'Please enter 3rd Color Code for Main Level Index page',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( '4th Color Code for Main Level Index page:', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => '4th_color',
		'placeholder' => 'Please enter 4th Color Code for Main Level Index page',
		'type' => 'text'
	);
	
	/*Email subscribers form*/
	$options[] = array(
		'name' => __('Email Subscriber Form', 'investright_admin'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __( 'Name Label:', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'name_label',
		'placeholder' => 'Please enter name label text',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Email Label:', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'email_label',
		'placeholder' => 'Please enter email label text',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Email Agree Label:', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'email_agree',
		'placeholder' => 'Please enter email subscribers agree text',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Button Label:', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'button_label',
		'placeholder' => 'Please enter button label text',
		'type' => 'text'
	);
	
	/*Message Setting info*/
	$options[] = array(
		'name' => __('Message', 'investright_admin'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __( 'Category Not Found Message:', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'category_not_found_msg',
		'placeholder' => 'Please enter category not found message',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Event Not Found Message:', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'event_not_found_msg',
		'placeholder' => 'Please enter Event not found message',
		'type' => 'text'
	);
	
	/*Share Setting info*/
	$options[] = array(
		'name' => __('Share Message', 'investright_admin'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __( 'Email Subject (1 to 3 Score):', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'email_subject_1',
		'placeholder' => 'Please enter email subject',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Email Body Message (1 to 3 Score):', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'email_body_msg_1',
		'placeholder' => 'Please enter email body message',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Twitter share Message (1 to 3 Score):', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'twitter_share_msg_1',
		'placeholder' => 'Please enter twitter share message',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Facebook share Message (1 to 3 Score):', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'facebook_share_msg_1',
		'placeholder' => 'Please enter facebook share message',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Email Subject (4 to 6 Score):', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'email_subject_4',
		'placeholder' => 'Please enter email subject',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Email Body Message (4 to 6 Score):', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'email_body_msg_4',
		'placeholder' => 'Please enter email body message',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Twitter share Message (4 to 6 Score):', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'twitter_share_msg_4',
		'placeholder' => 'Please enter twitter share message',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Facebook share Message (4 to 6 Score):', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'facebook_share_msg_4',
		'placeholder' => 'Please enter facebook share message',
		'type' => 'text'
	);
	
	
	$options[] = array(
		'name' => __( 'Email Subject (7 Score):', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'email_subject_7',
		'placeholder' => 'Please enter email subject',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Email Body Message (7 Score):', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'email_body_msg_7',
		'placeholder' => 'Please enter email body message',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Twitter share Message (7 Score):', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'twitter_share_msg_7',
		'placeholder' => 'Please enter twitter share message',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Facebook share Message (7 Score):', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'facebook_share_msg_7',
		'placeholder' => 'Please enter facebook share message',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Holiday play facebook share message :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'facebook_share_msg_play',
		'placeholder' => 'Please enter facebook share message',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Holiday play facebook share title :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'facebook_share_title_play',
		'placeholder' => 'Please enter facebook share title',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Holiday play twitter share message :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'twitter_share_msg_play',
		'placeholder' => 'Please enter facebook share message',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Email subject :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'email_subject_play',
		'placeholder' => 'Please enter email subject',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Email body message :', 'investright_admin' ),
		//'desc' => __( 'A text input field with an HTML5 placeholder.', 'investright_admin' ),
		'id' => 'email_body_msg_play',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	
	$options[] = array(
		'name' => __('Facebook OG Image :', 'investright_admin'),
		'desc' => __('Please upload facebook og image', 'investright_admin'),
		'id' => 'facebook_holiday_img',
		'type' => 'upload'
	);
	
	return $options;
}