<?php get_header();?>
  <!-- Body Content -->
  <div class="container-innerpage">
    <div class="row">
        <?php get_sidebar();?>
        <?php while (have_posts()) : the_post(); ?>

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
      
          <h2>Langley RCMP Community Volunteers</h2>
          <h3>event details</h3>
            <?php the_content();?>
          <div class="event-wrap">
          <div class="event-info">
          <h3>Date & Time</h3>
          <p>Saturday, April 30th, 2016</p>
          <p>10:45AM - 11:30AM</p>
          <h3>Event type</h3>
          <p>Seminar</p>
          <h3>Audience</h3>
          <p>Ages 60+</p>
          <h3>Language</h3>
          <p>English</p>
          <h3>Venue</h3>
          <p>BSCS Offices</p>
          <h3>Registration info</h3>
          <p>No registration required, free event.</p>
          <h3>contact info</h3>
          <p>Lorem Ipsum</p>
          <p>lorem@ipsum.com</p>
          <p>(555)245-3948</p>
          </div>
          <div class="event-map"><img src="images/map.jpg" alt=""></div>
          <div class="clear"></div>
          </div>

        </div>

      </article>
        <?php endwhile;?>
   
    </div>
  </div>
  
<?php get_footer();?>