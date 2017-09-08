<?php get_header();?>
  <!-- Body Content -->
  <div class="container-innerpage">
    <div class="row">
        <?php get_sidebar();?>
      <article class="content-wrap">
  	  <div class="breadcrumb"> <strong>You are here:</strong>  
  	  <?php if(function_exists('bcn_display'))
       {
        bcn_display();
        }
       ?> 
      </div>
       <?php while (have_posts()) : the_post(); ?>
        <h1 class="page-title"><?php the_title();?></h1>
        <div class="editor-content">
          <!--div class="share-icon"> SHARE&nbsp;&nbsp;<a href="#"><img src="images/icon/facebook.png" alt="share on facebook"></a> <a href="#"><img src="images/icon/twitter.png" alt="share on twitter"></a> <a href="#"><img src="images/icon/share.png" alt="share"></a> </div-->
          
          <?php the_content();?>

         
        </div>
        <?php endwhile;?>
        
      </article>
    </div>
  </div>
  
<?php get_footer();?>