<?php
/*
//$ndLng = ICL_LANGUAGE_CODE;
$ndLng = "en";
if($ndLng=="en") {
	$parent_id = get_top_parent_page_id();

	if(is_singular('event')) {
		$parent_id=210;
	}
	
	if(is_singular('post')) {
		$parent_id=210;
	}
	
	if(is_archive('post')) {
		$parent_id=210;
	}
	
	if(is_singular('investornews')) {
		$parent_id=210;
	}
	
	if(is_archive('investornews')) {
		$parent_id=210;
	}
	
	$children = get_pages( array( 'child_of' => $parent_id ) );
	if(count($children)==0) {
		$parent_id=215;
	}
	?>
	<aside class="sidebar">
		<ul class="side-nav">
			<?php wp_list_pages( array(	'child_of' => $parent_id,'title_li'=>'') ); ?>
		</ul>
		<?php
			if( have_rows('sidebar_chiclets_items') ):
				echo '<div class="optional-widget">';
				while ( have_rows('sidebar_chiclets_items') ) : the_row();
					if( get_sub_field('chiclets_visible') == true ) {
						$chiclets_image = get_sub_field("chiclets_image");
						
						$chiclets_title = get_sub_field('chiclets_title');
						$chiclets_link = get_sub_field('chiclets_link');
						$chiclets_open_link = get_sub_field('chiclets_open_link');
						$nvOnclickEvent = get_sub_field( 'chiclets_google_onclick_code' );
						$nvEvent = "";
						if($nvOnclickEvent!="") {
							$nvEvent = 'onclick="'.$nvOnclickEvent.'"';
						}
						$nvTarget = "";
						if($chiclets_open_link==true) { $nvTarget = 'target="_blank"'; }
						
						if($chiclets_image!="") { ?>
							<div class="widget-chk-2"><a href="<?php echo $chiclets_link; ?>" <?php echo $nvTarget; ?> <?php echo $nvEvent; ?>><img src="<?php echo $chiclets_image; ?>"><span><?php echo $chiclets_title; ?></span></a></div>
						<?php } else { ?>
							<div class="widget-chk-1"><a href="<?php echo $chiclets_link; ?>" <?php echo $nvTarget; ?> <?php echo $nvEvent; ?>><?php echo $chiclets_title; ?><span class="icon iconset icon-arrowRight"></span></a></div>
						<?php }
					}
				endwhile;
				echo '</div>';
			endif;
		?>
	</aside>
<?php 
}*/
?>
