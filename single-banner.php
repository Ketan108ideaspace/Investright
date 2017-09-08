<?php get_header(); ?>
<?php
	wp_reset_query();
	if(have_posts()) :
		while (have_posts()) : the_post();
		?>
			<p><?php the_content(); ?></p>
		<?php
		endwhile;
	wp_reset_postdata();
	endif;
?>
<?php get_footer(); ?>