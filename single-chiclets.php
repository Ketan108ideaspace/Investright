<?php 
get_header();
?>

 <!-- Body Content -->
  <div class="container-innerpage">
    <div class="row">
      
        <div class="breadcrumb"> <strong>You are here:</strong> 
		<?php
			if(function_exists('bcn_display')) {
				bcn_display();
			}
       ?>
		</div>
		<div class="editor-content no-padding">
		<?php
		
		if( have_posts() ) : 
			while( have_posts() ) : the_post();
			?>
				<h1><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
			<?php
			endwhile;
		endif;		  
		?>
	  
    </div>
  </div>
</div>

<?php get_footer(); ?>