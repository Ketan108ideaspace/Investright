<?php 
/* Template Name: Risk Type Page Template*/
 get_header();

?>
<style>
label {
	color: #231f20 !important;
}
.error {
	font-size: 12px;
	color: red !important;
}

</style>
<!-- Body Content -->
<div class="container-innerpage">
  <?php while (have_posts()) : the_post(); ?>
  <div class="row">
    <?php get_sidebar();?>
    <article class="content-wrap">
      <div class="breadcrumb"> <strong>You are here:</strong>
        <?php if( function_exists('bcn_display'))
                 {
                     bcn_display();
                  }
            ?>
      </div>
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

        <div class="short_content">
          <?php  $unformatted_content =  get_post_meta(get_the_ID(),'short_content',true);
	 echo $content = apply_filters('the_content', $unformatted_content); ?>
        </div>
        <form action="#ans" name="question" id="question" method="post" >
          <ol>
            <?php
$count = 0;
// check if the repeater field has rows of data
if( have_rows('risk_type') ):

 	// loop through the rows of data
    while ( have_rows('risk_type') ) : the_row();
$cnt = $count++;
$cn = $cnt; 
        // display a sub field value ?>
            <li><?php echo get_sub_field('question'); ?>
            <?php // check if the repeater field has rows of data
if( have_rows('question_&_answers') ):
$cc = 0;
?>
            <ol class="quiz-list list-style-none">
              <?php // loop through the rows of data
    while ( have_rows('question_&_answers') ) : the_row();
	 $c = $cc++; ?>
              <li>
                <input required type="radio" id="ansi-<?php echo $cnt.$c; ?>" name="ans-<?php echo $cnt; ?>" <?php if($_POST['ans-'.$cnt] == get_sub_field('score')) {?> checked="checked" <?php }?> value="<?php echo get_sub_field('score'); ?>" />
 <label for="ansi-<?php echo $cnt.$c; ?>"> <?php echo get_sub_field('answers'); ?> </label>
              <?php 
	  endwhile; ?>
              <label for="ans-<?php echo $cnt; ?>" class="error" style="display:none;"></label></li>
            </ol>
            </li>
            <?php

else :

    echo "No Answers";

endif;

    endwhile;

else :

    // no rows found

endif;

?>
<li class="buttons">
            <input type="hidden" name="count" id="count" value="<?php echo $cnt; ?>" />
           <?php if(isset($_POST['submit_cal']))
	{?> <a href="<?php echo get_permalink(); ?>">Reset</a>  <?Php } ?>
            <input onclick="ga('send','event',{'eventCategory':'risk_test_btn','eventAction':'click', 'eventLabel':'Risk Test Tolerance'});" type="submit" name="submit_cal" id="submit_cal" value="Calculate" class="btn" />
            </li>
          </ol>
        </form>
        <?php 
	if(isset($_POST['submit_cal']))
	{
	$count = $_POST['count'];
	for($i=0;$i<=$count;$i++)
	{
	$value = $_POST['ans-'.$i]+$value;		
	} ?>
        <div id="ans">
          <h4><?php echo "Your Score - ".$value .' points'; ?></h4>
          <?php // check if the repeater field has rows of data

	
	$explanation =  get_post_meta(get_the_ID(),'explanation',true);
	 echo $content_explanation = apply_filters('the_content', $explanation);
	 ?>
        </div>
        <?php }
	?>
      </div>
      <!--editor-content--> 
      
    </article>
  </div>
  <!--row-->
  <?php endwhile; ?>
</div>
<!--container-innerpage-->
<?php  get_footer(); ?>
