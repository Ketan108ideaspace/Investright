<?php 
/* Template Name: Personality Quiz V2 Template*/
get_header();
?>
<link href="<?php echo $template_url; ?>/pquiz.css" rel="stylesheet" type="text/css">

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
		<div class="editor-content">
		<?php
		
		if( have_posts() ) : 
			while( have_posts() ) : the_post();
			?>
				<h1 class="page-title"><?php the_title(); ?></h1>
                <div class="pquiz-grn-box"><p><?php the_excerpt(); ?></p></div>
				<div class="pquiz-content"><?php the_content(); ?></div>
			<?php
			endwhile;
		endif;		  
		?>
	  
    </div>
  </div>
</div>

<?php get_footer(); ?>