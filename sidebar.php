<?php
if(ICL_LANGUAGE_CODE=="en") {
	$parent_id = get_top_parent_page_id();

	if(is_singular('event'))
		$parent_id=210;
	
	if(is_singular('post'))
		$parent_id=210;
	
	if(is_archive('post'))
		$parent_id=210;
	
	if(is_singular('investornews'))
		$parent_id=210;
	
	if(is_archive('investornews'))
		$parent_id=210;
	
	$children = get_pages( array( 'child_of' => $parent_id ) );
	if(count($children)==0) {
		$parent_id=215;
	}
?>

<aside class="sidebar">

<ul class="side-nav">
<?php wp_list_pages( array(	'child_of' => $parent_id,'title_li'=>'') ); ?>

		<?php		
		/*$args = array(
					'sort_order' => 'asc',
					'sort_column' => 'post_title',
					'hierarchical' => 0,
					'exclude' => '',
					'include' => '',
					'meta_key' => '',
					'meta_value' => '',
					'authors' => '',
					'child_of' => $parent_id[0],
					'parent' => -1,
					'exclude_tree' => '',
					'number' => '',
					'offset' => 0,
					'post_type' => 'page',
					'post_status' => 'publish'
					); 
		$pages = get_pages($args); //print_r($pages);
	
	foreach ($pages as $page1) {?>
				<li><a href="<?php echo get_permalink($page1->ID)?>"><?php echo $page1->post_title;?></a></li>
	<?php	}*/?>


</ul>
</aside>
<?php 
}
?>