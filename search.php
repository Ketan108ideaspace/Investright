<?php get_header(); ?>
 
  <!-- Body Content -->
  <div class="container-innerpage">
    <div class="row">
   	  
        <div class="breadcrumb"> <strong>You are here:</strong> <a href="<?php echo home_url() ?>">Home</a> / Search Results </div>
        <h1 class="page-title"><?php _e( "Search Results:", "investright" ); ?> <?php echo $_REQUEST['s']; ?></h1>
        <?php
			$nvPaged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			$nvWpQry = new WP_Query(array('s'=>$_GET['s'], 'paged'=>$nvPaged, 'order'=>'DESC'));
			if ($nvWpQry->have_posts()) :
		
			$nvPerPage = get_query_var('posts_per_page');
			$end = $nvPerPage * $nvPaged;
			$start = $end - $nvPerPage + 1;
			$nvPosts = $nvWpQry->found_posts;
			if($end>$nvPosts) {
				$end = $nvPosts;
			}
		
		?>
        <div class="editor-content">
		
		<h2>Results <?php echo $start; ?> - <?php echo $end;?> of <?php echo $nvPosts; ?></h2>
        	
        <?php wp_pagenavi(array('query'=>$nvWpQry)); ?>
          <div class="clear"></div>
          <?php while ($nvWpQry->have_posts()) : $nvWpQry->the_post();
		  
		  if(get_post_type() == 'post') {
		  ?>
          <div class="search-result-wrap <?php echo get_post_type( get_the_ID()); ?>">
			  <h3><a href="<?php the_permalink();?>"><?php the_title()?></a></h3>
			  <p class="date"><?php echo the_time( 'M d, Y g:i a' ); ?></p>
			  <?php //echo strip_tags(the_excerpt());?>
			  <?php the_advanced_excerpt('exclude_tags=p,img'); ?>
			  </div>
		  <?php } else { ?>			  
			  <div class="search-result-wrap <?php echo get_post_type( get_the_ID()); ?>">
			  <h3><a href="<?php the_permalink();?>"><?php the_title()?></a></h3>
			  <?php //echo strip_tags(the_excerpt());?>
			  <?php the_advanced_excerpt('exclude_tags=p,img'); ?>
			  </div>
		  <?php } ?>
         <?php endwhile;?>
        </div>
        <div class="row">
          <div class="content-search-wrap">                                
         <form action="<?php echo home_url( '/' ); ?>" method="get">
          <input type="search" placeholder="SITE SEARCH" class="content-search-field" value="<?php echo get_search_query() ?>" name="s">
          <label for="search" class="hidden"></label>
          <input type="image" src="<?php echo $template_url; ?>/images/icon/search-2.png" class="content-search-btn" alt="search in the site">
		</form>

          </div>
        <?php wp_pagenavi(array('query'=>$nvWpQry)); ?>
                </div>
         <?php  else: ?>
		 <div class="editor-content">
 		 <h2><?php _e('Sorry, no posts matched your criteria.'); ?></h2>
		 </div>
         <?php endif; ?>

    </div>
  </div>
 
<?php get_footer(); ?>
