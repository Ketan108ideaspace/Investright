<?php 
/* Template Name: Anchor Page Template*/
get_header();
	  global $wpdb,$template_url;	  
  ?>  
  <div class="container-innerpage">
	<div class="row">
	  <?php get_sidebar();?>
	  <article class="content-wrap">
		
		<div id="top" class="breadcrumb"> 
		<strong>You are here:</strong> 
		<?php
			if(function_exists('bcn_display')) {
				bcn_display();
			}
       ?>
		</div>
		<?php while (have_posts()) : the_post(); ?>
		<h1 class="page-title"><?php the_title();?></h1>
		<div class="editor-content anchor-link-wrapper">
		  <div class="share-icon">
			SHARE&nbsp;&nbsp;<!--a href="http://www.facebook.com/sharer.php?u=<?php the_permalink()?>" target="_blank"><img src="<?php bloginfo('template_url')?>/images/icon/facebook.png" alt="share on facebook"></a>
			<a href="https://twitter.com/share?url=<?php the_permalink()?>&amp;text=Investright&amp;hashtags=Investright" target="_blank"><img src="<?php bloginfo('template_url')?>/images/icon/twitter.png" alt="share on twitter"></a>
			<a href="http://vkontakte.ru/share.php?url=<?php the_permalink();?>" target="_blank"><img src="<?php bloginfo('template_url')?>/images/icon/share.png" alt="share"></a-->
			<span class='st_facebook_large' displayText='Facebook'></span>
			<span class='st_twitter_large' displayText='Tweet'></span>
			<span class='st_sharethis_large' displayText='ShareThis'></span>
			</div>
		  <div class="row">
			<div class="anchor-content-box">
			<div class="anchor-link-list">
			  <div class="anchor-link-inner">
				<h3>Table of Contents</h3>
				<?php 
				echo '<ul>';
			   $post_ID = get_the_ID(); 
			   
  $total_count = get_post_meta($post_ID,'create_anchor_link',true);
  $array_sort = array();
  $result_sort = array();
  $cars = array();
  for($i=0;$i<=$total_count;$i++)
  {
	$title = get_post_meta($post_ID,'create_anchor_link_'.$i.'_title',true);
	$unformatted_content = get_post_meta($post_ID,'create_anchor_link_'.$i.'_content',true);
	$content = apply_filters('the_content', $unformatted_content);

	$inv_order = get_post_meta($post_ID,'create_anchor_link_'.$i.'_order',true); 
	if($title!="" || $content!="") {
	  $cars[] = array($inv_order,$title,$content);
	}
  }
  $array_sort = $cars;
  $result_sort = $cars;
  //ksort($array_sort);
  arsort($array_sort);
  arsort($result_sort);
  foreach(array_reverse($array_sort) as $result)
  { ?>
				<li> <a class="inv_titles" href="#<?php echo sanitize_title($result[1]); ?>"> <?php echo $result[1]; ?></a></li>
				<?php }
	  echo '</ul>';
	  
  ?>
			  </div>
			</div>
			<?php
				$nvContent = get_the_content();
				if($nvContent!="") {
				?>
				<div class="anchor-default-content">
					<?php the_content(); ?>
				</div>
			 <?php
				}
			  //print_r($result_sort);
  // The Loop
	  $count = 0;
		  foreach(array_reverse($result_sort) as $results)
	  {?>
			  <div class="anchor-content-inner">
				<h3 id="<?php echo sanitize_title($results[1]); ?>"><span><?php echo $results[1]; ?></span>
				<?php if($count > 0){ ?>
				<a  href="#top" class="back-top inv_titles">back to top</a>
				<?php } ?></h3>
				<div class="editor-content"><?php echo $results[2]; ?></div>
			  </div>
			  <!--anchor-content-inner-->
			  
			  <?php $count++;
				  }
  ?>
				<p class="right-align"><a href="#top" class="back-top inv_titles">back to top</a></p>
			</div>
		  </div>
		</div>
		<?php endwhile;?>
	  </article>
	</div>
  </div>
  <?php get_footer(); ?>