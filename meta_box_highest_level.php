<?php
function main_level_index_content_display() {
	global $post;

	$repeatable_fields = get_post_meta($post->ID, 'main_level_index_fields', true);


	wp_nonce_field( 'main_level_index_meta_box_nonce', 'main_level_index_meta_box_nonce' );
?>
	<script type="text/javascript">
jQuery(document).ready(function($) {
	$('.metabox_submit1').click(function(e) {
		e.preventDefault();
		$('#publish').click();
	});
	$('#add-row1').on('click', function() {
		var row = $('.empty-row1.screen-reader-text1').clone(true);
		row.removeClass('empty-row1 screen-reader-text1');
		row.insertBefore('#repeatable-fieldset-one1 tbody>tr:last');
		return false;
	});
	$('.remove-row1').on('click', function() {
		$(this).parents('tr').remove();
		return false;
	});

	$('#repeatable-fieldset-one1 tbody').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});
});
	</script>

	<table id="repeatable-fieldset-one1" width="100%">
	<thead>
	<th>ID</th>
	<th>Page Title</th>
	</thead>
	<tbody>
	<?php

	if ( $repeatable_fields ) :

		foreach ( $repeatable_fields as $field ) {
?>
	<tr>
		<td><?php echo $post->ID;?></td>
		<td><label><?php echo $post->post_title?><input type="hidden" name="page_order[]" value="<?php echo $post->ID;?>"/></label>
        </td>
		<td><a class="sort">|||</a></td>
		
	</tr>
	<?php
		}
	else :
		// show a blank one
		$args = array(
	    'post_parent' =>  $post->ID,
	    'post_type'   => 'page', 
	    'numberposts' => -1,
	    'post_status' => 'publish' 
        ); 

		 $children_pages = get_children( $args, $output ); 
		 foreach($children_pages as $child):
?>
	<tr>
		<td><?php echo $child->ID;?></td>
		<td><label><?php echo  $child->post_title?><input type="hidden" name="page_order[]" value="<?php echo  $child->ID;?>"/></label>
        </td>
		<td><a class="sort">|||</a></td>
		
	</tr>
	<?php 
    endforeach;
	endif; 
$args = array(
	    'post_parent' =>  $post->ID,
	    'post_type'   => 'page', 
	    'numberposts' => -1,
	    'post_status' => 'publish' 
        ); 

		 $children_pages = get_children( $args );
		// print_r($children_pages); 
		 foreach($children_pages as $child):

	?>
	<tr class="empty-row1 screen-reader-text1">
		<td><?php echo $child->ID;?></td>
		<td><label><?php echo  $child->post_title?><input type="hidden" name="page_order[]" value="<?php echo  $child->ID;?>"/></label>
        </td>
		<td><a class="sort">|||</a></td>
		
	</tr>
	<!-- empty hidden one for jQuery -->
	
	<?php endforeach;?>
	</tbody>
	</table>

	<p><a id="add-row1" class="button" href="#">Add another</a>
	<input type="submit" class="metabox_submit1" value="Save" />
	</p>
	
	<?php
}

add_action('save_post', 'main_level_index_content_save');
function main_level_index_content_save($post_id) {
	if ( ! isset( $_POST['main_level_index_meta_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['main_level_index_meta_box_nonce'], 'main_level_index_meta_box_nonce' ) )
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


		if ( $urls[$i] == '' )
			$new[$i]['extra_content'] = '';
		else
			$new[$i]['extra_content'] = stripslashes( $urls[$i] ); // and however you want to sanitize
		endif;
	}

	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'main_level_index_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'main_level_index_fields', $old );
}