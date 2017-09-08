<?php

//add_action('admin_init', 'add_meta_boxes', 1);
function add_meta_boxes() {
	add_meta_box( 'repeatable-fields', 'Create Anchor Links', 'repeatable_meta_box_display', array('page','post'), 'normal', 'high');
	//add_meta_box( 'main-index-content', 'Main Level Index Contents', 'main_level_index_content_display', array('page','post'), 'normal', 'high');
}

function repeatable_meta_box_display() {
	global $post;

	$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);


	wp_nonce_field( 'repeatable_meta_box_nonce', 'repeatable_meta_box_nonce' );
?>
	<script type="text/javascript">
jQuery(document).ready(function($) {
	$('.metabox_submit').click(function(e) {
		e.preventDefault();
		$('#publish').click();
	});
	$('#add-row').on('click', function() {
		var row = $('.empty-row.screen-reader-text').clone(true);
		row.removeClass('empty-row screen-reader-text');
		row.insertBefore('#repeatable-fieldset-one tbody>tr:last');
		return false;
	});
	$('.remove-row').on('click', function() {
		$(this).parents('tr').remove();
		return false;
	});

	$('#repeatable-fieldset-one tbody').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});
	tinyMCE.execCommand('mceAddControl', true, '.texteditor1'); 
});
	</script>

	<table id="repeatable-fieldset-one" width="100%">
	<tbody>
	<?php

	if ( $repeatable_fields ) :

		foreach ( $repeatable_fields as $field ) {
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="heading[]" value="<?php if($field['heading'] != '') echo esc_attr( $field['heading'] ); ?>" /><br/><br/><textarea name="extra_content[]" class="texteditor1" rows="6" cols="80"><?php if ($field['extra_content'] != '') echo esc_attr( $field['extra_content'] ); else echo ''; ?>  </textarea></td>
		<td><a class="sort">|||</a></td>
		
	</tr>
	<?php
		}
	else :
		// show a blank one
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="heading[]" /><br/></br><textarea class="texteditor1" name="extra_content[]" rows="6" cols="80"></textarea></td>
        <td><a class="sort">|||</a></td>
		
	</tr>
	<?php endif; ?>

	<!-- empty hidden one for jQuery -->
	<tr class="empty-row screen-reader-text">
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="heading[]" /><br/></br><textarea class="texteditor1" name="extra_content[]" rows="6" cols="80"></textarea></td>
<td><a class="sort">|||</a></td>
		
	</tr>
	</tbody>
	</table>

	<p><a id="add-row" class="button" href="#">Add another</a>
	<input type="submit" class="metabox_submit" value="Save" />
	</p>
	
	<?php
}

add_action('save_post', 'repeatable_meta_box_save');
function repeatable_meta_box_save($post_id) {
	if ( ! isset( $_POST['repeatable_meta_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['repeatable_meta_box_nonce'], 'repeatable_meta_box_nonce' ) )
		return;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if (!current_user_can('edit_post', $post_id))
		return;

	$old = get_post_meta($post_id, 'repeatable_fields', true);
	$new = array();


	$names = $_POST['heading'];
	$urls = $_POST['extra_content'];

	$count = count( $names );

	for ( $i = 0; $i < $count; $i++ ) {
		if ( $names[$i] != '' ) :
			$new[$i]['heading'] = stripslashes( strip_tags( $names[$i] ) );


		if ( $urls[$i] == 'http://' )
			$new[$i]['extra_content'] = '';
		else
			$new[$i]['extra_content'] = stripslashes( $urls[$i] ); // and however you want to sanitize
		endif;
	}

	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'repeatable_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'repeatable_fields', $old );
}