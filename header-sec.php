<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		</a>
	</div>
	<?php endif; ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<div class="search-toggle">
				<a href="#search-container" class="screen-reader-text" aria-expanded="false" aria-controls="search-container"><?php _e( 'Search', 'twentyfourteen' ); ?></a>
			</div>

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
    <?php if ( !$menu_item->menu_item_parent ) { ?><li class="has-child invest <?php foreach($menu_class as $class) { echo $class; } ?> "><a href=""><?php echo $menu_item->title; ?></a><div class="mega-menu">
    
    <?php
	foreach($cild_menu_items as $cild_menu_item ) {
	if($cild_menu_item->menu_item_parent==$menu_item->ID){ ?>
	<div class="mm-group"><a href=""> <?php  echo $cild_menu_item->title; ?></a>
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
    <ul class="mm-list">
	<?php	
	//Second Level Menu	
	foreach($cild_child_menu_items as $cild_child_menu_item ) {
	if($cild_child_menu_item->menu_item_parent==$cild_menu_item->ID){ ?>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children "><a href=""> <?php  echo $cild_child_menu_item->title; ?></a>
    <?php  
   if($cild_child_menu_item->object =='nav_menu'){
$menu1 = array(
				'theme_location' => '',
				'menu' => $cild_child_menu_item->title, 
				'menu_class'	  => 'mm-list',
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
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href=""> <?php  echo $cild_third_menu_item->title; ?></a>
    <?php  
   if($cild_third_menu_item->object =='nav_menu'){
$menu1 = array(
				'theme_location' => '',
				'menu' => $cild_third_menu_item->title, 
				'menu_class'	  => 'mm-list',
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
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href=""> <?php  echo $cild_fourth_menu_item->title; ?></a>
    <?php  
   if($cild_fourth_menu_item->object =='nav_menu'){
$menu1 = array(
				'theme_location' => '',
				'menu' => $cild_fourth_menu_item->title, 
				'menu_class'	  => 'mm-list',
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
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href=""> <?php  echo $cild_fifth_menu_item->title; ?></a>
    <?php  
   if($cild_fifth_menu_item->object =='nav_menu'){
$menu1 = array(
				'theme_location' => '',
				'menu' => $cild_fifth_menu_item->title, 
				'menu_class'	  => 'mm-list',
				'container' => false,
				'echo' => true,
				'depth' => 0,
			);
			wp_nav_menu( $menu1 );
   } ?>
    
    
    <?php } ?> </li><!--mm-group--> <?php } // Fifth Level Ends Here ?>
    </ul>
    
    <?php }?>  </li><!--mm-group--> <?php } //Fourth Level Ends Here ?>
   
    
     <ul>
     
    <?php } ?> </li><!--mm-group--> <?php } // Third Level ends here ?>
   
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
                  </div>
			</nav>
		</div>

		<div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
