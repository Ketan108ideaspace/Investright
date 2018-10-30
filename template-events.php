<?php
	/* Template Name: In Your Community Template*/
	get_header();
	global $post;
	$args = array(
      'post_parent' =>  $post->ID,
      'post_type'   => 'page', 
      'numberposts' => -1,
      'post_status' => 'publish',
      'order'       =>'DESC',
      'orderby'     =>'menu_order'
	); 

	$children_pages = get_children( $args );
    // foreach($children_pages as $page)
	
	global $wpdb,$template_url;
	
	$eargs = array(
		'post_type' => 'event',
		'post_status' => 'publish', 
		'posts_per_page' => -1, 
		'order' => 'DESC', 
		'orderby' => 'post_date' 
	);
	wp_reset_query();
	
	// Event Query
	$event_query = new WP_Query($eargs);
	
?>
<script type="application/javascript">
  // Event Calendar implementation
  var event_table;
  jQuery(document).ready(function() {
  
  	jQuery(function() {
		jQuery( "#Tabs1" ).tabs(); 
	});

    jQuery('#calendar').fullCalendar({
      header: {
        left: 'today prev,next,prevYear,nextYear',
        center: 'title',
        right: 'month,agendaWeek,agendaDay',
      },
	  dayNamesShort: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
      defaultDate: '<?php echo date("Y-m-d");?>',
      editable:true,
	  weekends:true,
	  eventLimit: true,
      events: [
	  	<?php 
          if($event_query->have_posts()) :
            while ($event_query->have_posts()) : $event_query->the_post();
                $startdate = get_post_meta( get_the_ID(), 'investright_start_date', TRUE );
				$nvStartDate = get_post_meta( get_the_ID(), 'investright_start_date', TRUE );
				$nvEndDate = get_post_meta( get_the_ID(), 'investright_end_date', TRUE );
				$startime = date('h:i A', strtotime(get_post_meta( get_the_ID(), 'investright_start_date', TRUE )));
                $e_date = get_post_meta( get_the_ID(), 'investright_end_date', TRUE );			
                $enddate = date('Y-m-d', strtotime('+1 day', strtotime($e_date)));
				$endtime = date('h:i A', strtotime('+1 day', strtotime($e_date)));
				$location = get_post_meta( get_the_ID(), 'investright_location', TRUE );
					if($nvStartDate!="") {
						$nvTipDate = date('M j, Y h:i A', strtotime($nvStartDate));
						if($nvEndDate!="") {
							$nvTipEndDate = date('M j, Y h:i A', strtotime($nvEndDate));
							$nvTipDate = $nvTipDate." to ".$nvTipEndDate;
						}
					?>
					{
					  title: '<?php echo get_the_title(); ?>',
					  start: '<?php echo $nvStartDate; ?>',
					  end: '<?php echo $e_date; ?>',
					  url: '<?php echo get_the_permalink(get_the_ID()); ?>',
					  tip: '<?php echo get_the_title(); ?> <hr/> <?php echo $nvTipDate; ?>  <hr/> <?php echo $location; ?>',
					  allDay : true
					},
              <?php
			  }
            endwhile;
          endif;
          wp_reset_postdata();
        ?>
      ],
      eventRender: function(event, element) {
        element.qtip({
          content: {
            text: event.tip,
          },
          position: {
              my: 'center left',
              at: 'center right',
             viewport: jQuery(window),
              //container: jQuery('.fc-day-grid-event'),
          },
        });
      },
    });

    event_table = jQuery('#event-list-view').DataTable( {
      "order": [[ 0, "desc" ]],
      "lengthChange": false,
      "searching": false,
      "info": false,
	  "paging": true,
	  "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
	  "language": {
        "paginate": {
            "previous": "Prev",
            "next": "Next",
        }
      }
    });

    jQuery("#cal_event_type").on('change', function(){
		$(".showallevents").hide();
		var option_val = jQuery(this).val();
		if(option_val=="0") {
			$(".showallevents").show();
			event_table.columns(0).search(option_val).draw();
		} else {
			$(".Year"+option_val+"").show();
		}
    });
	
	/*jQuery(".paginate_button").click( function(){
		$(".showallevents").hide();
		var option_val = jQuery(this).val();
		//alert(option_val);
		if(option_val=="UP") {
			$(".comingevent").show();
		} else if(option_val=="DW") {
			$(".pastevent").show();
		} else if(option_val=="0") {
			$(".showallevents").show();
			//event_table.columns(0).search(option_val).draw();
		} else {
			$(".Year"+option_val+"").show();
		}
	});*/

    jQuery('div#cal-list-view_filter').hide();
  });
</script>
 <!-- Body Content -->
  <div class="container-innerpage">
   <?php while (have_posts()) : the_post(); ?>

    <div class="row">
      <?php
		get_sidebar();
		$nvDfCls = "";
		//$ndLng = ICL_LANGUAGE_CODE;
		$ndLng = "";
		if($ndLng!="en") {
			//$nvDfCls = "fullwidth";
			$nvDfCls = "";
		}
	  ?>
      <article class="content-wrap <?php echo $nvDfCls; ?>">
       <div class="breadcrumb"> <strong>You are here:</strong>  
           <?php if( function_exists('bcn_display'))
                 {
                     bcn_display();
                  }
            ?> 
       </div>
        <div class="editor-content no-padding">
          <div class="mf-wrap-top">
            <div class="row">
              <div class="left">
                <h1 class="page-title"><?php the_title();?></h1>
                <?php the_content();?>
              </div>
               <?php
					//$nvVideo = get_post_meta(get_the_ID(), "meta-box-text", true);
					$nvVideo = get_post_meta(get_the_ID(), "investright_video_url", true);
					$nvImage = get_post_meta(get_the_ID(), "investright_videothumb", true);
					$nvImage = wp_get_attachment_image_src( $nvImage, 'full' );
					$nvImage = $nvImage[0];
					if($nvImage=="") {
						$nvImage = esc_url(get_template_directory_uri())."/images/video_no-image.jpg";
					}
					if($nvVideo!="") { ?>
                    <div class="right img-wrap">
					<?php // Validate url
if (!filter_var($nvVideo, FILTER_VALIDATE_URL) === false) { ?>
    <?php //echo("$url is a valid URL"); ?>
	<!--iframe width="560" height="315" src="<?php echo $nvVideo; ?>" frameborder="0" allowfullscreen></iframe-->
	<a class="html5lightbox" href="<?php echo $nvVideo; ?>" data-width="480" data-height="320"><img src="<?php echo $nvImage; ?>" /></a>
<?php } else {
	echo $nvVideo;
    //echo("$url is not a valid URL");
}
					?></div>
					<?php }
					else if(has_post_thumbnail()){ ?>
						<div class="right img-wrap"><?php the_post_thumbnail('full');?></div>
				<?php } else {} ?>
            </div>
          </div>
        <?php endwhile;?>

          
          
<div class="event-calender-wrap">
          	<?php
				// Calendar grid view query
				$gridargs = array(
					'post_type' => 'event',
					'post_status' => 'publish', 
					'posts_per_page' => -1,
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'investright_start_date', 
							'value' => array('','1970-01-01'), 
							'compare' => 'NOT IN',
							'type' => 'DATE',
						),
					),
					'orderby' => 'meta_value',
					'order' => 'ASC',
					'meta_key' => 'investright_start_date',
				);
				
				$gridvent_query = new WP_Query( $gridargs );
				$qryPostsArr = $gridvent_query->posts;
				
				function compare_func($a, $b) {
					// CONVERT $a AND $b to DATE AND TIME using strtotime() function
					$t1 = strtotime(get_post_meta( $a->ID, 'investright_start_date', TRUE ));
					$t2 = strtotime(get_post_meta( $b->ID, 'investright_start_date', TRUE ));
					if($t1!="") {
						return ($t2 - $t1);
					}
				}
				usort($qryPostsArr, "compare_func");
				
			?>
            <!-- Please add calender here -->
            <h2>Events Calendar</h2>
			<img src="<?php echo get_template_directory_uri()."/images/march.png"; ?>" title="March Month" class="hidden cal-icon marchImg">
			<img src="<?php echo get_template_directory_uri()."/images/oct.png"; ?>" title="Oct Month" class="hidden cal-icon octImg">
			<img src="<?php echo get_template_directory_uri()."/images/nov.png"; ?>" title="Nov Month" class="hidden cal-icon novImg">
            <div id="Tabs1">
              <ul>
                <li><a href="#tabs-1">CALENDAR VIEW</a></li>
                <li><a href="#tabs-2">LIST VIEW</a></li>
              </ul>
              <div id="tabs-1">
              <div class="year-select-wrap">
			  Goto:
              <div class="select-wrap">
				<select name="cal_event_month" id="cal_event_month" title="Select Month">
				<option value="0">January</option>
				<option value="1">February</option>
				<option value="2">March</option>
				<option value="3">April</option>
				<option value="4">May</option>
				<option value="5">June</option>
				<option value="6">July</option>
				<option value="7">August</option>
				<option value="8">September</option>
				<option value="9">October</option>
				<option value="10">November</option>
				<option value="11">December</option>
				</select>
                </div>
				<input class="year-count" type="text" name="txtYear" id="txtYear">
				<button id="gotoCalDate" class="gotoCalDate-btn">GO</button>
                </div>
                <p id="calendar"></p>
              </div>
              <div id="tabs-2">
                <p>
                    <span class="ncp-wrap"> <span class="list-filter-top"> <span class="list-filter-bar">
                    <ul class="list-filter">
                      <li class="show-all">
                        <div class="select-wrap">
                          <?php
						  	$years = array();
							$unique_years = array();
							
                          	if($gridvent_query->have_posts()) :
								while ($gridvent_query->have_posts()) : $gridvent_query->the_post();
									$years[] = date('Y', strtotime(get_post_meta( get_the_ID(), 'investright_start_date', TRUE )));
								endwhile;
							endif;
						  ?>
                          <select name="cal_event_type" id="cal_event_type" title="Show All">
                            <option selected="selected" value="0">Show All</option>
								<?php
								$unique_years = array_unique( $years );
								foreach( $unique_years as $year ) {
                            	?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                <?php } ?>
                          </select>
                        </div>
                      </li>
                    </ul>
                    <div class="events-category-tab">
					<div id="upcoming_events"><a alt="Upcoming">Upcoming</a></div><div id="past_events"><a alt="Past">Past</a></div>
                    </div>
                    <!--div id="show_all_events">Show All</div-->
                    </span>
                    </span> <span class="ncp-listview" style="width:100%;"> 
                      <table id="event-list-view" class="display dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th class="event_date">EVENT DATE</th>
                              <th class="event_name">EVENT NAME</th>
                              <th class="venue">VENUE</th>
							  <th class="type">TYPE</th>
							  <th class="audience">AUDIENCE</th>
							  <th class="language">LANGUAGE</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                          // Grid View
						foreach( $qryPostsArr as $post ) {
							$nvEventDate = date('d-M-Y', strtotime(get_post_meta( $post->ID, 'investright_start_date', TRUE )));
							$nvEventYear = date('Y', strtotime(get_post_meta( $post->ID, 'investright_start_date', TRUE )));
							
							$nvStrToTime = date(strtotime(get_post_meta( $post->ID, 'investright_start_date', TRUE )));
							$nvNowDate = strtotime(date("d M, Y"));
							
								if($nvNowDate < $nvStrToTime) {
									$nvEventCls = "comingevent";
								} else {
									$nvEventCls = "pastevent";
								}
                            ?>
                            <tr class="showallevents <?php echo "Year".$nvEventYear; ?> <?php echo $nvEventCls; ?>">
                                <td><?php echo $nvEventDate; ?></td>
                                <td><a href="<?php the_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></td>
                                <td><?php echo get_post_meta( $post->ID, 'investright_location', TRUE ); ?></td>
								<td><?php echo get_post_meta( $post->ID, 'investright_event_type', TRUE ); ?></td>
								<td><?php echo get_post_meta( $post->ID, 'investright_audience', TRUE ); ?></td>
								<td><?php echo get_post_meta( $post->ID, 'investright_lang', TRUE ); ?></td>
                            </tr>
                            <?php
						  }
						?>
                          </tbody>
                        </table>
                     </span>
                    </span>
                </p>
              </div>
            </div>
            
            <!-- Please add calender here --> 
          </div>
		  <div class="editor-content no-padding">
		  <?php wp_reset_query();$count=1;$key=0;
                $classname=array('dark-blue-box','light-blue-box','grn-box');
                query_posts('post_type=page&post_parent='.$post->ID.'&post_status=publish&showposts=-1&orderby=menu_order&order=ASC');
                if(have_posts()):?>

                <?php while (have_posts()) : the_post(); 
                ?>
                           <?php if($count==1){?>
							<div class="mf-wrap">
								<div class="row">
									<div class="left">
										<div class="<?php echo $classname[$key];?> equalHeight">
											<h3><?php the_title();?></h3>
												<?php the_excerpt();?>
											<a href="<?php the_permalink();?>" class="link-more" title="<?php the_title(); ?>">Learn More</a> 
										</div>
									</div>
                            <?php }?>
                            <?php if($count==2){?>    
									<div class="right">
										<div class="<?php echo $classname[$key];?> equalHeight">
											<h3><?php the_title();?></h3>
												<?php the_excerpt();?>
											<a href="<?php the_permalink();?>" class="link-more" title="<?php the_title(); ?>">Learn More</a> 
										</div>
									</div>    
                                </div>
							</div>
                            <?php }?>
                            <?php if($count==3){?>
							<div class="mf-wrap">
                                <div class="white-box">
                                        <h3><?php the_title();?></h3>
                                            <?php the_excerpt();?>
                                        <a href="<?php the_permalink();?>" class="link-more dark" title="<?php the_title(); ?>">Learn More</a> 
                                </div>
							</div>
                        <?php }
                    if($count==3)
                    {
						$count=1; 
                    }
                    else{
                       $count++;
						if($key==2)
							$key=0;
                        else
							$key++;
					}
				endwhile;
			endif;?>
		  
		  <?php 
			/*$nvPostId1 = get_post_meta(212,'investright_content1',true);
			$nvPostId2 = get_post_meta(212,'investright_content2',true);
			$nvPostId3 = get_post_meta(212,'investright_content3',true);
			$nvPostId4 = get_post_meta(212,'investright_content4',true);
			wp_reset_query();
			
			$newsAry = array(
				'post_status' => 'publish', 
				'showposts' => 4,
				'post__in' => array($nvPostId1,$nvPostId2,$nvPostId3,$nvPostId4),
				'orderby' => 'post__in',
				'post_type' => 'event'
			);
			
			query_posts($newsAry);
			if (have_posts()) : ?>
			
			<div class="related-content-wrap">
			  <h3><?php _e( "Related Events", "investright" ); ?></h3>
			  <div class="row">
				 <?php while (have_posts()) : the_post();
					$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
				 ?>

				<div class="rc-inner">
          		<?php
					$nvImage = $nvImage[0];
					if($nvImage[0]=="") {
						$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
					}
				?>
				<img src="<?php echo $nvImage; ?>" alt="<?php the_title(); ?>">
				  <p><a href="<?php the_permalink()?>" style="color:#000;">
					<?php
					if(strlen($post->post_title)<30) {
						echo substr($post->post_title, 0, 30);
					} else {
						echo substr($post->post_title, 0, 30)."...";
					}
					?>
				  </a></p>
				</div>
				 <?php endwhile;?>
			   
			  </div>
			</div>
			<?php endif; wp_reset_query();*/
			?>
		</div>
         
      </article>
    </div>
  </div>


<?php
 get_footer(); ?>