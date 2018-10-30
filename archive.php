<?php get_header();?>  
  <!-- Main Menu -->
  
  <!-- Body Content -->
  <div class="container-innerpage">
    <div class="row">
    <?php get_sidebar();?>
      <article class="content-wrap">
        <div class="breadcrumb"> <strong>You are here:</strong>  <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?> </div>
        <h1 class="page-title"><?php the_archive_title(); ?></h1>
         <?php if (have_posts()) : ?>
        <div class="editor-content">
          <h2>Articles 1 - 5 of 238</h2>
          <?php wp_pagenavi(); ?>
          <div class="clear"></div>
          <div class="select-group">
            <div class="row">
			<input type="hidden" name="archivepagelink" id="archivepagelink" value="<?php echo get_post_type_archive_link("post"); ?>">
              <div class="select-wrap">
              	<?php $args = array(
					  'show_option_all'    => '',
					  'show_option_none'   => '',
					  'option_none_value'  => '-1',
					   'orderby'            => 'ID',
					   'order'              => 'ASC',
					   'show_count'         => 0,
					   'hide_empty'         => 1,
					   'child_of'           => 0,
					   'exclude'            => '',
					   'include'            => '',
					   'echo'               => 1,
					   'selected'           => 0,
					   'hierarchical'       => 0,
					   'name'               => 'cat',
					   'id'                 => '',
					   'class'              => 'postform',
					   'depth'              => 0,
					   'tab_index'          => 0,
					   'taxonomy'           => 'category',
					   'hide_if_empty'      => false,
					   'value_field'	     => 'term_id',
                    ); ?>
                
                <?php wp_dropdown_categories( $args ); ?> 

              </div>
              <div class="select-wrap">
              <select name="archive-dropdown">
  			  <option value=""><?php echo esc_attr( __( 'Select Month/Year' ) ); ?></option>
              <?php wp_get_archives( 'type=monthly&format=option&show_post_count=0' ); ?>
              </select>              
              </div>
              <div class="select-wrap">
                <select class="year">
                  <option>Year</option>
                   <?php wp_get_archives( 'type=yearly&format=option&show_post_count=0' ); ?>                </select>
              </div>
            </div>
          </div>
           <?php while (have_posts()) : the_post(); ?>
          <div class="news-wrap">
            <div class="row">
              <div class="news-img"><a href="<?php the_permalink()?>"><?php the_post_thumbnail('thumbnail');?></a></div>
              <div class="news-content">
                <h3><a href="<?php the_permalink()?>"><?php the_title();?></a></h3>
                <p class="date"><?php the_date('F j, Y');?></p>
                 <?php the_excerpt();
                
                 ?>
              </div>
            </div>
          </div>
           <?php endwhile;?>
        </div>
        <div class="row">
          <?php wp_pagenavi(); ?>
        </div>
        <?php  else: ?>
 		 <h1 class="page-title"><?php _e('Sorry, no posts matched your criteria.'); ?></h1>
         <?php endif; ?>
      </article>
    </div>
  </div>
  
  <?php get_footer();?>