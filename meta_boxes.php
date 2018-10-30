<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'investright_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "investright" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function investright_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'investright_';
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
	//print_r($menus);exit();
	$menu=array();

	foreach ( $menus as $menu1 ):
	$menu[$menu1->term_id]=$menu1->name;	
	endforeach;
			
	$nvAry = array(
		'post_status' => 'publish',
		'order' => 'ASC',
		'post_type' => 'event'
	);
	$qryAry = get_posts($nvAry);
	$content = array();
	
	foreach ( $qryAry as $qryAry1 ):
	$content[$qryAry1->ID]=$qryAry1->post_name;	
	endforeach;
	
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'standard',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Mega menu Settings', 'investright-backend' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
			// TEXT
			
			
			// SELECT BOX
			array(
				'name'        => esc_html__( 'Select menu (col 1)', 'investright-backend' ),
				'id'          => "{$prefix}menu1",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $menu,
				// Select multiple values, optional. Default is false.
				//'multiple'    => false,
				//'std'         => 'value2',
				'placeholder' => esc_html__( 'Menus', 'investright-backend' ),
			),
			array(
				'name'        => esc_html__( 'Select menu (col 2)', 'investright-backend' ),
				'id'          => "{$prefix}menu2",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $menu,
				// Select multiple values, optional. Default is false.
				//'multiple'    => false,
				//'std'         => 'value2',
				'placeholder' => esc_html__( 'Menus', 'investright-backend' ),
			),
				array(
				'name'        => esc_html__( 'Select menu (col 3)', 'investright-backend' ),
				'id'          => "{$prefix}menu3",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $menu,
				// Select multiple values, optional. Default is false.
				//'multiple'    => false,
				//'std'         => 'value2',
				'placeholder' => esc_html__( 'Menus', 'investright-backend' ),
			),
				array(
				'name'        => esc_html__( 'Select menu (col 4)', 'investright-backend' ),
				'id'          => "{$prefix}menu4",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $menu,
				// Select multiple values, optional. Default is false.
				//'multiple'    => false,
				//'std'         => 'value2',
				'placeholder' => esc_html__( 'Menus', 'investright-backend' ),
			),
				array(
				'name'        => esc_html__( 'Select menu (col 5)', 'investright-backend' ),
				'id'          => "{$prefix}menu5",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $menu,
				// Select multiple values, optional. Default is false.
				//'multiple'    => false,
				//'std'         => 'value2',
				'placeholder' => esc_html__( 'Menus', 'investright-backend' ),
			),
			array(
				'name'        => esc_html__( 'Select menu (col 6)', 'investright-backend' ),
				'id'          => "{$prefix}menu6",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $menu,
				// Select multiple values, optional. Default is false.
				//'multiple'    => false,
				//'std'         => 'value2',
				'placeholder' => esc_html__( 'Menus', 'investright-backend' ),
			),
			
			array(
				'name'             => esc_html__( 'Mega menu chiclets Image 1 (if Fraud Awareness menu then set image size 218X86 and other menu image size 144X85)', 'investright-backend' ),
				'id'               => "{$prefix}imgadv1",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'name'        => esc_html__( 'Mega menu chiclets Link 1:', 'investright-backend' ),
				'id'          => "{$prefix}chiclets_1",
				'type'        => 'text',
				'placeholder' => esc_html__( 'Please enter chiclets url', 'investright-backend' ),
			),
			array(
				'name'        => esc_html__( 'Open a new window:', 'investright-backend' ),
				'id'          => "{$prefix}checkbox_1",
				'type'        => 'checkbox',
			),
			array(
				'name'             => esc_html__( 'Mega menu chiclets Image 2 (if Fraud Awareness menu then set image size 218X86 and other menu image size 144X85)', 'investright-backend' ),
				'id'               => "{$prefix}imgadv2",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'name'        => esc_html__( 'Mega menu chiclets Link 2:', 'investright-backend' ),
				'id'          => "{$prefix}chiclets_2",
				'type'        => 'text',
				'placeholder' => esc_html__( 'Please enter chiclets url', 'investright-backend' ),
			),
			array(
				'name'        => esc_html__( 'Open a new window:', 'investright-backend' ),
				'id'          => "{$prefix}checkbox_2",
				'type'        => 'checkbox',
			),
			array(
				'name'             => esc_html__( 'Mega menu chiclets Image 3 (if Fraud Awareness menu then set image size 218X86 and other menu image size 144X85)', 'investright-backend' ),
				'id'               => "{$prefix}imgadv3",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'name'        => esc_html__( 'Mega menu chiclets Link 3:', 'investright-backend' ),
				'id'          => "{$prefix}chiclets_3",
				'type'        => 'text',
				'placeholder' => esc_html__( 'Please enter chiclets url', 'investright-backend' ),
			),
			array(
				'name'        => esc_html__( 'Open a new window:', 'investright-backend' ),
				'id'          => "{$prefix}checkbox_3",
				'type'        => 'checkbox',
			),
		),
	);
	
	// 2nd meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'standard1',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Events Settings', 'investright-backend' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'event' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
			// TEXT
			
			
			// SELECT BOX
			array(
				'name'        => esc_html__( 'Start date', 'investright-backend' ),
				'id'          => "{$prefix}start_date",
				'type'        => 'datetime',
				'placeholder' => esc_html__( 'Start Date', 'investright-backend' ),
				'js_options' => array(
					'dateFormat'      => __( 'yy-mm-dd', 'your-prefix' ),
				),
			),
			array(
				'name'        => esc_html__( 'End date', 'investright-backend' ),
				'id'          => "{$prefix}end_date",
				'type'        => 'datetime',
				'placeholder' => esc_html__( 'End Date', 'investright-backend' ),
				'js_options' => array(
					'dateFormat'      => __( 'yy-mm-dd', 'your-prefix' ),
				),
			),
			array(
				'name'        => esc_html__( 'Event Type', 'investright-backend' ),
				'id'          => "{$prefix}event_type",
				'type'        => 'text',
				'placeholder' => esc_html__( 'Event Type', 'investright-backend' ),
			),
			array(
				'name'        => esc_html__( 'Audience', 'investright-backend' ),
				'id'          => "{$prefix}audience",
				'type'        => 'text',
				'placeholder' => esc_html__( 'Audience age', 'investright-backend' ),
			),
			/*array(
				'name'        => esc_html__( 'Telephone', 'investright-backend' ),
				'id'          => "{$prefix}telephone",
				'type'        => 'text',
				'placeholder' => esc_html__( 'Telephone', 'investright-backend' ),
			),
			array(
				'name'        => esc_html__( 'Email', 'investright-backend' ),
				'id'          => "{$prefix}email",
				'type'        => 'text',
				'placeholder' => esc_html__( 'Email', 'investright-backend' ),
			),*/
			array(
				'name'        => esc_html__( 'Language', 'investright-backend' ),
				'id'          => "{$prefix}lang",
				'type'        => 'text',
				'multiple'    => false,
				'placeholder' => esc_html__( 'Language', 'investright-backend' ),
			),
			/*array(
				'name'        => esc_html__( 'Venue', 'investright-backend' ),
				'id'          => "{$prefix}location",
				'type'        => 'textarea',
				'placeholder' => esc_html__( 'Venue', 'investright-backend' ),
			),*/
			array(
				'name'        => esc_html__( 'Registration Info', 'investright-backend' ),
				'id'          => "{$prefix}register_info",
				'type'        => 'textarea',
				'placeholder' => esc_html__( 'Registration Info', 'investright-backend' ),
			),
			array(
				'name'        => esc_html__( 'Contact Info', 'investright-backend' ),
				'id'          => "{$prefix}contact_info",
				'type'        => 'wysiwyg',
				'placeholder' => esc_html__( 'Contact Info', 'investright-backend' ),
			),
			/*array(
				'id'          => "{$prefix}map",
				'type'        => 'map',
				'placeholder' => esc_html__( 'Event Map', 'investright-backend' ),
			),*/
		),
		
	);
	
	// 3 meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'standard2',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Related Events Settings', 'investright-backend' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'event' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
			// TEXT
			
			
			// SELECT BOX
			array(
				'name'        => esc_html__( 'Related Event 1 : ', 'investright-backend' ),
				'id'          => "{$prefix}content1",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $content,
				// Select multiple values, optional. Default is false.
				//'multiple'    => false,
				//'std'         => 'value2',
				'placeholder' => esc_html__( 'Select Related Event', 'investright-backend' ),
			),
			array(
				'name'        => esc_html__( 'Related Event 2 : ', 'investright-backend' ),
				'id'          => "{$prefix}content2",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $content,
				// Select multiple values, optional. Default is false.
				//'multiple'    => false,
				//'std'         => 'value2',
				'placeholder' => esc_html__( 'Select Related Event', 'investright-backend' ),
			),
				array(
				'name'        => esc_html__( 'Related Event 3 : ', 'investright-backend' ),
				'id'          => "{$prefix}content3",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $content,
				// Select multiple values, optional. Default is false.
				//'multiple'    => false,
				//'std'         => 'value2',
				'placeholder' => esc_html__( 'Select Related Event', 'investright-backend' ),
			),
				array(
				'name'        => esc_html__( 'Related Event 4 : ', 'investright-backend' ),
				'id'          => "{$prefix}content4",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $content,
				// Select multiple values, optional. Default is false.
				//'multiple'    => false,
				//'std'         => 'value2',
				'placeholder' => esc_html__( 'Select Related Event', 'investright-backend' ),
			),
			
		),
	);

	// Video meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'videometabox',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Video Section', 'investright-backend' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
			// TEXT

			array(
				'name'        => esc_html__( 'Video Url :', 'investright-backend' ),
				'id'          => "{$prefix}video_url",
				'type'        => 'textarea',
				'placeholder' => esc_html__( 'Video Url', 'investright-backend' ),
			),
			array(
				'name'             => esc_html__( 'Video Thumbnail (480 x 320):', 'investright-backend' ),
				'id'               => "{$prefix}videothumb",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			/*array(
				'name'             => esc_html__( 'Featured Image Clickable Url:', 'investright-backend' ),
				'id'               => "{$prefix}featured_url",
				'type'             => 'text',
				'placeholder' => esc_html__( 'Please enter featured image clickable url', 'investright-backend' ),
			),*/
			
		),
	);	
	
	return $meta_boxes;
}