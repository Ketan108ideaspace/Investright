<?php 
/*
* Template Name: Return on Invesment
*/
get_header();
?>
<!-- Body Content -->

<div class="container-innerpage">
  <div class="row">
    <?php
		//get_sidebar();
		$nvDfCls = "";
		//$ndLng = ICL_LANGUAGE_CODE;
		$ndLng = "";
		if($ndLng!="en") {
			//$nvDfCls = "fullwidth";
			$nvDfCls = "";
		}
	?>
    <article class="content-wrap fullwidth <?php echo $nvDfCls; ?>">
      <div class="breadcrumb"> <strong>You are here:</strong>
        <?php
					if(function_exists('bcn_display')) {
						bcn_display();
					}
				?>
      </div>
      <?php while (have_posts()) : the_post(); ?>
      <h1 class="page-title">
        <?php the_title();?>
      </h1>
      <div class="editor-content">
        <div class="share-icon"> SHARE&nbsp;&nbsp; <span class='st_facebook_large' displayText='Facebook'></span> <span class='st_twitter_large' displayText='Tweet'></span> <span class='st_sharethis_large' displayText='ShareThis'></span> 
          <!--div class="addthis_inline_share_toolbox"></div--> 
        </div>
        <div class="calculator-box roi">
          <h3>ROI CALCULATOR</h3>
          <div class="calculator-content">
            <table>
              <tbody>
                <tr>
                  <td>Initial Invested Amount</td>
                  <td>$ <input id="initialamout" type="tel" value="50000" name="initi-alamout" maxlength="9" step="500" /></td>
                </tr>
                <tr>
                  <td>Final Invested Amount</td>
                  <td>$ <input id="finalamout" type="tel" value="55900" name="final-amout" maxlength="9" step="500" /></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="submit" value="CALCULATE" id="roi-sub-button" onclick="ga('send','event',{'eventCategory':'calculator_btn','eventAction':'click', 'eventLabel':'ROI Calculator'});"></td>
                </tr>
              </tbody>
            </table>
            <div class="roi-result-wrap">
            <table>
              <tbody>
                <tr>
                  <td>Your<br>Return on Investment</td>
                  <td><input id="returninvestment" type="number" value="11.8" style="width:80px" readonly /> %<br><br>
					$ <input id="totalamout" type="number" value="5900" name="total-amout" readonly /></td>
                </tr>
              </tbody>
            </table>
            <div class="infowrap"> <span class="iconset info"></span>
                    <div class="info-content">
                      <p>ASSUMPTIONS</p>
                      <p>The calculator doesn't take into account transaction costs or fees. The calculator results are for reference only. They do not reflect the amounts of an actual investment.</p>
                    </div>
                  </div>
            </div>
          </div>
        </div>
        <?php the_content();?>
      </div>
      <?php endwhile;?>
      <?php
			$args = array(
				'post_type'      => 'page',
				'post_parent'    => $post->ID,
				'order'          => 'ASC',
				'orderby'        => 'menu_order'
			 );
			$parent = new WP_Query( $args );

			if ( $parent->have_posts() ) : ?>
      <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
      <div id="parent-<?php the_ID(); ?>" class="parent-page">
        <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_title(); ?>
          </a></h1>
        <p>
          <?php //the_advanced_excerpt(); ?>
        </p>
      </div>
      <?php endwhile; ?>
      <?php endif; wp_reset_query(); ?>
      <!--related-->
      <?php 
			// check if the repeater field has rows of data
			if( have_rows('related_items_for_low_level_template') ): ?>
      <div class="related-content-wrap">
        <h3>Related Items</h3>
        <div class="row">
          <?php // loop through the rows of data
				while ( have_rows('related_items_for_low_level_template') ) : the_row();
					// display a sub field value
					$repeater_title = get_sub_field('related_title');
					$repeater_url = get_sub_field('related_url');
					$repeater_thumbnail = get_sub_field('related_thumbnail');
					?>
          <div class="rc-inner"> <a class="bg-none" href="<?php echo $repeater_url; ?>"  title="<?php echo $repeater_title; ?>">
            <?php
							if($repeater_thumbnail['url']=="") {
								$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
							}else{
								$nvImage = $repeater_thumbnail['url'];
							}
						?>
            <img src="<?php echo $nvImage; ?>" alt="<?php echo $repeater_title; ?>"> </a>
            <p> <a href="<?php echo $repeater_url; ?>" title="<?php echo $repeater_title; ?>"> <?php echo $repeater_title;	?> </a> </p>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
      <?php endif; ?>
      <!--relateds Ends here --> 
    </article>
  </div>
</div>
<script>
	$( function() {
		$('input[type="tel"]').keyup(function() {
			var $th = $(this);
			$th.val( $th.val().replace(/[^0-9]/g, function(str) { return ''; } ) );
		});
		var spinner = $( 'input[type="tel"]' ).spinner();
	} );
</script>
<!--link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php get_footer(); ?>
