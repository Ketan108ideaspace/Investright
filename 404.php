<?php get_header(); ?>

  <!-- Body Content -->
  <div class="container-innerpage">
    <div class="row">
		
      <div class="breadcrumb">
      <strong>You are here:</strong> <a href="<?php echo home_url() ?>">Home</a> / <?php _e( "Search Results", "investright" ); ?></div>
      <h1 class="page-title"><?php _e( "Page Not Found", "investright" ); ?></h1>
      <div class="editor-content">
      <h2 class="sorryTxt"><?php _e( "To find what you’re looking for, try using search or browse a section on <a href=\'/\'>InvestRight.org</a>", "investright" ); ?></h2>
		<?php if(of_get_option( 'suggested_pages_link_1' )!="" || of_get_option( 'suggested_pages_link_2' )!="" || of_get_option( 'suggested_pages_link_3' )!="" || of_get_option( 'suggested_pages_link_4' )!="") {
			?>
				<h3><?php _e( "Suggested Pages", "investright" ); ?></h3>
			<?php
			}
		?>
		<ul>
			<?php
				$nvGetSegPageLink1 = of_get_option( 'suggested_pages_link_1' );
				if($nvGetSegPageLink1!="") {
				?>
				<li><a href="<?php echo $nvGetSegPageLink1; ?>"><?php echo of_get_option( 'suggested_pages_name_1' ); ?></a></li>
				<?php
				}
			?>
			<?php
				$nvGetSegPageLink2 = of_get_option( 'suggested_pages_link_2' );
				if($nvGetSegPageLink2!="") {
				?>
				<li><a href="<?php echo $nvGetSegPageLink2; ?>"><?php echo of_get_option( 'suggested_pages_name_2' ); ?></a></li>
				<?php
				}
			?>
			<?php
				$nvGetSegPageLink3 = of_get_option( 'suggested_pages_link_3' );
				if($nvGetSegPageLink3!="") {
				?>
				<li><a href="<?php echo $nvGetSegPageLink3; ?>"><?php echo of_get_option( 'suggested_pages_name_3' ); ?></a></li>
				<?php
				}
			?>
			<?php
				$nvGetSegPageLink4 = of_get_option( 'suggested_pages_link_4' );
				if($nvGetSegPageLink4!="") {
				?>
				<li><a href="<?php echo $nvGetSegPageLink4; ?>"><?php echo of_get_option( 'suggested_pages_name_4' ); ?></a></li>
				<?php
				}

				$nvGetSegPageLink4 = of_get_option( 'suggested_pages_link_5' );
				if($nvGetSegPageLink4!="") {
                    ?>
                    <li><a href="<?php echo $nvGetSegPageLink4; ?>"><?php echo of_get_option( 'suggested_pages_name_5' ); ?></a></li>
                <?php
                }
			?>
		</ul>
      </div>
      <div class="row">
      <div class="content-search-wrap">
		<form action="<?php echo home_url( '/' ); ?>" method="get">
          <input type="search" placeholder="SITE SEARCH" class="content-search-field" value="<?php echo get_search_query() ?>" name="s">
          <label for="search" class="hidden"></label>
          <input type="image" src="<?php echo $template_url; ?>/images/icon/search-2.png" class="content-search-btn" alt="search in the site">
		</form>
      </div>
      </div>
	  
    </div>
  </div>

<?php get_footer(); ?>