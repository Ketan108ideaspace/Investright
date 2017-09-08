<?php
add_theme_support( 'post-thumbnails');
// Template URL
$template_url = get_bloginfo('template_url');
// Site URL
$site_url = get_bloginfo('url');
require_once('meta_boxes.php');
require_once('metabox_low_level.php');

//Add script and style enqueue 18-Jul-16
if ( ! function_exists( 'embed_script_style' ) ) {
    function embed_script_style() {
		global $template_url, $site_url;

        /* Register & Enqueue Styles. */
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i');
		wp_enqueue_style( 'my-font', $template_url.'/fonts/font-style.css',array(), '1.0.0', 'screen' );

		/* Register & Enqueue scripts. */
		wp_enqueue_script('jquery-min', $template_url.'/js/jquery.min.js', false);
		//wp_enqueue_script('addthis-min', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57ff53ff8e87ad76', false);
		
		wp_enqueue_script('textresizer-js', $template_url.'/js/jquery.textresizer.js', true );
		wp_enqueue_script('jquery.flexslider', $template_url.'/js/jquery.flexslider.js', true );
		wp_enqueue_script('common-js', $template_url.'/js/custom.js', array('jquery'),'4.7.1', true);
		wp_enqueue_script('Validation-js', $template_url.'/js/jquery.validate.min.js', true );
                wp_enqueue_script('custom-edit-js', $template_url.'/custom-edit.js', true );
		wp_enqueue_script('script-js', $template_url.'/js/script.js', true );
		wp_enqueue_script('jquery.slicknav', $template_url.'/js/jquery.slicknav.js', false );
		//wp_enqueue_script('googlemap-js', 'http://maps.googleapis.com/maps/api/js?key=AIzaSyBwxw8p_BftCvNwcHYHWht1yVIOvfQBje0', false );
		wp_enqueue_script('html5lightbox-js', $template_url.'/html5lightbox.js', true );

		//wp_enqueue_script('jquery-ui-datepicker', array(), '', true);

		if( is_page_template( 'template-events.php' ) ){
			wp_enqueue_style( 'fullcalender-css',$template_url.'/fullcalendar/fullcalendar.css', array(), '1.0.0' );
			wp_enqueue_style( 'fullcalender-print-css',$template_url.'/fullcalendar/fullcalendar.print.css', array(), '1.0.0', 'print' );
			wp_enqueue_style( 'datatable-css',$template_url.'/css/jquery.dataTables.min.css',array(), '1.0.0', 'screen' );

			wp_enqueue_style( 'core', $template_url.'/jQueryAssets/jquery.ui.core.min.css', array(), '1.0.0');
			wp_enqueue_style( 'theme', $template_url.'/jQueryAssets/jquery.ui.theme.min.css', array(), '1.0.0');
			wp_enqueue_style( 'tabs', $template_url.'/jQueryAssets/jquery.ui.tabs.min.css', array(), '1.0.0');

			wp_enqueue_script( 'moment-js',$template_url.'/fullcalendar/lib/moment.min.js', array( 'jquery' ) );
			wp_enqueue_script( 'fullcalendar-js',$template_url.'/fullcalendar/fullcalendar.min.js', array( 'jquery' ) );
			wp_enqueue_script( 'datatable-js',$template_url.'/js/jquery.dataTables.min.js', array( 'jquery' ) );
			wp_enqueue_script( 'tabs-js',$template_url.'/jQueryAssets/jquery-ui-1.9.2.tabs.custom.min.js', array( 'jquery' ) );

			wp_enqueue_style('qtip', $template_url.'/css/jquery.qtip.css', null, false, false );
			wp_enqueue_script('imagesloaded', $template_url.'/js/imagesloaded.min.js', null, false, true );
			wp_enqueue_script('qtip', $template_url.'/js/jquery.qtip.min.js', array( 'jquery', 'imagesloaded' ), false, true );
		}

		if( is_page_template( 'template-test.php' ) || is_page_template( 'template-investright-fee-calculator-template.php' ) ){
			wp_enqueue_style( 'calculator-css',$template_url.'/calculator.css');
		}

        /* Register & Enqueue Styles. */
		wp_enqueue_style( 'ideaspace-style', $template_url.'/ideaspace-template.css',array(), '1.0.0', 'all' );
        wp_enqueue_style( 'my-style', $template_url.'/style.css',array(), '1.1.0', 'screen' );
		wp_enqueue_style( 'custom-style', $template_url.'/custom-style.css',array(), '1.0.0', 'screen' );
		wp_enqueue_style( 'media-style', $template_url.'/media-style.css',array(), '1.0.0', 'screen' );
		wp_enqueue_style( 'flexslider-theme', $template_url.'/css/flexslider.css',array(), '1.0.0', 'screen' );
		wp_enqueue_script('imagesloaded', $template_url.'/js/imagesloaded.min.js', null, false, true );
		
		if( is_page_template( 'template-holiday-card.php' ) ){
			wp_enqueue_style( 'holidaycard-style', $template_url.'/style-holidaycard.css');
		}
		if( is_page_template( 'template-holiday-card-2016.php' ) ){
			wp_enqueue_style( 'holidaycard-style', $template_url.'/style-holidaycard.css');
		}
    }
}
add_action( 'wp_enqueue_scripts', 'embed_script_style', 10 );

register_nav_menus( array( 'Header_Menu' => __( 'Header Menu' ) ) );	// Header Menu
register_nav_menus( array( 'Footer_Menu' => __( 'Footer Menu' ) ) );   // Header Menu

register_nav_menus( array( 'Investing_Menu' => __( 'Investing 101 Menu' ) ) );	// Investing 101 Menu
register_nav_menus( array( 'Smarter_Investing_Menu' => __( 'Informed Investing Menu' ) ) );   // Informed Investing Menu
register_nav_menus( array( 'Fraud_Awareness_Menu' => __( 'Fraud Awareness Menu' ) ) );	// Fraud Awareness Menu
register_nav_menus( array( 'Resources_Menu' => __( 'Resources Menu' ) ) );   // Resources Menu
register_nav_menus( array( 'About_Menu' => __( 'About Menu' ) ) );	// About Menu
register_nav_menus( array( 'primary' => __( 'Primary Menu') ) );
register_nav_menus( array( 'site_map' => __( 'Site Map') ) );	//Site Map

/*
// Adds a Event Dates meta box to the post editing screen
function add_event_eventdates_meta() {
    add_meta_box( 'eventdates_meta', __( 'Event Date(s)', 'eventdates_meta-textdomain' ), 'display_meta_callback_eventdates', 'event', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'add_event_eventdates_meta' );

// Outputs the content of the Event Dates meta box
function display_meta_callback_eventdates( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'eventdates_nonce' );
    $stored_meta = get_post_meta( $post->ID );

	if(get_post_meta( $post->ID, 'event_start_date', true ))
		$event_start_date = date( 'd-m-Y', strtotime( get_post_meta( $post->ID, 'event_start_date', true ) ) );
	if(get_post_meta( $post->ID, 'event_end_date', true ))
		$event_end_date = date( 'd-m-Y', strtotime( get_post_meta( $post->ID, 'event_end_date', true ) ) );
    ?>

 <p>
    <div id="eventdatesmetabox">
        <label for="checkevent">
            <input type="checkbox" name="checkevent" id="checkevent" value="on" <?php if ( isset ( $stored_meta['checkevent'] ) ) checked( $stored_meta['checkevent'][0], 'on' ); ?> />
            <?php _e( 'This is an event', 'eventdates_meta-textdomain' )?>
        </label>

        <span class="pickdate" style="display:none;">
            <label for="event_date_start">
            <input  type="text" name="event_date_start" id="event_date_start" class="dates estartdate" value="<?php if($event_start_date) echo $event_start_date; else echo $_POST['event_date_start']; ?>" placeholder="DD-MM-YY">
            </label>

            <label for="event_date_end">
            <input  type="text" name="event_date_end" id="event_date_end" class="dates eenddate" value="<?php if($event_end_date) echo $event_end_date; else echo $_POST['event_date_end']; ?>" placeholder="DD-MM-YY">
            </label>
        </span>

    </div>
</p>
<?php
function hkdc_admin_styles() {
  wp_enqueue_style( 'jquery-ui-datepicker-style' , '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css');
}
add_action('admin_print_styles', 'hkdc_admin_styles');
function hkdc_admin_scripts() {
  wp_enqueue_script( 'jquery-ui-datepicker' );
}
add_action('admin_enqueue_scripts', 'hkdc_admin_scripts');
?>

<script>
jQuery(function(){

	if(jQuery('#checkevent').is(":checked")) {
		jQuery('span.pickdate').show();
	}

	jQuery('#checkevent').change(function(){
		if(this.checked) {
			jQuery('.pickdate').show();
		} else {
			jQuery('.pickdate').hide();
		}
	});

	jQuery( "#event_date_start" ).datepicker({
		dateFormat: "dd-mm-yy",
		onClose: function( selectedDate ) {
			jQuery( "#event_date_end" ).datepicker( "option", "minDate", selectedDate );
		}
	});

	jQuery( "#event_date_end" ).datepicker({
		dateFormat: "dd-mm-yy",
		defaultDate: "+1w",
		onClose: function( selectedDate ) {
			jQuery( "#event_date_start" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
});
</script>

<?php
}

// Saves the custom meta input
function eventdates_meta_save_event( $post_id ) {

    // Checks save status - overcome autosave, etc.
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'eventdates_nonce' ] ) && wp_verify_nonce( $_POST[ 'eventdates_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

	// Checks for input and saves - save checked as yes and unchecked at no
	if( isset( $_POST[ 'checkevent' ] ) ) {
		update_post_meta( $post_id, 'checkevent', 'on' );
	} else {
		update_post_meta( $post_id, 'checkevent', 'off' );
	}

	if($_POST[ 'checkevent' ] == 'on') {
		if( isset( $_POST[ 'event_date_start' ] ) ) {
			$s_date = date("Y-m-d", strtotime($_POST[ 'event_date_start' ]));
			update_post_meta( $post_id, 'event_start_date',  $s_date);
		} else {
			update_post_meta( $post_id, 'event_start_date', '' );
		}

		if( isset( $_POST[ 'event_date_end' ] ) ) {
			$d_date = date("Y-m-d", strtotime($_POST[ 'event_date_end' ]));
			update_post_meta( $post_id, 'event_end_date',  $d_date );
		} else {
			update_post_meta( $post_id, 'event_end_date', '' );
		}
	}
	else {
		update_post_meta( $post_id, 'event_start_date', '' );
		update_post_meta( $post_id, 'event_end_date', '' );
	}
}
add_action( 'save_post', 'eventdates_meta_save_event' );

function get_all_taxonomy_data( $taxonomy, $parent, $orderby, $order, $hide_empty=true) {
    $tax_id = get_term_by('slug', $parent, $taxonomy);
    if( $tax_id->term_id )
        $taxid = $tax_id->term_id;
    $args = array(
        'orderby'           => $orderby,
        'order'             => $order,
        'hide_empty'        => $hide_empty,
        'exclude'           => array(),
        'exclude_tree'      => array(),
        'include'           => array(),
        'number'            => '',
        'fields'            => 'all',
        'slug'              => '',
        'parent'            => '',
        'hierarchical'      => true,
        'child_of'          => $taxid,
        'childless'         => false,
        'get'               => '',
        'name__like'        => '',
        'description__like' => '',
        'pad_counts'        => false,
        'offset'            => '',
        'search'            => '',
        'cache_domain'      => 'core'
    );

    return get_terms($taxonomy, $args);
}*/

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() {

?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}

// Register Custom Post Type
function Event() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'investright' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'investright' ),
		'menu_name'             => __( 'Event', 'investright' ),
		'name_admin_bar'        => __( 'Event', 'investright' ),
		'archives'              => __( 'Item Archives', 'investright' ),
		'parent_item_colon'     => __( 'Parent Item:', 'investright' ),
		'all_items'             => __( 'All Events', 'investright' ),
		'add_new_item'          => __( 'Add New Item', 'investright' ),
		'add_new'               => __( 'Add New', 'investright' ),
		'new_item'              => __( 'New Item', 'investright' ),
		'edit_item'             => __( 'Edit Item', 'investright' ),
		'update_item'           => __( 'Update Item', 'investright' ),
		'view_item'             => __( 'View Item', 'investright' ),
		'search_items'          => __( 'Search Item', 'investright' ),
		'not_found'             => __( 'Not found', 'investright' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'investright' ),
		'featured_image'        => __( 'Featured Image', 'investright' ),
		'set_featured_image'    => __( 'Set featured image', 'investright' ),
		'remove_featured_image' => __( 'Remove featured image', 'investright' ),
		'use_featured_image'    => __( 'Use as featured image', 'investright' ),
		'insert_into_item'      => __( 'Insert into item', 'investright' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'investright' ),
		'items_list'            => __( 'Items list', 'investright' ),
		'items_list_navigation' => __( 'Items list navigation', 'investright' ),
		'filter_items_list'     => __( 'Filter items list', 'investright' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'investright' ),
		'description'           => __( 'Event Description', 'investright' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( 'event_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Event', $args );

}
add_action( 'init', 'Event', 0 );


// Register Custom Post Type
function Chiclets() {

	$labels = array(
		'name'                  => _x( 'Chiclets', 'Post Type General Name', 'investright' ),
		'singular_name'         => _x( 'Chiclet', 'Post Type Singular Name', 'investright' ),
		'menu_name'             => __( 'Chiclets', 'investright' ),
		'name_admin_bar'        => __( 'Chiclets', 'investright' ),
		'archives'              => __( 'Item Archives', 'investright' ),
		'parent_item_colon'     => __( 'Parent Item:', 'investright' ),
		'all_items'             => __( 'All Chiclets', 'investright' ),
		'add_new_item'          => __( 'Add New Item', 'investright' ),
		'add_new'               => __( 'Add New', 'investright' ),
		'new_item'              => __( 'New Item', 'investright' ),
		'edit_item'             => __( 'Edit Item', 'investright' ),
		'update_item'           => __( 'Update Item', 'investright' ),
		'view_item'             => __( 'View Item', 'investright' ),
		'search_items'          => __( 'Search Item', 'investright' ),
		'not_found'             => __( 'Not found', 'investright' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'investright' ),
		'featured_image'        => __( 'Featured Image', 'investright' ),
		'set_featured_image'    => __( 'Set featured image', 'investright' ),
		'remove_featured_image' => __( 'Remove featured image', 'investright' ),
		'use_featured_image'    => __( 'Use as featured image', 'investright' ),
		'insert_into_item'      => __( 'Insert into item', 'investright' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'investright' ),
		'items_list'            => __( 'Items list', 'investright' ),
		'items_list_navigation' => __( 'Items list navigation', 'investright' ),
		'filter_items_list'     => __( 'Filter items list', 'investright' ),
	);
	$args = array(
		'label'                 => __( 'Chiclet', 'investright' ),
		'description'           => __( 'Chiclets Description', 'investright' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Chiclets', $args );

}
//add_action( 'init', 'Chiclets', 0 );


// Register Custom Post Type
function Videos() {

	$labels = array(
		'name'                  => _x( 'Videos', 'Post Type General Name', 'investright' ),
		'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'investright' ),
		'menu_name'             => __( 'Videos', 'investright' ),
		'name_admin_bar'        => __( 'Videos', 'investright' ),
		'archives'              => __( 'Item Archives', 'investright' ),
		'parent_item_colon'     => __( 'Parent Item:', 'investright' ),
		'all_items'             => __( 'All Videos', 'investright' ),
		'add_new_item'          => __( 'Add New Item', 'investright' ),
		'add_new'               => __( 'Add New', 'investright' ),
		'new_item'              => __( 'New Item', 'investright' ),
		'edit_item'             => __( 'Edit Item', 'investright' ),
		'update_item'           => __( 'Update Item', 'investright' ),
		'view_item'             => __( 'View Item', 'investright' ),
		'search_items'          => __( 'Search Item', 'investright' ),
		'not_found'             => __( 'Not found', 'investright' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'investright' ),
		'featured_image'        => __( 'Featured Image', 'investright' ),
		'set_featured_image'    => __( 'Set featured image', 'investright' ),
		'remove_featured_image' => __( 'Remove featured image', 'investright' ),
		'use_featured_image'    => __( 'Use as featured image', 'investright' ),
		'insert_into_item'      => __( 'Insert into item', 'investright' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'investright' ),
		'items_list'            => __( 'Items list', 'investright' ),
		'items_list_navigation' => __( 'Items list navigation', 'investright' ),
		'filter_items_list'     => __( 'Filter items list', 'investright' ),
	);
	$args = array(
		'label'                 => __( 'Video', 'investright' ),
		'description'           => __( 'Videos Description', 'investright' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Videos', $args );

}
//add_action( 'init', 'Videos', 0 );


add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {
  if( $item->menu_item_parent == 0 && (in_array('current_page_item', $classes) )) {
    $classes[] = "active";
  }

  return $classes;
}

// Register Custom Post Type
function banner_function() {

	$labels = array(
		'name'                  => _x( 'Banners', 'Post Type General Name', 'investright' ),
		'singular_name'         => _x( 'Banner', 'Post Type Singular Name', 'investright' ),
		'menu_name'             => __( 'Banner', 'investright' ),
		'name_admin_bar'        => __( 'Banner', 'investright' ),
		'archives'              => __( 'Item Archives', 'investright' ),
		'parent_item_colon'     => __( 'Parent Item:', 'investright' ),
		'all_items'             => __( 'All Items', 'investright' ),
		'add_new_item'          => __( 'Add New Item', 'investright' ),
		'add_new'               => __( 'Add New', 'investright' ),
		'new_item'              => __( 'New Item', 'investright' ),
		'edit_item'             => __( 'Edit Item', 'investright' ),
		'update_item'           => __( 'Update Item', 'investright' ),
		'view_item'             => __( 'View Item', 'investright' ),
		'search_items'          => __( 'Search Item', 'investright' ),
		'not_found'             => __( 'Not found', 'investright' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'investright' ),
		'featured_image'        => __( 'Featured Image', 'investright' ),
		'set_featured_image'    => __( 'Set featured image', 'investright' ),
		'remove_featured_image' => __( 'Remove featured image', 'investright' ),
		'use_featured_image'    => __( 'Use as featured image', 'investright' ),
		'insert_into_item'      => __( 'Insert into item', 'investright' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'investright' ),
		'items_list'            => __( 'Items list', 'investright' ),
		'items_list_navigation' => __( 'Items list navigation', 'investright' ),
		'filter_items_list'     => __( 'Filter items list', 'investright' ),
	);
	$args = array(
		'label'                 => __( 'Banner', 'investright' ),
		'description'           => __( 'Banner Type Description', 'investright' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Banner', $args );

}
add_action( 'init', 'banner_function', 0 );

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

//Add video custom meta box
function add_embeds_custom_meta_box()
{
    add_meta_box("video-meta-box", "Video Embeds", "embeds_custom_meta_box", "page", "normal", "high", null);
}

//add_action("add_meta_boxes", "add_embeds_custom_meta_box");


function embeds_custom_meta_box($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="meta-box-text"><strong>Video Embeds Url :</strong></label>

            <!--<input type="url" name="meta-box-text" id="excerpt" value="<?php //echo get_post_meta($object->ID, "meta-box-text", true); ?>" />-->
            <textarea rows="1" cols="40" name="meta-box-text" id="excerpt"><?php echo get_post_meta($object->ID, "meta-box-text", true); ?></textarea>
        </div>
    <?php
}

function save_embeds_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";
    $meta_box_dropdown_value = "";
    $meta_box_checkbox_value = "";

    if(isset($_POST["meta-box-text"]))
    {
        $meta_box_text_value = $_POST["meta-box-text"];
    }
    update_post_meta($post_id, "meta-box-text", $meta_box_text_value);
}

add_action("save_post", "save_embeds_custom_meta_box", 10, 3);
//End video custom meta box

//Add banner button custom meta box
function add_banner_button_custom_meta_box()
{
    add_meta_box("banner-button-meta-box", "Banner Button :", "banner_button_custom_meta_box", "banner", "normal", "high", null);
}

add_action("add_meta_boxes", "add_banner_button_custom_meta_box");


function banner_button_custom_meta_box($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <input type="text" name="banner_button" id="banner_button" value="<?php echo get_post_meta($object->ID, "banner_button", true); ?>">
        </div>
    <?php
}

function save_banner_button_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "banner";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";
    $meta_box_dropdown_value = "";
    $meta_box_checkbox_value = "";

    if(isset($_POST["banner_button"]))
    {
        $meta_box_text_value = $_POST["banner_button"];
    }
    update_post_meta($post_id, "banner_button", $meta_box_text_value);
}

add_action("save_post", "save_banner_button_custom_meta_box", 10, 3);
//End video custom meta box

//Replace submenu class
class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"header-nav-child\">\n";
  }
}

function wpb_latest_sticky() {

/* Get all sticky posts */
$sticky = get_option( 'sticky_posts' );
$nvSPName = 4;
$nvPostId = array();
/* Sort the stickies with the newest ones at the top */
rsort( $sticky );

/* Get the 5 newest stickies (change 5 for a different number) */
$sticky = array_slice( $sticky, 0, 5 );

/* Query sticky posts */
$the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1, 'posts_per_page' => 4  ) );
// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$nvSPName--;
		$nvPostId[] = get_the_ID();
		$cats = get_the_category();
		//$nvCatName = $cats[0]->cat_ID;
		$nvCatName = trim(get_field('category_colour', 'category_'.$cats[0]->cat_ID));
		if($nvCatName=="announcement") {
			$nvClass = "announcement";
		} else if($nvCatName=="alert") {
			$nvClass = "alert";
		} else {
			$nvClass = "news";
		}

		?>

		<div class="latest-news-container <?php echo $nvClass; ?>">
		  <h3><a href="<?php echo get_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		  <p class="date-author"><?php echo the_time( 'M d, Y g:i a' ); ?></p>
		  	<p><?php
				echo get_the_excerpt();
			?></p>
		</div>
		<?php
	}

} else {
	// no posts found
}

if($nvSPName>0) {
	normal_post_func($nvSPName,$nvPostId);
}
/* Restore original Post Data */
wp_reset_postdata();
}

function normal_post_func($total,$nvNOPost) {
	wp_reset_postdata();
	$newsAry = array( 'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => $total,
		'post__not_in' => $nvNOPost,
		'order' => 'DESC',
		'orderby' => 'post_date'
	);

	  $wp_query = new WP_Query($newsAry);
	  if($wp_query->have_posts()) :
		while ($wp_query->have_posts()) : $wp_query->the_post();

			$cats = get_the_category();
			$nvCatName = trim(get_field('category_colour', 'category_'.$cats[0]->cat_ID));
			if($nvCatName=="announcement") {
				$nvClass = "announcement";
			} else if($nvCatName=="alert") {
				$nvClass = "alert";
			} else {
				$nvClass = "news";
			}
			?>
				<div class="latest-news-container <?php echo $nvClass; ?>">
				  <h3><a href="<?php echo get_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
				  <p class="date-author"><?php echo the_time( 'M d, Y g:i a' ); ?></p>

				<p><?php
					echo get_the_excerpt();
				?></p>

				  <?php //the_excerpt(); ?>
				</div>
			<?php
			$nvNum = $nvNum + 1;
		endwhile;
	wp_reset_postdata();
	endif;
}

function get_top_parent_page_id() {
	global $post;

	if ($post->ancestors) {
		return end($post->ancestors);
	} else {
		return $post->ID;
	}
}

//Uses PHP 5.3+ anonymous functions. Use regular function if less than 5.3
add_filter('page_css_class', function($classes, $page) {
  global $post;
  if('page' == get_post_type($post) && $post->ID == $page->ID)
    $classes[] = 'active';
  return $classes;
}, 10, 2);

function remove_screen_options_tab() {
	return current_user_can( 'manage_options' );
}

add_filter('screen_options_show_screen', 'remove_screen_options_tab');




// Register Custom Post Type
function investor_news_func() {

	$labels = array(
		'name'                  => _x( 'Investor News', 'Post Type General Name', 'investright' ),
		'singular_name'         => _x( 'Investor News', 'Post Type Singular Name', 'investright' ),
		'menu_name'             => __( 'Investor News', 'investright' ),
		'name_admin_bar'        => __( 'Investor News', 'investright' ),
		'archives'              => __( 'Item Archives', 'investright' ),
		'parent_item_colon'     => __( 'Parent Item:', 'investright' ),
		'all_items'             => __( 'All Items', 'investright' ),
		'add_new_item'          => __( 'Add New Item', 'investright' ),
		'add_new'               => __( 'Add New', 'investright' ),
		'new_item'              => __( 'New Item', 'investright' ),
		'edit_item'             => __( 'Edit Item', 'investright' ),
		'update_item'           => __( 'Update Item', 'investright' ),
		'view_item'             => __( 'View Item', 'investright' ),
		'search_items'          => __( 'Search Item', 'investright' ),
		'not_found'             => __( 'Not found', 'investright' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'investright' ),
		'featured_image'        => __( 'Featured Image', 'investright' ),
		'set_featured_image'    => __( 'Set featured image', 'investright' ),
		'remove_featured_image' => __( 'Remove featured image', 'investright' ),
		'use_featured_image'    => __( 'Use as featured image', 'investright' ),
		'insert_into_item'      => __( 'Insert into item', 'investright' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'investright' ),
		'items_list'            => __( 'Items list', 'investright' ),
		'items_list_navigation' => __( 'Items list navigation', 'investright' ),
		'filter_items_list'     => __( 'Filter items list', 'investright' ),
	);
	$args = array(
		'label'                 => __( 'Investor News', 'investright' ),
		'description'           => __( 'Investor News', 'investright' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'investornews', $args );

}
//add_action( 'init', 'investor_news_func', 0 );

// Register Custom Taxonomy
function event_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Categories', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'event_category', array( 'event' ), $args );

}
add_action( 'init', 'event_taxonomy', 0 );


add_filter( 'get_the_archive_title', 'blahblah_get_the_archive_title');

function blahblah_get_the_archive_title($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_year() ) {
		$title = get_the_date( '', false );
	} elseif ( is_month() ) {
		$title = get_the_date( '', false );
	} elseif ( is_day() ) {
		$title = get_the_date( '', false );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	}
	return $title;
}

//////////

/**
 * Instantiates the class
 */
add_action( 'admin_init', array( 'call_someClass', 'init' ) );

/**
 * The Class
 */
class call_someClass {
    const LANG = 'exch_lang';

    public static function init() {
    $class = __CLASS__;
    new $class;
    }

    public function __construct() {
    // Abort if not on the nav-menus.php admin UI page - avoid adding elsewhere
    global $pagenow;
    if ( 'nav-menus.php' !== $pagenow )
                    return;

        $this->add_some_meta_box();
    }

    /**
     * Adds the meta box container
     */
    public function add_some_meta_box(){
        add_meta_box(
            'info_meta_box_'
            ,__( 'Example metabox', self::LANG )
            ,array( $this, 'render_meta_box_content' )
            ,'nav-menus' // important !!!
            ,'side' // important, only side seems to work!!!
            ,'high'
        );
    }

    /**
     * Render Meta Box content
     */
    public function render_meta_box_content() {?>
        <?php
$taxonomy_name = 'nav_menu';
$per_page = 50;
	$pagenum = isset( $_REQUEST[$taxonomy_name . '-tab'] ) && isset( $_REQUEST['paged'] ) ? absint( $_REQUEST['paged'] ) : 1;
	$offset = 0 < $pagenum ? $per_page * ( $pagenum - 1 ) : 0;

	$args = array(
		'child_of' => 0,
		'exclude' => '',
		'hide_empty' => false,
		'hierarchical' => 1,
		'include' => '',
		'number' => $per_page,
		'offset' => $offset,
		'order' => 'ASC',
		'orderby' => 'name',
		'pad_counts' => false,
	);
$terms = get_terms( 'nav_menu', array( 'hide_empty' => true ) );

if ( ! $terms || is_wp_error($terms) ) {
		echo '<p>' . __( 'No items.' ) . '</p>';
		return;
	}

	$num_pages = ceil( wp_count_terms( $taxonomy_name , array_merge( $args, array('number' => '', 'offset' => '') ) ) / $per_page );

	$page_links = paginate_links( array(
		'base' => add_query_arg(
			array(
				$taxonomy_name . '-tab' => 'all',
				'paged' => '%#%',
				'item-type' => 'taxonomy',
				'item-object' => $taxonomy_name,
			)
		),
		'format' => '',
		'prev_text' => __('&laquo;'),
		'next_text' => __('&raquo;'),
		'total' => $num_pages,
		'current' => $pagenum
	));

	$db_fields = false;
	if ( is_taxonomy_hierarchical( $taxonomy_name ) ) {
		$db_fields = array( 'parent' => 'parent', 'id' => 'term_id' );
	}

	$walker = new Walker_Nav_Menu_Checklist( $db_fields );

	$current_tab = 'most-used';
	if ( isset( $_REQUEST[$taxonomy_name . '-tab'] ) && in_array( $_REQUEST[$taxonomy_name . '-tab'], array('all', 'most-used', 'search') ) ) {
		$current_tab = $_REQUEST[$taxonomy_name . '-tab'];
	}

	if ( ! empty( $_REQUEST['quick-search-taxonomy-' . $taxonomy_name] ) ) {
		$current_tab = 'search';
	}

	$removed_args = array(
		'action',
		'customlink-tab',
		'edit-menu-item',
		'menu-item',
		'page-tab',
		'_wpnonce',
	);

	?>
	<div id="taxonomy-<?php echo $taxonomy_name; ?>" class="taxonomydiv">
		<ul id="taxonomy-<?php echo $taxonomy_name; ?>-tabs" class="taxonomy-tabs add-menu-item-tabs">
			<li <?php echo ( 'most-used' == $current_tab ? ' class="tabs"' : '' ); ?>>
				<a class="nav-tab-link" data-type="tabs-panel-<?php echo esc_attr( $taxonomy_name ); ?>-pop" href="<?php if ( $nav_menu_selected_id ) echo esc_url(add_query_arg($taxonomy_name . '-tab', 'most-used', remove_query_arg($removed_args))); ?>#tabs-panel-<?php echo $taxonomy_name; ?>-pop">
					<?php _e( 'Most Used' ); ?>
				</a>
			</li>
			<li <?php echo ( 'all' == $current_tab ? ' class="tabs"' : '' ); ?>>
				<a class="nav-tab-link" data-type="tabs-panel-<?php echo esc_attr( $taxonomy_name ); ?>-all" href="<?php if ( $nav_menu_selected_id ) echo esc_url(add_query_arg($taxonomy_name . '-tab', 'all', remove_query_arg($removed_args))); ?>#tabs-panel-<?php echo $taxonomy_name; ?>-all">
					<?php _e( 'View All' ); ?>
				</a>
			</li>
			<li <?php echo ( 'search' == $current_tab ? ' class="tabs"' : '' ); ?>>
				<a class="nav-tab-link" data-type="tabs-panel-search-taxonomy-<?php echo esc_attr( $taxonomy_name ); ?>" href="<?php if ( $nav_menu_selected_id ) echo esc_url(add_query_arg($taxonomy_name . '-tab', 'search', remove_query_arg($removed_args))); ?>#tabs-panel-search-taxonomy-<?php echo $taxonomy_name; ?>">
					<?php _e( 'Search' ); ?>
				</a>
			</li>
		</ul><!-- .taxonomy-tabs -->

		<div id="tabs-panel-<?php echo $taxonomy_name; ?>-pop" class="tabs-panel <?php
			echo ( 'most-used' == $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' );
		?>">
			<ul id="<?php echo $taxonomy_name; ?>checklist-pop" class="categorychecklist form-no-clear" >
				<?php
				$popular_terms = get_terms( $taxonomy_name, array( 'orderby' => 'count', 'order' => 'DESC', 'number' => 10, 'hierarchical' => false ) );
				$args['walker'] = $walker;
				echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $popular_terms), 0, (object) $args );
				?>
			</ul>
		</div><!-- /.tabs-panel -->

		<div id="tabs-panel-<?php echo $taxonomy_name; ?>-all" class="tabs-panel tabs-panel-view-all <?php
			echo ( 'all' == $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' );
		?>">
			<?php if ( ! empty( $page_links ) ) : ?>
				<div class="add-menu-item-pagelinks">
					<?php echo $page_links; ?>
				</div>
			<?php endif; ?>
			<ul id="<?php echo $taxonomy_name; ?>checklist" data-wp-lists="list:<?php echo $taxonomy_name?>" class="categorychecklist form-no-clear">
				<?php
				$args['walker'] = $walker;
				echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $terms), 0, (object) $args );
				?>
			</ul>
			<?php if ( ! empty( $page_links ) ) : ?>
				<div class="add-menu-item-pagelinks">
					<?php echo $page_links; ?>
				</div>
			<?php endif; ?>
		</div><!-- /.tabs-panel -->

		<div class="tabs-panel <?php
			echo ( 'search' == $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' );
		?>" id="tabs-panel-search-taxonomy-<?php echo $taxonomy_name; ?>">
			<?php
			if ( isset( $_REQUEST['quick-search-taxonomy-' . $taxonomy_name] ) ) {
				$searched = esc_attr( $_REQUEST['quick-search-taxonomy-' . $taxonomy_name] );
				$search_results = get_terms( $taxonomy_name, array( 'name__like' => $searched, 'fields' => 'all', 'orderby' => 'count', 'order' => 'DESC', 'hierarchical' => false ) );
			} else {
				$searched = '';
				$search_results = array();
			}
			?>
			<p class="quick-search-wrap">
				<label for="quick-search-taxonomy-<?php echo $taxonomy_name; ?>" class="screen-reader-text"><?php _e( 'Search' ); ?></label>
				<input type="search" class="quick-search" value="<?php echo $searched; ?>" name="quick-search-taxonomy-<?php echo $taxonomy_name; ?>" id="quick-search-taxonomy-<?php echo $taxonomy_name; ?>" />
				<span class="spinner"></span>
				<?php submit_button( __( 'Search' ), 'button-small quick-search-submit button-secondary hide-if-js', 'submit', false, array( 'id' => 'submit-quick-search-taxonomy-' . $taxonomy_name ) ); ?>
			</p>

			<ul id="<?php echo $taxonomy_name; ?>-search-checklist" data-wp-lists="list:<?php echo $taxonomy_name?>" class="categorychecklist form-no-clear">
			<?php if ( ! empty( $search_results ) && ! is_wp_error( $search_results ) ) : ?>
				<?php
				$args['walker'] = $walker;
				echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $search_results), 0, (object) $args );
				?>
			<?php elseif ( is_wp_error( $search_results ) ) : ?>
				<li><?php echo $search_results->get_error_message(); ?></li>
			<?php elseif ( ! empty( $searched ) ) : ?>
				<li><?php _e('No results found.'); ?></li>
			<?php endif; ?>
			</ul>
		</div><!-- /.tabs-panel -->

		<p class="button-controls wp-clearfix">
			<span class="list-controls">
				<a href="<?php
					echo esc_url(add_query_arg(
						array(
							$taxonomy_name . '-tab' => 'all',
							'selectall' => 1,
						),
						remove_query_arg($removed_args)
					));
				?>#taxonomy-<?php echo $taxonomy_name; ?>" class="select-all"><?php _e('Select All'); ?></a>
			</span>

			<span class="add-to-menu">
				<input type="submit"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?> class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e( 'Add to Menu' ); ?>" name="add-taxonomy-menu-item" id="<?php echo esc_attr( 'submit-taxonomy-' . $taxonomy_name ); ?>" />
				<span class="spinner"></span>
			</span>
		</p>

	</div><!-- /.taxonomydiv -->
  <?php  }
}

add_action('admin_enqueue_scripts', 'my_admin_script');
function my_admin_script()
{
    wp_enqueue_script('my-admin', get_bloginfo('template_url').'/my-admin.js', array('jquery'));
}

    add_filter( 'meta_content', 'wptexturize'        );
    add_filter( 'meta_content', 'convert_smilies'    );
    add_filter( 'meta_content', 'convert_chars'      );
    add_filter( 'meta_content', 'wpautop'            );
    add_filter( 'meta_content', 'shortcode_unautop'  );
    add_filter( 'meta_content', 'prepend_attachment' );

	// ---------------------------------

	function register_first_custom_dashboard_widget() {
     global $wp_meta_boxes;

    wp_add_dashboard_widget(
        'my_first_custom_dashboard_widget',
        'Traning Videos',
        'my_first_custom_dashboard_widget_display'
    );

     $dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

    $my_widget = array( 'my_first_custom_dashboard_widget' => $dashboard['my_first_custom_dashboard_widget'] );
     unset( $dashboard['my_first_custom_dashboard_widget'] );

     $sorted_dashboard = array_merge( $my_widget, $dashboard );
     $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action( 'wp_dashboard_setup', 'register_first_custom_dashboard_widget' );

function my_first_custom_dashboard_widget_display() {
  the_widget( 'wpb_widget' );
}

	//------------------



add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Default Sidebar', 'theme-slug' ),
        'id' => 'default-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}




// Creating the widget
class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpb_widget',

// Widget name will appear in UI
__('Traning Video', 'wpb_widget_domain'),

// Widget description
array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), )
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
//echo __( 'Hello, World!', 'wpb_widget_domain' );
$custom_widget = maybe_unserialize(get_option( 'widget_wpb_widget' ));
$count = count($custom_widget);
foreach($custom_widget as $c_widget)
{
?>
<h3><?php echo $c_widget["title"]; ?></h3>
<?php
echo $content = apply_filters('the_content', $c_widget["url"]);
}

echo $args['after_widget'];
}



// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
if ( isset( $instance[ 'url' ] ) ) {
$url = $instance[ 'url' ];
}
else {
$url = __( 'Add Url', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="url" value="<?php echo esc_attr( $title ); ?>" /></p>
<p>
<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Url:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="url" value="<?php echo esc_attr( $url ); ?>" /></p>

<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

add_action( 'admin_init', 'send_frame_options_header', 10, 0 );


//Open all PDF/DOC File in new window

//function wp_change_target($content){
//	return preg_replace_callback('/<a[^>]+/', 'wp_target_callback', $content);
//}
//
//function wp_target_callback($matches){
//	$link = $matches[0];
//	$mu_url = get_bloginfo('url');
//
//	if (strpos($link, 'target') === false){
//		$link = preg_replace("%(href=\S(?!$mu_url))%i", 'target="_blank" $1', $link);
//	}elseif (preg_match("%href=\S(?!$mu_url)%i", $link)){
//		$link = preg_replace('/target=S(?!_blank)\S*/i', 'target="_blank"', $link);
//	}
//	return $link;
//}
//add_filter('the_content', 'wp_change_target');

add_action('admin_footer', 'replace_the_mapress_text_with_venue');
function replace_the_mapress_text_with_venue() { ?>
	<script>
	jQuery(document).ready(function(e) {
        jQuery( "#mappress > h2 > span" ).replaceWith( "Venue" );

    });
    </script>
<?php }

remove_filter('the_content','wpautop');

//decide when you want to apply the auto paragraph

add_filter('the_content','my_custom_formatting');

function my_custom_formatting($content){
	if(get_post_type()=='post') {//if it does not work, you may want to pass the current post object to get_post_type
		//return $content;//no autop
		$br = false;
		return wpautop( $content, $br );
	} else {
	 	$br = true;
		return wpautop( $content, $br );
	}
}

function prefix_featured_image_meta( $content ) {
    global $post;
	$text = __( 'Open a new window.', 'prefix' );
    $id = 'new_featured_image';
    $value = esc_attr ( get_post_meta( $post->ID, $id, true ) );
	$label .= '<label for="' . $id . '" class="selectit"><input name="' . $id . '" type="checkbox" id="' . $id . '" value="' . $value . ' "'. checked( $value, 1, false) .'> ' . $text .'</label><br>';
    $text1 = __( 'Url :', 'prefix' );
    $id1 = 'url_featured_image';
    $value1 = esc_attr( get_post_meta( $post->ID, $id1, true ) );
    $label .= '<br><label for="' . $id1 . '" class="selectit">' . $text1 .' <input name="'.$id1.'" type="text" id="'.$id1.'" value="'.$value1.'" placeholder="http://url.com"> </label>';
    return $content .= $label;
}
add_filter( 'admin_post_thumbnail_html', 'prefix_featured_image_meta' );

function prefix_save_featured_image_meta( $post_id, $post, $update ) {

    $value = 0;
    if ( isset( $_REQUEST['new_featured_image'] ) ) {
        $value = 1;
    }

	$url = "";
    if ( isset( $_REQUEST['url_featured_image'] ) ) {
        $url = $_REQUEST['url_featured_image'];
    }
    // Set meta value to either 1 or 0
    update_post_meta( $post_id, 'new_featured_image', $value );
	update_post_meta( $post_id, 'url_featured_image', $url);

}
add_action( 'save_post', 'prefix_save_featured_image_meta', 10, 3 );

add_shortcode('iframe', 'ag_iframe');

function ag_iframe($atts, $content) {
	if (!$atts['width']) { $atts['width'] = 560; }
	if (!$atts['height']) { $atts['height'] = 315; }
	return '<iframe border="0" src="' . $atts['src'] . '?rel=0&amp;showinfo=0" width="' . $atts['width'] . '" height="' . $atts['height'] . '"></iframe>';
}

require( 'wptuts-editor-buttons/wptuts.php' );


/* custom code by neeraj for click counting */
add_action( 'wp_ajax_ivr_view_counter', 'ivr_view_counter' );
add_action( 'wp_ajax_nopriv_ivr_view_counter', 'ivr_view_counter' );
function ivr_view_counter()
{
    if ( isset($_REQUEST) ) {

        $pid = $_REQUEST['id'];
        // get_current_counter
        $counter = get_post_meta($pid,'ivr_total_click_counter',true);
        if($counter)
        {
            echo $counter = $counter+1;
            update_post_meta($pid,'ivr_total_click_counter',$counter);
        }
        else
        {
            update_post_meta($pid,'ivr_total_click_counter',1);
        }
    }
    die();
}

// dashboard widget

function ivr_click_counter_dashboard_widgets_function(){
  # We are defining the dashboard widget function and giving our widget some contents.
  $post = get_post_meta(5116,'ivr_total_click_counter',true);
  $count = ($post) ? $post : 0;
  echo 'No. of times the Calculate button has been clicked since Nov-02nd =  <strong>'.$count.'</strong>';
}

function ivr_click_counter_dashboard_widgets(){
  # we defining a function to hook to the wp_dashboard_setup action
  wp_add_dashboard_widget(
	'widget_id',
	'No. of clicks',
	'ivr_click_counter_dashboard_widgets_function'
	# giving our widget an id, title and contents
	# the contents of the widget are that of our dashboard_widget_function()
  );
}

add_action('wp_dashboard_setup', 'ivr_click_counter_dashboard_widgets');

function gv_excerpt_word_count_js() {
      echo '<script>jQuery(document).ready(function(){
jQuery("#postexcerpt #excerpt").after("<b>Excerpt maximum 120 character</b>. Character Count: <strong><span id=\'excerpt-word-count\'></span></strong>");
     jQuery("#excerpt-word-count").html(jQuery("#excerpt").val().length);
     jQuery("#excerpt").keyup( function() {
     jQuery("#excerpt-word-count").html(jQuery("#excerpt").val().length);
   });
});</script>';
}
add_action( 'admin_head-post.php', 'gv_excerpt_word_count_js');
add_action( 'admin_head-post-new.php', 'gv_excerpt_word_count_js');

/*
 * Sechedule post 
 */

/*global $wpdb;

$scheduledIDs = $wpdb->get_col( "SELECT`ID`FROM `{$wpdb->posts}` " . " WHERE ( " . " ( ( `post_date` > 0 ) && ( `post_date` <= CURRENT_TIMESTAMP() ) ) OR " . " ( ( `post_date_gmt` > 0 ) && ( `post_date_gmt` <= UTC_TIMESTAMP() ) ) " . " ) AND `post_status` = 'future' LIMIT 0,10" );


        if ( ! count( $scheduledIDs ) )
                return;

        foreach ( $scheduledIDs as $scheduledID )
                {
                        if ( ! $scheduledID )
                                continue;

                        wp_publish_post( $scheduledID );
                }

				*/
function wpmlsupp_1706_reset_wpml_capabilities() {
    if ( function_exists( 'icl_enable_capabilities' ) ) {
        icl_enable_capabilities();
    }
}
add_action( 'shutdown', 'wpmlsupp_1706_reset_wpml_capabilities' );

/*********** Create a shortcode for social share ********/
// Add Shortcode
function social_share() {

	$outpot.='<div class="share-icon editor">';
	$outpot.='<span class="FPM17-shareTxt">SHARE   </span>';
	$outpot.= "<span class='st_facebook_large' displayText='Facebook'></span><span class='seprator'></span>";
	$outpot.="<span class='st_twitter_large' displayText='Tweet'></span><span class='seprator'></span>";
	$outpot.="<span class='st_email_large' displayText='email'></span></div>";
        return $outpot;
}
add_shortcode( 'socialshare', 'social_share' );

remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

function custom_glossary() {

	$labels = array(
		'name'                  => _x( 'glossaries', 'Post Type General Name', 'cto' ),
		'singular_name'         => _x( 'glossary', 'Post Type Singular Name', 'cto' ),
		'menu_name'             => __( 'Glossary', 'cto' ),
		'name_admin_bar'        => __( 'Glossary', 'cto' ),
		'archives'              => __( 'Item Archives', 'cto' ),
		'attributes'            => __( 'Item Attributes', 'cto' ),
		'parent_item_colon'     => __( 'Parent Item:', 'cto' ),
		'all_items'             => __( 'All Items', 'cto' ),
		'add_new_item'          => __( 'Add New Item', 'cto' ),
		'add_new'               => __( 'Add New', 'cto' ),
		'new_item'              => __( 'New Item', 'cto' ),
		'edit_item'             => __( 'Edit Item', 'cto' ),
		'update_item'           => __( 'Update Item', 'cto' ),
		'view_item'             => __( 'View Item', 'cto' ),
		'view_items'            => __( 'View Items', 'cto' ),
		'search_items'          => __( 'Search Item', 'cto' ),
		'not_found'             => __( 'Not found', 'cto' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'cto' ),
		'featured_image'        => __( 'Featured Image', 'cto' ),
		'set_featured_image'    => __( 'Set featured image', 'cto' ),
		'remove_featured_image' => __( 'Remove featured image', 'cto' ),
		'use_featured_image'    => __( 'Use as featured image', 'cto' ),
		'insert_into_item'      => __( 'Insert into item', 'cto' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'cto' ),
		'items_list'            => __( 'Items list', 'cto' ),
		'items_list_navigation' => __( 'Items list navigation', 'cto' ),
		'filter_items_list'     => __( 'Filter items list', 'cto' ),
	);
	$args = array(
		'label'                 => __( 'glossary', 'cto' ),
		'description'           => __( 'Post Type Description', 'cto' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'page-attributes', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'glossary', $args );

}
add_action( 'init', 'custom_glossary', 0 );

add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
function title_like_posts_where( $where, &$wp_query ) {
    global $wpdb;
    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
    }
    return $where;
}