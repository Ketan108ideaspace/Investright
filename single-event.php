<?php get_header();?>
  <!-- Body Content -->
  <div class="container-innerpage">
    <div class="row">
        <?php get_sidebar();?>
        <?php while (have_posts()) : the_post(); 
		
		        $estart_date=get_post_meta(get_the_ID(),'investright_start_date',true);
                $estart_time=get_post_meta(get_the_ID(),'investright_start_date',true);
                $eend_date=get_post_meta(get_the_ID(),'investright_end_date',true);
                $event_type=get_post_meta(get_the_ID(),'investright_event_type',true);
                $elocation=get_post_meta(get_the_ID(),'investright_location',true);
                $eaudience=get_post_meta(get_the_ID(),'investright_audience',true);
                $etelephone=get_post_meta(get_the_ID(),'investright_telephone',true);
                $eemail=get_post_meta(get_the_ID(),'investright_email',true);
                $elang=get_post_meta(get_the_ID(),'investright_lang',true);
                $econtact_info=get_post_meta(get_the_ID(),'investright_contact_info',true);
                $emap=get_post_meta(get_the_ID(),'investright_map',true);
                $regisinfo=get_post_meta(get_the_ID(),'investright_register_info',true);

        ?>

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
		<!--div class="addthis_inline_share_toolbox"></div-->
			<span class='st_facebook_large' displayText='Facebook'></span>
			<span class='st_twitter_large' displayText='Tweet'></span>
			<span class='st_sharethis_large' displayText='ShareThis'></span>
        </div>
          <h3>EVENT DETAILS</h3>
            <?php the_content();?>
          <div class="event-wrap">
          <div class="event-info">
          <?php if( $estart_date){?>
		  <h3>DATE & TIME</h3>
          <p><?php echo date("l, F j, Y",strtotime($estart_date));?></p>
		  <p><?php echo date("h:i A",strtotime($estart_time));?></p>
          <?php }
          if( $eend_date){
          ?>
           <p><?php echo date("l, F j, Y",strtotime($eend_date));?></p>
		   <p><?php echo date("h:i A",strtotime($eend_date));?></p>
          <?php }
          if( $event_type){
          ?>
          <h3>EVENT TYPE</h3>
          <p><?php echo $event_type;?></p>
          <?php }
          if( $eaudience){
          ?>
          <h3>AUDIENCE</h3>
          <p><?php echo $eaudience;?></p>
          <?php }
          if( $elang){
          ?>
          <h3>LANGUAGE</h3>
          <p><?php echo $elang;?></p>
          <?php }
          if( $elocation){
          ?>
          <h3>VENUE</h3>
          <p><?php echo $elocation;?></p>
          <?php }
          if( $regisinfo){
          ?>
          <h3>REGISTRATION INFO</h3>
          <p><?php echo $regisinfo;?></p>
          <?php }
          if( $econtact_info){
          ?>
          <h3>CONTACT INFO</h3>
          <p><?php echo $econtact_info;?></p>
          <?php }
          if( $eemail){
          ?>
          <p><?php echo $eemail;?></p>
          <?php 
          }
          if( $etelephone){
          ?>
          <p><?php echo $etelephone;?></p>
          <?php
			}
			list($lat, $long, $zoom) = explode(',',$emap);
			
			if($lat=="" || $long=="") {
				$lat = 43.6532;
				$long = -79.3832;
			}
		  ?>
          </div>
			<div class="event-map">
            <?php echo do_shortcode('[mappress]'); ?>
				<!--<div id="map"></div>
				<script type="text/javascript">
					var map = new google.maps.Map(
						document.getElementById('map'), {
							center: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>),
							zoom: 15,
							streetViewControl: false,
							navigationControl: false,
							mapTypeControl: false,
							scaleControl: false,
							scrollwheel: false,
							zoomControl: true,
							mapTypeId: google.maps.MapTypeId.ROADMAP
						});

					  var marker = new google.maps.Marker({
							position: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>),
							map: map
					  });
				</script>-->
				
			</div>
          <div class="clear"></div>
          </div>

        </div>
   <?php     
		wp_reset_query();
		$nvPostId1 = get_post_meta(get_the_ID(),'investright_content1',true);
		$nvPostId2 = get_post_meta(get_the_ID(),'investright_content2',true);
		$nvPostId3 = get_post_meta(get_the_ID(),'investright_content3',true);
		$nvPostId4 = get_post_meta(get_the_ID(),'investright_content4',true);
      
      $newsAry = array(
        'post_status' => 'publish', 
        'showposts' => 4, 
        'post__not_in' => array(get_the_ID()),
		'post__in' => array($nvPostId1,$nvPostId2,$nvPostId3,$nvPostId4),
        'order' => 'ASC', 
        'orderby' => 'post__in',
        'post_type' => 'event'
      );
      
      query_posts($newsAry);
      if (have_posts()) : ?>
      
      <div class="related-content-wrap">
        <h3>Related Content</h3>
        <div class="row">
		<?php while (have_posts()) : the_post();
			$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
		?>

        <div class="rc-inner">
        <a href="<?php the_permalink()?>" style="color:#000;" title="<?php the_title(); ?>">
			<?php
				$nvImage = $nvImage[0];
				if($nvImage[0]=="") {
					$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
				}
			?>
			<img src="<?php echo $nvImage; ?>" alt="<?php the_title(); ?>">
		
			<p>
				<?php
				echo $post->post_title;
					/*if(strlen($post->post_title)<30) {
						echo substr($post->post_title, 0, 30);
					} else {
						echo substr($post->post_title, 0, 30)."...";
					}*/
				?>
			</p>
		</a>
		
        </div>
         <?php endwhile;?>
         
        </div>
      </div>
      <?php endif; wp_reset_query();?>
        </div>
      </article>
        <?php endwhile;?>
   
    </div>
  </div>
  
<?php get_footer();?>