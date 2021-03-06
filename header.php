<?php
global $template_url;
global $site_url;
$nvBodyCls = "";
if ( is_page_template('template-no-sidebar.php') ) {
    $nvBodyCls = "full-width";
}
if ( is_page_template('template-events.php') ) {
    $nvBodyCls = "events-calendar";
}
$nvfrdtemp = "";
$nvbodyfrdtemp = "";
if ( is_page_template('template-fraud-quiz-questions.php') ) {
    $nvfrdtemp = "fraud-temp";
	$nvbodyfrdtemp = "template-fraud-quiz-questions";
}

$nvULCls = "";
if(is_user_logged_in()) {
	$nvULCls = "wp-logged-in";
}
if ($post->ancestors) { 
	$pageId = end($post->ancestors); 
} else { 
	$pageId = $post->ID; 
}
//$ndLng = ICL_LANGUAGE_CODE;
$ndLng = "en";
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$_SERVER[HTTP_HOST]."".$_SERVER[REQUEST_URI];
if($actual_link=="https://wpadmin.investright.org/") {
	wp_redirect( "https://www.investright.org/" );
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js <?php echo $nvULCls; ?>">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KTZX4W');</script>
<!-- End Google Tag Manager -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<title><?php wp_title(); ?></title>
<meta name="msvalidate.01" content="A63CFA3FBCC3803CAECE1A36C7A7F223" />
<link rel="icon" href="<?php echo of_get_option( 'favicon' ); ?>" type="image/x-icon" />
<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<![endif]-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<?php wp_head(); ?>
<?php
	$nvGetUrl = get_permalink();
	$nvOgTitle = "";
	$nvResImg = "";
	if ( is_page_template('final-result.php') ) {
		if(isset($_GET['result'])){
			$result = $_GET['result'];
			$nvGetUrl = get_permalink()."?result=".$result;
			if($result <= 3){
				$nvResImg = get_field('result_background_image_1');
				$nvFB = get_field( 'facebook_share_msg_1' );
			}
			if($result >= 4 && $result<=6){
				$nvResImg = get_field('result_background_image_2');
				$nvFB = get_field( 'facebook_share_msg_4' );		
			}
			if($result == 7){
				$nvResImg = get_field('result_background_image_3');
				$nvFB = get_field( 'facebook_share_msg_7' );
			}
		}
	}
	
	$thumb = get_the_post_thumbnail_url($post->ID);
	$custom_thumb = get_field('social_image');
	if($custom_thumb=="") {
		$custom_thumb = esc_url(get_template_directory_uri())."/images/no-image.jpg";
	}
	if(is_page_template('template-new-personalities-quiz-result.php')) {		
		$nvDesc = get_field('facebook_text');
		$nvThumb = get_the_post_thumbnail_url($post->ID);
		$nvOgTitle = "I am "; ?>
		<meta property="og:description" content="<?php echo $nvDesc; ?>" />   
		<meta property="og:image" content="<?php  echo $nvThumb; ?>"/>
	<?php
	} else if ( is_page_template('template-fraud-quiz-questions.php') ) {
		$nvTDesc = get_field("description");
		if($nvResImg!="") { ?>
			<meta property="og:image" content="<?php  echo $nvResImg; ?>"/>
		<?php } else { ?>
			<meta property="og:image" content="<?php  echo $thumb ? $thumb : $custom_thumb; ?>"/>
		<?php } ?>
		<meta property="og:description" content="<?php echo $nvTDesc; ?>" />
	<?php } else {
		if($nvResImg!="") { ?>
			<meta property="og:image" content="<?php  echo $nvResImg; ?>"/>
		<?php } else { ?>
			<meta property="og:image" content="<?php  echo $thumb ? $thumb : $custom_thumb; ?>"/>
		<?php } ?>
		<meta property="og:description" content="<?php echo $nvFB ? $nvFB : get_the_excerpt(); ?>" />
	<?php
	}

	if(is_home()) {
		$nvTSide = of_get_option( 'twitter_site_name_'.$ndLng );
		$nvTTitle = of_get_option( 'twitter_title_'.$ndLng );
		$nvTDesc = of_get_option( 'twitter_description_'.$ndLng );
		$nvTImage = of_get_option( 'twitter_image_'.$ndLng ); ?>
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@<?php  echo $nvTSide ? $nvTSide : home_url() ; ?>" />
		<meta name="twitter:title" content="<?php  echo $nvTTitle; ?>" />
		<meta name="twitter:description" content="<?php  echo $nvTDesc; ?>" />
		<?php if($nvTImage!="") { ?>
			<meta name="twitter:image" content="<?php  echo $nvTImage ; ?>" />
		<?php } ?>
	<?php } else {
		$nvTSide = get_field("site_name");
		$nvTTitle = get_field("title");
		$nvTDesc = get_field("description");
		$nvTImage = get_field("image");

		$nvTThumb = get_the_post_thumbnail_url($post->ID);
		$nv_post_content = get_post($post->ID); ?>

		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@<?php  echo $nvTSide ? $nvTSide : home_url() ; ?>" />
		<meta name="twitter:title" content="<?php  echo $nvTTitle ? $nvTTitle : get_the_title() ; ?>" />
		<meta name="twitter:description" content="<?php  echo $nvTDesc ? $nvTDesc : wp_trim_words( $nv_post_content->post_content, 20, ' ' ); ?>" />
		<?php if($nvTImage!="" || $nvTThumb!="") { ?>
			<meta name="twitter:image" content="<?php  echo $nvTImage ? $nvTImage : $nvTThumb ; ?>" />
		<?php }
	}
	
	$nvGetTheTitle = get_the_title();
	if ( is_page_template('template-fraud-quiz-questions.php') ) {
		$nvGetTheTitle = get_field("title");
	}
	
	?>

	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php echo $nvOgTitle; ?><?php echo $nvGetTheTitle; ?>" />
	<meta property="og:url" content="<?php echo $nvGetUrl;?>" />
	<meta property="og:site_name" content="Investright" />
	<link rel="stylesheet" href="<?php echo $template_url; ?>/print.css" type="text/css" media="print" />
	<?php if(!is_home()) { ?>
		<script type="text/javascript" id="st_insights_js" src="https://ws.sharethis.com/button/buttons.js?publisher=14c1095b-395b-4705-be9f-d9dba6d654f9"></script>
	<?php } ?>
	<script type="text/javascript">stLight.options({publisher: "14c1095b-395b-4705-be9f-d9dba6d654f9", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
	<?php if ( is_page_template('template-quiz-landing.php') ) { ?>
		<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/take-the-quiz.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			.content-wrap {
				width: 100% !important;
				padding: 0 !important;
			}
		</style>
	<?php } ?>
	<?php if ( is_page_template('final-result.php') ) { ?>
		<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/result/css/take-the-quiz.css" rel="stylesheet" type="text/css">
	<?php } ?>
	<style type="text/css">
		#map { height: 450px; margin: 0; width: 100%; }
		.print-logo-wrap {
			display: none;
		}
	  @media print {
			.print-logo-wrap {
				display: block;
			}
			.web-logo {
				display: none;
			}
		}
	</style>
	<!--Google Analytics Tracking Code-->
	<script>
		(function (i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date(); a = s.createElement(o),
			m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
		})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

		ga('create', 'UA-44764829-1', 'investright.org');
		ga('send', 'pageview');

	</script>
	<!--END Google Analytics Tracking Code-->
	<!--link href="https://fonts.googleapis.com/css?family=Norican" rel="stylesheet"-->

	<!-- Hotjar Tracking Code for www.investright.org -->
	<script>
		(function(h,o,t,j,a,r){
			h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
			h._hjSettings={hjid:673860,hjsv:6};
			a=o.getElementsByTagName('head')[0];
			r=o.createElement('script');r.async=1;
			r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
			a.appendChild(r);
		})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
	<?php
	if($post->ID=="8499") { ?>
		<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "Organization",
			"url": "https://www.investright.org/",
			"name": "BCSC InvestRight.",
			"contactPoint": {
				"@type": "ContactPoint",
				"telephone": "+1-800-373-6393",
				"contactType": "Customer Support",
				"areaServed": "CA",
				"contactOption": "TollFree",
				"availableLanguage": "English"
			}
		}
		</script>
	<?php } else if(is_front_page()) { ?>
		<script type="application/ld+json">
			{
				"@context": "http://schema.org",
				"@type": "Organization",
				"name": "BCSC InvestRight",
				"url": "https://www.investright.org/",
				"logo": "https://www.investright.org/wp-content/uploads/2016/10/logo-investright-2.png",
				"contactPoint": {
					"@type": "ContactPoint",
					"telephone": "+1-800-373-6393",
					"contactType": "Customer Support",
					"areaServed": "CA",
					"contactOption": "TollFree",
					"availableLanguage": "English"
				},
				"sameAs": [
					"https://www.facebook.com/BCSCInvestRight/",
					"https://twitter.com/BCSCInvestRight",
					"https://www.youtube.com/user/BCSCInvestRight",
					"https://plus.google.com/116131354598289453937"
				]
			}
		</script>
	<?php } else { }?>
</head>
<!-- Header Section -->
<body class="<?php echo $nvBodyCls; ?> <?php echo $nvbodyfrdtemp; ?>">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTZX4W" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<input type="hidden" name="fullpathtemplateurl" id="fullpathtemplateurl" value="<?php echo $template_url; ?>">
<div class="main-wrapper <?php echo $nvfrdtemp; ?>">
<header>
<!-- Notification -->
<?php
	$nvNotiMsg = of_get_option( 'notification_msg_'.$ndLng );
	if($nvNotiMsg!="") {
		echo '<div class="notification-top"><p>'.$nvNotiMsg.'</p></div>';
	}
?>
<div class="row">
    <div class="logo-wrap web-logo"><a href="<?php echo home_url() ?>"><img src="<?php echo of_get_option( 'logo' ); ?>" alt="<?php _e( "Logo - InvestRight", "investright" ); ?>" title="<?php _e( "Logo - InvestRight", "investright" ); ?>"></a></div>
	<div class="logo-wrap print-logo-wrap"><a href="<?php echo home_url() ?>"><img src="https://www.investright.org/wp-content/uploads/2016/12/print-logo.jpg" alt="<?php _e( "Logo - InvestRight", "investright" ); ?>" title="<?php _e( "Logo - InvestRight", "investright" ); ?>"></a></div>
      <!-- Mobile Menu start from here -->
      <div class="mobile-menu"></div>
      <!-- Mobile Menu End here -->
      <div class="header-mobile-search">
		<form action="<?php echo home_url( '/' ); ?>" method="get">
			<input type="search" placeholder="SITE SEARCH" class="header-search-field" value="<?php echo get_search_query() ?>" name="s">
			<input type="submit" class="header-search-btn" value="">
		</form>
	</div>
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
		
		
		if($pageId==9093) {
			$nvLngMetaQry = "pa";
		} else if($pageId==9117) {
			$nvLngMetaQry = "zh";
		} else {
			$nvLngMetaQry = "en";
		}
		
		$nvLangAry = array("en" => "English", "pa" => "ਪੰਜਾਬੀ", "zh" => "繁體中文");
		unset($nvLangAry[$nvLngMetaQry]);
	?>
	
	<ul class="header-nav inline">
		<li class="has-child"><a href="#">
		<?php 
			if($pageId==9093) {
				echo "ਪੰਜਾਬੀ";
			} else if($pageId==9117) {
				echo "繁體中文";
			} else {
				echo "English";
			}
		?> 
			<img src="<?php echo $template_url; ?>/images/icon/down-arrow.png" alt="" class="arrow-icon"></a>
			<ul class="header-nav-child">
				<?php // Language Switcher
					foreach($nvLangAry as $key => $value) {
						echo '<li><a href="/'.$key.'/">'.$value.'</a></li>';
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
        <li><a href="<?php echo of_get_option( 'facebook_url' ); ?>" target="_blank" title="<?php _e( "Facebook", "investright" ); ?>">
          <span class="icon iconset icon-fb"></span>
          </a></li>
        <li><a href="<?php echo of_get_option( 'twitter_url' ); ?>" target="_blank" title="<?php _e( "Twitter", "investright" ); ?>">
          <span class="icon iconset icon-tw"></span>
          </a></li>
        <li><a href="<?php echo of_get_option( 'youtube_url' ); ?>" target="_blank" title="<?php _e( "Youtube", "investright" ); ?>">
          <span class="icon iconset icon-utube"></span>
          </a></li>
        <li id="textsizer" class="font-sizer"><a href="#" class="small" title="<?php _e( "A Small", "investright" ); ?>"><?php _e( "A", "investright" ); ?></a><a href="#" class="medium" title="<?php _e( "A Medium", "investright" ); ?>"><?php _e( "A", "investright" ); ?></a><a href="#" class="large" title="<?php _e( "A Large", "investright" ); ?>"><?php _e( "A", "investright" ); ?></a></li>
        <li onclick="window.print();"><a href="#" title="<?php _e( "Print", "investright" ); ?>">
          <span class="icon iconset icon-print"></span>
          </a>
		  </li>
      </ul>
    </div>
</div>
<!-- Main Menu -->
<nav>
	<div class="row">
		<div class="main-menu">
			<?php 
			if($pageId==9093 || $pageId==9117) {
				if($pageId==9093) {
					$footer_menu = array('theme_location' => 'Punjabi_Menu', 'menu' => 'Punjabi Menu', 'container' => false, 'echo' => true, 'menu_id' => 'menu', 'menu_class' => 'second-lang-menu-list');
					wp_nav_menu( $footer_menu );
				} else {
					$footer_menu = array('theme_location' => 'Chinese_Menu', 'menu' => 'Chinese Menu', 'container' => false, 'echo' => true, 'menu_id' => 'menu', 'menu_class' => 'second-lang-menu-list');
					wp_nav_menu( $footer_menu );
				}
			} else { ?>
			<ul id="menu">
				<?php $nvCls = ""; if($pageId==215) {$nvCls = "active";} ?>
				<li class="has-child invest <?php echo $nvCls; ?>">
					<a href="<?php echo get_permalink(215);?>" title="<?php _e( "Investing 101", "investright" ); ?>"><?php _e( "Investing 101", "investright" ); ?>
					<img id="1" src="<?php echo $template_url; ?>/images/icon/down-arrow.png" alt="" class="mobilemenu arrow-icon"></a>
					<div class="mega-menu">
						<?php
							$menu1=get_post_meta(215,'investright_menu1',true);
							$menu2=get_post_meta(215,'investright_menu2',true);
							$menu3=get_post_meta(215,'investright_menu3',true);
							$menu1 = array(
								'theme_location' => '',
								'menu' => $menu1, 
								'menu_class' => 'mm-list',
								'container' => false,
								'echo' => true,
								'depth' => 0,
							);
							wp_nav_menu( $menu1 );
						?>
						<div class="mm-group">
						<?php
							$menu2 = array(
								'menu' => 'Types Of Investments Menu', 
								'menu_class' => $menu2,
								'menu_class' => 'mm-list',
								'container'	=> false,
								'echo' => true,
								'depth' => 0,
							);
							wp_nav_menu( $menu2 );
						?>
						</div>
						<div class="mm-group">
						<?php
							$menu3 = array(
								'menu' => $menu3, 
								'menu_class' => '',
								'echo' => true,
								'menu_class' => 'mm-list',
								'container' => false,
								'depth' => 0,
							);
							wp_nav_menu( $menu3 );
										
							$nvImage1 = get_post_meta(215, "investright_imgadv1", true);
							$nvImage2 = get_post_meta(215, "investright_imgadv2", true);
							$nvImage1 = wp_get_attachment_image_src($nvImage1, 'full');
							$nvImage2 = wp_get_attachment_image_src($nvImage2, 'full');
							$nvLink1 = get_post_meta(215, "investright_chiclets_1", true);
							$nvLink2 = get_post_meta(215, "investright_chiclets_2", true);
							$nvCheckBox1 = get_post_meta(215, "investright_checkbox_1", true);
							$nvCheckBox2 = get_post_meta(215, "investright_checkbox_2", true);
							
							if($nvLink1=="") {
								$nvLink1 = "#";
							}
							if($nvLink2=="") {
								$nvLink2 = "#";
							}
							$nvTrgBlck1 = "";
							$nvTrgBlck2 = "";
							if($nvCheckBox1!=0) {
								$nvTrgBlck1 = 'target="_blank"';
							}
							if($nvCheckBox2!=0) {
								$nvTrgBlck2 = 'target="_blank"';
							}
						?>
						</div>
						<div class="box-link-wrap">
						<?php
							if($nvImage1[0]!="") {
								echo '<div class="blue-box"><a href="'.$nvLink1.'" '.$nvTrgBlck1.'><img src="'.$nvImage1[0].'" alt="Chiclets" /></a></div>';
							}
							if($nvImage2[0]!="") {
								echo '<div class="blue-box"><a href="'.$nvLink2.'" '.$nvTrgBlck2.'><img src="'.$nvImage2[0].'" alt="Chiclets" /></a></div>';
							}
						?>
						</div>
					</div>
				</li>
				<?php
				$nvCls = ""; if($pageId==265) {$nvCls = "active";} ?>
				<li class="has-child smart <?php echo $nvCls; ?>"><a href="<?php echo get_permalink(265);?>" title="<?php _e( "Informed Investing", "investright" ); ?>"><?php _e( "Informed Investing", "investright" ); ?>
					<img id="2" src="<?php echo $template_url; ?>/images/icon/down-arrow.png" alt="" class="mobilemenu arrow-icon"></a>
					<div class="mega-menu">
						<div class="mm-group col-one">
						  <?php
								$menu1=get_post_meta(265,'investright_menu1',true);
								$menu2=get_post_meta(265,'investright_menu2',true);
								$menu3=get_post_meta(265,'investright_menu3',true);
								$menu1 = array(
									'theme_location'  => '',
									'menu'            => $menu1, 
									'menu_class'	  => 'mm-list',
									'container'		  => false,
									'echo'            => true,
									'depth'           => 0,
								);
								wp_nav_menu( $menu1 );
							?>
						</div>
						<div class="mm-group col-two">
						<?php
							$menu2 = array(
								'theme_location'  => '',
								'menu'            => $menu2, 
								'menu_class'	  => 'mm-list',
								'container'		  => false,
								'echo'            => true,
								'depth'           => 0,
							);
							wp_nav_menu( $menu2 );
						?>
						</div>
						<div class="mm-group col-three">
						<?php
							$menu3 = array(
								'theme_location'  => '',
								'menu'            => $menu3, 
								'menu_class'	  => 'mm-list',
								'container'		  => false,
								'echo'            => true,
								'depth'           => 0,
							);
							wp_nav_menu( $menu3 );
								
							$nvImage1 = get_post_meta(265, "investright_imgadv1", true);
							$nvImage2 = get_post_meta(265, "investright_imgadv2", true);
							$nvImage1 = wp_get_attachment_image_src($nvImage1, 'full');
							$nvImage2 = wp_get_attachment_image_src($nvImage2, 'full');
							$nvLink1 = get_post_meta(265, "investright_chiclets_1", true);
							$nvLink2 = get_post_meta(265, "investright_chiclets_2", true);
							$nvCheckBox1 = get_post_meta(265, "investright_checkbox_1", true);
							$nvCheckBox2 = get_post_meta(265, "investright_checkbox_2", true);
							
							$nvTrgBlck1 = "";
							$nvTrgBlck2 = "";
							if($nvCheckBox1!=0) {
								$nvTrgBlck1 = 'target="_blank"';
							}
							if($nvCheckBox2!=0) {
								$nvTrgBlck2 = 'target="_blank"';
							}
							
							if($nvLink1=="") {
								$nvLink1 = "#";
							}
							if($nvLink2=="") {
								$nvLink2 = "#";
							}
						?>
						</div>
						<div class="box-link-wrap">
							<?php
								if($nvImage1[0]!="") {
									echo '<div class="blue-box"><a href="'.$nvLink1.'" '.$nvTrgBlck1.'><img src="'.$nvImage1[0].'" alt="" /></a></div>';
								}
								if($nvImage2[0]!="") {
									echo '<div class="blue-box"><a href="'.$nvLink2.'" '.$nvTrgBlck2.'><img src="'.$nvImage2[0].'" alt="" /></a></div>';
								}
							?>				  
						</div>
					</div>
				</li>
				<?php
				$nvCls = ""; if($pageId==303) {$nvCls = "active";} ?>
				<li class="has-child fraud <?php echo $nvCls; ?>"><a href="<?php echo get_permalink(303)?>" title="<?php _e( "Fraud Awareness", "investright" ); ?>"><?php _e( "Fraud Awareness", "investright" ); ?>
					<img id="3" src="<?php echo $template_url; ?>/images/icon/down-arrow.png" alt="" class="mobilemenu arrow-icon"></a>
					<div class="mega-menu">
						<div class="mm-group col-one">
							<?php
								$menu1=get_post_meta(303,'investright_menu1',true);
								$menu2=get_post_meta(303,'investright_menu2',true);
								$menu3=get_post_meta(303,'investright_menu3',true);
								$menu4=get_post_meta(303,'investright_menu4',true);
								$menu5=get_post_meta(303,'investright_menu5',true);
								$menu6=get_post_meta(303,'investright_menu6',true);

								$menu1 = array(
									'theme_location'  => '',
									'menu'            => $menu1, 
									'menu_class'	  => 'mm-list',
									'container'		  => false,
									'echo'            => true,
									'depth'           => 0,
								);
								wp_nav_menu( $menu1 );

								$menu2 = array(
									'theme_location'  => '',
									'menu'            => $menu2, 
									'menu_class'	  => 'mm-list',
									'container'		  => false,
									'echo'            => true,
									'depth'           => 0,
								);
								wp_nav_menu( $menu2 );
								
								$menu3 = array(
									'theme_location'  => '',
									'menu'            => $menu3, 
									'menu_class'	  => 'mm-list',
									'container'		  => false,
									'echo'            => true,
									'depth'           => 0,
								);
								wp_nav_menu( $menu3 );
							?>
						</div>
						<div class="mm-group">
							<?php
								$menu4 = array(
									'theme_location'  => '',
									'menu'            => $menu4, 
									'menu_class'	  => 'mm-list',
									'container'		  => false,
									'echo'            => true,
									'depth'           => 0,
								);
								wp_nav_menu( $menu4 );
							?>
						</div>
						<div class="mm-group">
							<?php
								$menu5 = array(
									'theme_location'  => '',
									'menu'            => $menu5, 
									'menu_class'	  => 'mm-list',
									'container'		  => false,
									'echo'            => true,
									'depth'           => 0,
								);
								wp_nav_menu( $menu5 );
								
								$menu6 = array(
									'theme_location'  => '',
									'menu'            => $menu6, 
									'menu_class'	  => 'mm-list',
									'container'		  => false,
									'echo'            => true,
									'depth'           => 0,
								);
								wp_nav_menu( $menu6 );
								
								$nvImage1 = get_post_meta(303, "investright_imgadv1", true);
								$nvImage2 = get_post_meta(303, "investright_imgadv2", true);
								$nvImage3 = get_post_meta(303, "investright_imgadv3", true);
								$nvImage1 = wp_get_attachment_image_src($nvImage1, 'full');
								$nvImage2 = wp_get_attachment_image_src($nvImage2, 'full');
								$nvImage3 = wp_get_attachment_image_src($nvImage3, 'full');
								$nvLink1 = get_post_meta(303, "investright_chiclets_1", true);
								$nvLink2 = get_post_meta(303, "investright_chiclets_2", true);
								$nvLink3 = get_post_meta(303, "investright_chiclets_3", true);
								$nvCheckBox1 = get_post_meta(303, "investright_checkbox_1", true);
								$nvCheckBox2 = get_post_meta(303, "investright_checkbox_2", true);
								$nvCheckBox3 = get_post_meta(303, "investright_checkbox_3", true);
								
								$nvTrgBlck1 = "";
								$nvTrgBlck2 = "";
								$nvTrgBlck2 = "";
								if($nvCheckBox1!=0) {
									$nvTrgBlck1 = 'target="_blank"';
								}
								if($nvCheckBox2!=0) {
									$nvTrgBlck2 = 'target="_blank"';
								}
								if($nvCheckBox3!=0) {
									$nvTrgBlck3 = 'target="_blank"';
								}
								
								if($nvLink1=="") {
									$nvLink1 = "#";
								}
								if($nvLink2=="") {
									$nvLink2 = "#";
								}
								if($nvLink3=="") {
									$nvLink3 = "#";
								}
							?>
						</div>
						<div class="box-link-wrap">
							<?php
								if($nvImage1[0]!="") {
									echo '<div class="blue-box"><a href="'.$nvLink1.'" '.$nvTrgBlck1.'><img src="'.$nvImage1[0].'" alt="" /></a></div>';
								}
								if($nvImage2[0]!="") { ?>
									<div class="blue-box"><a onclick="ga('send','event',{'eventCategory':'ReportConcern','eventAction':'click', 'eventLabel':'ReportConcernMegaMenu'})" href="<?php echo $nvLink2; ?>" <?php echo $nvTrgBlck2; ?>><img src=<?php echo $nvImage2[0]; ?> alt="" /></a></div>
							<?php	}
								if($nvImage3[0]!="") { 
									echo '<div   class="blue-box"><a  href="'.$nvLink3.'" '.$nvTrgBlck3.'><img src="'.$nvImage3[0].'" alt="" /></a></div>';
								}?>
						</div>
					</div>
				</li>
				<?php
				$nvCls = "";
				if($pageId==210) {$nvCls = "active";} ?>
				<li class="has-child resources <?php echo $nvCls; ?>"><a href="<?php echo get_permalink(210);?>" title="<?php _e( "Resources", "investright" ); ?>"><?php _e( "Resources", "investright" ); ?>
					<img id="4" src="<?php echo $template_url; ?>/images/icon/down-arrow.png" alt="" class="mobilemenu arrow-icon"></a>
					<div class="mega-menu">
						<?php
							$menu1=get_post_meta(210,'investright_menu1',true);
							$menu2=get_post_meta(210,'investright_menu2',true);
							$menu3=get_post_meta(210,'investright_menu3',true);
							$menu4=get_post_meta(210,'investright_menu4',true);
							$menu5=get_post_meta(210,'investright_menu5',true);

							$menu1 = array(
								'theme_location'  => '',
								'menu'            => $menu1, 
								'menu_class'	  => 'mm-list all-caps',
								'container'		  => false,
								'echo'            => true,
								'depth'           => 0,
							);
							wp_nav_menu( $menu1 );
						?>
						<div class="mm-group">
							<?php
								$menu2 = array(
									'theme_location'  => '',
									'menu'            => $menu2, 
									'menu_class'	  => 'mm-list',
									'container'		  => false,
									'echo'            => true,
									'depth'           => 0,
								);
								wp_nav_menu( $menu2 );
								$menu3 = array(
									'theme_location'  => '',
									'menu'            => $menu3, 
									'menu_class'	  => 'mm-list',
									'container'		  => false,
									'echo'            => true,
									'depth'           => 0,
								);
								wp_nav_menu( $menu3 );
							?>
						</div>
						<div class="mm-group">
							<?php
								$menu4 = array(
									'theme_location'  => '',
									'menu'            => $menu4, 
									'menu_class'	  => 'mm-list',
									'container'		  => false,
									'echo'            => true,
									'depth'           => 0,
								);
								wp_nav_menu( $menu4 );
								/*$menu5 = array(
									'theme_location'  => '',
									'menu'            => $menu5, 
									'menu_class'	  => 'mm-list',
									'container'		  => false,
									'echo'            => true,
									'depth'           => 0,
								);
								wp_nav_menu( $menu5 );*/
								$nvImage1 = get_post_meta(210, "investright_imgadv1", true);
								$nvImage2 = get_post_meta(210, "investright_imgadv2", true);
								$nvImage1 = wp_get_attachment_image_src($nvImage1, 'full');
								$nvImage2 = wp_get_attachment_image_src($nvImage2, 'full');
								$nvLink1 = get_post_meta(210, "investright_chiclets_1", true);
								$nvLink2 = get_post_meta(210, "investright_chiclets_2", true);
								$nvCheckBox1 = get_post_meta(210, "investright_checkbox_1", true);
								$nvCheckBox2 = get_post_meta(210, "investright_checkbox_2", true);
								
								$nvTrgBlck1 = "";
								$nvTrgBlck2 = "";
								if($nvCheckBox1!=0) {
									$nvTrgBlck1 = 'target="_blank"';
								}
								if($nvCheckBox2!=0) {
									$nvTrgBlck2 = 'target="_blank"';
								}
								
								if($nvLink1=="") {
									$nvLink1 = "#";
								}
								if($nvLink2=="") {
									$nvLink2 = "#";
								}
							?>
						</div>
						<div class="box-link-wrap">
							<?php
								if($nvImage1[0]!="") {
									echo '<div class="blue-box"><a href="'.$nvLink1.'" '.$nvTrgBlck1.'><img src="'.$nvImage1[0].'" alt="" /></a></div>';
								}

								if($nvImage2[0]!="") {
									echo '<div class="blue-box"><a href="'.$nvLink2.'" '.$nvTrgBlck2.'><img src="'.$nvImage2[0].'" alt="" /></a></div>';
								}
							?>				  
						</div>
					</div>
				</li>
				<?php $nvCls = "";
				if($pageId==6852) {$nvCls = "active";} ?>
				<li class="has-child about <?php echo $nvCls; ?>"><a href="<?php echo the_permalink(6852);?>" title="<?php _e( "Blog", "investright" ); ?>"><?php _e( "Blog", "investright" ); ?>
					<img id="5" src="<?php echo $template_url; ?>/images/icon/down-arrow.png" alt="" class="mobilemenu arrow-icon"></a>
					<div class="about-subitems">
					<?php
						$menu1=get_post_meta(6852,'investright_menu1',true);
						$menu1 = array(
							'theme_location'  => '',
							'menu'            => $menu1, 
							'menu_class'	  => 'mm-list',
							'container'		  => false,
							'echo'            => true,
							'depth'           => 0,
						);
						wp_nav_menu( $menu1 );
					?>
					</div>
				</li>
			</ul>
			<?php } ?>
		</div>
		<div  class="report-nav"><a onclick="ga('send','event',{'eventCategory':'ReportConcern','eventAction':'click', 'eventLabel':'ReportConcernTop'});" href="<?php echo of_get_option( 'report_a_concern_link' ); ?>" target="_blank" title="<?php _e( "Report a Concern", "investright" ); ?>"><?php _e( "Report a Concern", "investright" ); ?><span class="icon iconset icon-arrowRight"></span></a></div>
	</div>
</nav>
</header>