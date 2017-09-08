<?php
get_header();
?>
  <!-- Main Menu -->
  
  <!-- Body Content -->
  
<div class="container-innerpage">
	<div class="row">
	  <?php get_sidebar();?>
	  <article class="content-wrap">
		<div class="breadcrumb"> <strong>You are here:</strong>
		  <?php if(function_exists('bcn_display'))
		{
			bcn_display();
		}?>
		</div>
		
		<div class="editor-content">
			<?php
			$nvNo = 1;
			
			for ($i=65; $i <= 90; $i++) {
				$nvArgs = array(
					'post_type' => 'glossary', 
					'post_status' => 'publish', 
					'pagination' => true,
					'orderby' => 'title',
					'order' => 'ASC'
				);
				if( !empty( chr($i) ) ) {
					$nvArgs['post_title_like'] = "".chr($i)."";
				}
				$nvWpQry = new WP_Query($nvArgs);
				
				if($nvNo == 1) {
					$nvAbcNo = $i;
					echo chr($nvAbcNo++)."".chr($nvAbcNo++);
					if("["!=chr($nvAbcNo++)) {
						echo chr($nvAbcNo++);
					}
				}
				
				if ($nvWpQry->have_posts()) {?>
					<div class="glossary-accordion">
					<?php while ( $nvWpQry->have_posts() ) : $nvWpQry->the_post();?>
						<h4><?php the_title(); ?></h4>
					<?php
					endwhile; ?>
					</div>
				<?php
				}
				if($nvNo == 3) {
					$nvNo = 0;
				}
				$nvNo++;
			}
			?>
		</div>
		
		
	  </article>
	</div>
</div>
<?php
get_footer();
?>
