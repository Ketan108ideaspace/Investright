<?php
global $template_url;
$nvBodyCls = '';
if ( is_page_template('template-no-sidebar.php') ) {
    $nvBodyCls = 'class="full-width"';
}

$nvULCls = "";
if(is_user_logged_in()) {
	$nvULCls = "wp-logged-in";
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js <?php echo $nvULCls; ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title(); ?></title>
	<link rel="icon" href="<?php echo of_get_option( 'favicon' ); ?>" type="image/x-icon" />
	<?php wp_head(); ?>
	<script src="//cdn.trackduck.com/toolbar/prod/td.js" async data-trackduck-id="57b3340ca2703b9637d9291c"></script>
	<style type="text/css">
      #map { height: 450px; margin: 0; width: 100%; }
    </style>
</head>

<!-- Header Section -->
<body <?php echo $nvBodyCls; ?>>
<div class="main-wrapper">
<header>
<!-- Notification -->
<?php
	$nvNotiMsg = of_get_option( 'notification_msg' );
	if($nvNotiMsg!="") {
		echo '<div class="notification-top"><p>'.$nvNotiMsg.'</p></div>';
	}
?>
  <div class="row">
    <div class="logo-wrap"><a href="<?php echo home_url() ?>"><img src="<?php echo of_get_option( 'logo' ); ?>" alt="Logo - InvestRight"></a></div>
	<a href="#" class="mob-menu-bar"><img src="<?php echo $template_url; ?>/images/icon/baar.png" alt="Icon Bar"></a>
    <div class="header-nav-wrap">
	<?php
		$header_menu = array(
			'theme_location' => 'Header_Menu',
			'menu' => 'Header Menu',
			'container' => false,
			'container_class' => 'menu-header',
			'menu_class' => 'header-nav inline',
			'menu_id' => '',
			//'link_after' => '<img src="'.$template_url.'/images/icon/down-arrow.png" alt="" class="arrow-icon">',
			'walker' => new My_Walker_Nav_Menu()
			);
		wp_nav_menu($header_menu);
	?>
	
	<ul class="header-nav inline">
		<li class="has-child"><a href="#">
		<?php 
			if("Punjabi"==ICL_LANGUAGE_NAME) {
				echo "ਪੰਜਾਬੀ";
			} else {
				echo ICL_LANGUAGE_NAME;
			}
		?> 
			<img src="<?php echo $template_url; ?>/images/icon/down-arrow.png" alt="" class="arrow-icon"></a>
			<ul class="header-nav-child">
				<?php // Language Switcher
					if ( function_exists( 'icl_get_languages' ) ) {
						$languages = icl_get_languages('skip_missing=0&orderby=KEY');
						foreach( $languages as $language ) {
							if( $language['active'] != 1 ) {
								if("pa"==$language['language_code']) {
									$lngName = "ਪੰਜਾਬੀ";
								} else {
									$lngName = $language['native_name'];
								}
								
								echo '<li><a href="'.$language['url'].'" lang="'.$language['language_code'].'">'.$lngName.'</a></li>';
							}
						}
					}
				  ?>
			</ul>
		</li>
	</ul>
	  
	  
      <div class="header-search-wrap inline">
		<form action="<?php echo home_url( '/' ); ?>" method="get">
			<input type="search" placeholder="SITE SEARCH" class="header-search-field" value="<?php echo get_search_query() ?>" name="s">
			<input type="submit" class="header-search-btn" value="">
		</form>
      </div>
      <div class="clear"></div>
      <ul class="header-icon-nav inline">
        <li><a href="<?php echo of_get_option( 'facebook_url' ); ?>" target="_blank">
          <icon class="iconset icon-fb"></icon>
          </a></li>
        <li><a href="<?php echo of_get_option( 'twitter_url' ); ?>" target="_blank">
          <icon class="iconset icon-tw"></icon>
          </a></li>
        <li><a href="<?php echo of_get_option( 'youtube_url' ); ?>" target="_blank">
          <icon class="iconset icon-utube"></icon>
          </a></li>
        <li id="textsizer" class="font-sizer"><a href="#" class="small">A</a><a href="#" class="medium">A</a><a href="#" class="large">A</a></li>
        <li onclick="window.print();"><a href="#">
          <icon class="iconset icon-print"></icon>
          </a>
		  </li>
      </ul>
    </div>
  </div>

<!-- Main Menu -->
<nav>
  <div class="row">
    <div class="main-menu">
                <ul>
				<?php 
$menu_name = 'Header Main Menu';
$menu = wp_get_nav_menu_object($menu_name);
   $menu_items = wp_get_nav_menu_items( $menu->term_id );
   $cild_menu_items = wp_get_nav_menu_items( $menu->term_id );
   $cild_child_menu_items = $cild_third_menu_items = $cild_fourth_menu_items = $cild_fifth_menu_items = wp_get_nav_menu_items( $menu->term_id );
   

   foreach($menu_items as $menu_item ) { 
  ?>
   <?php $menu_class =  $menu_item->classes; ?>
    <?php if ( !$menu_item->menu_item_parent ) { ?><li class="has-child invest <?php foreach($menu_class as $class) { echo $class; } ?>"><a href=""><?php echo $menu_item->title; ?></a><div class="mega-menu">
    
    <?php
	foreach($cild_menu_items as $cild_menu_item ) {
	if($cild_menu_item->menu_item_parent==$menu_item->ID){ ?>
	<div class="mm-group"><?php if($cild_menu_item->object !='nav_menu'){?><a href=""> <?php  echo $cild_menu_item->title; ?></a><?php } ?>
    <?php  
   if($cild_menu_item->object =='nav_menu'){
$menu1 = array(
				'theme_location' => '',
				'menu' => $cild_menu_item->title, 
				'menu_class' => 'mm-list all-caps',
				'container' => false,
				'echo' => true,
				'depth' => 0,
			);
			wp_nav_menu( $menu1 );
   }
  
	?>
    </div><!--mm-group-->
    <ul class="sub-menu mm-list">
	<?php	
	//Second Level Menu	
	foreach($cild_child_menu_items as $cild_child_menu_item ) {
	if($cild_child_menu_item->menu_item_parent==$cild_menu_item->ID){ ?>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="<?php  echo $cild_child_menu_item->url; ?>"> <?php  echo $cild_child_menu_item->title; ?></a>
    <?php  
   if($cild_child_menu_item->object =='nav_menu'){
$menu1 = array(
				'theme_location' => '',
				'menu' => $cild_child_menu_item->title, 
				'menu_class' => 'mm-list all-caps',
				'container' => false,
				'echo' => true,
				'depth' => 0,
			);
			wp_nav_menu( $menu1 );
   } ?>
     <ul class="sub-menu">
    <?php	
	//Third Level Menu	
	foreach($cild_third_menu_items as $cild_third_menu_item ) {
	if($cild_third_menu_item->menu_item_parent==$cild_child_menu_item->ID){ ?>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="<?php  echo $cild_third_menu_item->url; ?>"> <?php  echo $cild_third_menu_item->title; ?></a>
    <?php  
   if($cild_third_menu_item->object =='nav_menu'){
$menu1 = array(
				'theme_location' => '',
				'menu' => $cild_third_menu_item->title, 
				'menu_class' => 'mm-list all-caps',
				'container' => false,
				'echo' => true,
				'depth' => 0,
			);
			wp_nav_menu( $menu1 );
   } ?>
   
     <ul class="sub-menu">
    <?php	
	//Fourth Level Menu	
	foreach($cild_fourth_menu_items as $cild_fourth_menu_item ) {
	if($cild_fourth_menu_item->menu_item_parent==$cild_third_menu_item->ID){ ?>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="<?php  echo $cild_fourth_menu_item->url; ?>"> <?php  echo $cild_fourth_menu_item->title; ?></a>
    <?php  
   if($cild_fourth_menu_item->object =='nav_menu'){
$menu1 = array(
				'theme_location' => '',
				'menu' => $cild_fourth_menu_item->title, 
				'menu_class' => 'mm-list all-caps',
				'container' => false,
				'echo' => true,
				'depth' => 0,
			);
			wp_nav_menu( $menu1 );
   } ?>
    
    
      <ul class="sub-menu">
    <?php	
	//Fifth Level Menu	
	foreach($cild_fifth_menu_items as $cild_fifth_menu_item ) {
	if($cild_fifth_menu_item->menu_item_parent==$cild_fourth_menu_item->ID){ ?>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="<?php  echo $cild_fifth_menu_item->url; ?>"> <?php  echo $cild_fifth_menu_item->title; ?></a>
    <?php  
   if($cild_fifth_menu_item->object =='nav_menu'){
$menu1 = array(
				'theme_location' => '',
				'menu' => $cild_fifth_menu_item->title, 
				'menu_class' => 'mm-list all-caps',
				'container' => false,
				'echo' => true,
				'depth' => 0,
			);
			wp_nav_menu( $menu1 );
   } ?>
    
    
    <?php }?> </li> <?php } // Fifth Level Ends Here ?>
    </ul>
    
    <?php }?> </li> <?php } //Fourth Level Ends Here ?>
    </ul>
    
    <?php }?>  </li> <?php } // Third Level ends here ?>
    
    </ul>
	<?php } ?></li>
	<?php } // Second Menu Ends Here ?>
    </ul>
	 <?php }
	
	
	}
	?>
    </div><!--mega-menu-->
	</li><?php } ?>
				<?php } ?>
                
                </ul>
                  </div><!--main-menu-->
    <div class="report-nav"><a href="<?php echo get_the_permalink(68); ?>" target="_blank"><?php _e( "Report a Concern", "investright" ); ?><icon class="iconset icon-arrowRight"></icon></a></div>
  </div>
</nav>
</header>