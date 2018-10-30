<?php 
/* Template Name: SiteMap Template*/
get_header();
?>

 <!-- Body Content -->
  <div class="container-innerpage">
    <div class="row">
      <?php get_sidebar();?>
      <article class="content-wrap">
        <div class="breadcrumb"> 
		<strong>You are here:</strong> 
		<?php
			if(function_exists('bcn_display')) {
				bcn_display();
			}
       ?>
		</div>
		<?php while (have_posts()) : the_post(); ?>
        <h1 class="page-title"><?php the_title();?></h1>
        <div class="editor-content">
          <div class="share-icon">
			SHARE&nbsp;&nbsp;<!--a href="http://www.facebook.com/sharer.php?u=<?php the_permalink()?>" target="_blank"><img src="<?php bloginfo('template_url')?>/images/icon/facebook.png" alt="share on facebook"></a>
			<a href="https://twitter.com/share?url=<?php the_permalink()?>&amp;text=Investright&amp;hashtags=Investright" target="_blank"><img src="<?php bloginfo('template_url')?>/images/icon/twitter.png" alt="share on twitter"></a>
			<a href="http://vkontakte.ru/share.php?url=<?php the_permalink();?>" target="_blank"><img src="<?php bloginfo('template_url')?>/images/icon/share.png" alt="share"></a-->
			<span class='st_facebook_large' displayText='Facebook'></span>
			<span class='st_twitter_large' displayText='Tweet'></span>
			<span class='st_sharethis_large' displayText='ShareThis'></span>
			</div>
			<?php the_content();?>
			<?php 
				$sitemap = array(
					'theme_location'  => 'site_map',
					'menu'            => 'site_map', 
					'container'       => false, 
					'container_class' => '',
					'container_id'    => '',
					'echo'            => true,
					'fallback_cb'     => false,
					'depth'           => 0,
				);
				
				if (!empty($sitemap)){
					wp_nav_menu( $sitemap );
				}
			?>
        </div>
		<?php endwhile;?>
      </article>

    </div>
  </div>


<?php get_footer(); ?>