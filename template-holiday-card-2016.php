<?php
/*
 * Template Name: Holiday Card Template 2016
 */
setcookie("holiday_card", "", time() - 3600);
if(empty($_COOKIE['holiday_card']) || wp_is_mobile()) {
	setcookie("holiday_card","1",time() + (10 * 365 * 24 * 60 * 60));
} elseif($_GET["holiday_card"] == "clear") {
	setcookie("holiday_card", "", time() - 3600);
}
global $template_url;
global $site_url;
$nvBodyCls = '';
if ( is_page_template('template-no-sidebar.php') ) {
    $nvBodyCls = 'class="full-width"';
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
	<link rel="icon" href="<?php echo of_get_option( 'favicon' ); ?>" type="image/x-icon" />
    
    
	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	
	<?php wp_head(); ?>
	
	
	<link rel="stylesheet" href="<?php echo $template_url; ?>/print.css" type="text/css" media="print" />
	
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php wp_title(); ?>" />

	<?php
		if ( is_page_template('template-holiday-card.php') || is_page_template('template-holiday-card-2016.php') ) {
			$nvFBtxt = of_get_option('facebook_share_msg_play');
			$nvFBTitle = of_get_option('facebook_share_title_play');
			?>
				<meta property="og:title" content="<?php echo $nvFBTitle; ?>" />
				<meta property="og:description" content="<?php echo $nvFBtxt; ?>" />
				<meta property="og:url" content="<?php echo get_permalink();?>?play=" />
				<meta property="og:image" content="<?php echo of_get_option( 'facebook_holiday_img' ); ?>"/>
			<?php
		}
	?>
    <meta property="og:site_name" content="Investright" />
	
	<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" id="st_insights_js" src="http://w.sharethis.com/button/buttons.js?publisher=14c1095b-395b-4705-be9f-d9dba6d654f9"></script>
<script type="text/javascript">stLight.options({publisher: "14c1095b-395b-4705-be9f-d9dba6d654f9", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
	<script src="//cdn.trackduck.com/toolbar/prod/td.js" async data-trackduck-id="57b3340ca2703b9637d9291c"></script>
	<style type="text/css">
      #map { height: 450px; margin: 0; width: 100%; }
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
		
		//only for holiday card play google event code. don't uncomment.
		//ga('send', 'event', 'Button', 'Play', 'Win Game');
		
    </script>
	
<!--END Google Analytics Tracking Code-->
</head>

<!-- Header Section -->
<body <?php echo $nvBodyCls; ?>>
<div class="orientation">
<div class="msg-box">
Please position your device in landscape mode 
</div>
</div>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTZX4W"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<input type="hidden" name="fullpathtemplateurl" id="fullpathtemplateurl" value="<?php echo $template_url; ?>">
<div class="container-innerpage" id="pjax-container">
    <div class="row">
		<div id="page-holiday" class="page-holiday" data-gotcha="<?php if(!empty($_GET["try"])) { echo 0; } else { echo rand(1,3); } ?>">
<div class="open-screen" <?php if(!empty($_GET['try'])) { echo 'style="display:none;"'; } ?>>

<div class="screen-content">
<h1>Take a Look<br />
but Don't Get Caught!
</h1>
<p>Click on 3 presents and we’ll make a donation on your behalf to the <br>Greater Vancouver Food Bank.</p>
<p>Good luck!</p>
<a href="javascript:void(0);" class="play-bt">Play</a>
</div>

</div>

<div class="win-screen">

<div class="screen-content">
<h1>Happy Holidays <br>from the BCSC</h1>
    <p><a href="https://www.investright.org" target="_blank"><img src="<?php echo $template_url; ?>/images/holiday-card-logo.png" alt="logo" ></a></p>
<div class="share">
<span>SHARE WITH A FRIEND</span>
<?php
	$nvTWtxt = of_get_option('twitter_share_msg_play');
	$nvSubTxt = of_get_option('email_subject_play');
	$nvBodyTxt = of_get_option('email_body_msg_play');
	$nvTWtxt = ($nvTWtxt != '' ? urlencode( html_entity_decode( $nvTWtxt, ENT_COMPAT, 'UTF-8' ) ) : urlencode( html_entity_decode( $nvTWtxt, ENT_COMPAT, 'UTF-8' ) ));
?>
<a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink();?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><img src="<?php echo $template_url; ?>/images/fb-icon.png" alt="Facebook Share" ></a>
<a href="https://twitter.com/intent/tweet?text=<?php echo $nvTWtxt; ?>" target="_blank"><img src="<?php echo $template_url; ?>/images/twitter-icon.png" alt="Twitter Share" ></a>
<a href="mailto:?subject=<?php echo $nvSubTxt; ?>&body=<?php echo esc_attr($nvBodyTxt); ?>"><img src="<?php echo $template_url; ?>/images/mail-icon.png" alt="Email Share" ></a>
</div>
<a href="javascript:void(0);" class="play-bt play-bt-again">Play Again</a>
</div>
</div>

<div class="container-holiday">

<div class="gift-box gift-box-01 clickable">
<div class="gift-item"><img  class="giftImages" src="<?php echo $template_url; ?>/images/present_horse.png" alt="gift hourse" /></div>
<div class="gift-item"><img  class="giftImages" src="<?php echo $template_url; ?>/images/present_nutcracker.png" alt="present nutcracker" /></div>
<div class="gift-item">

<div class="gotcha">
<img src="<?php echo $template_url; ?>/images/gochta.png" alt="Gotcha!" >
<div class="gotcha-box">
GOTCHA!
<a href="javascript:void(0);" class="try-again">Try Again</a>
</div>

</div>

</div>
</div>
<div class="gift-box gift-box-02 clickable">
<div class="gift-item"><img  class="giftImages" src="<?php echo $template_url; ?>/images/present_hat.png" alt="gift hourse" /></div>
<div class="gift-item"><img  class="giftImages" src="<?php echo $template_url; ?>/images/present_sled.png" alt="present nutcracker" /></div>
<div class="gift-item">

<div class="gotcha">
<img src="<?php echo $template_url; ?>/images/gochta.png" alt="Gotcha!" >
<div class="gotcha-box">
GOTCHA!
<a href="javascript:void(0);" class="try-again">Try Again</a>
</div>
</div>

</div>
</div>
<div class="gift-box gift-box-03 clickable">
<div class="gift-item"><img class="giftImages" src="<?php echo $template_url; ?>/images/present_skates.png" alt="gift hourse" /></div>
<div class="gift-item"><img class="giftImages" src="<?php echo $template_url; ?>/images/present_truck.png" alt="present nutcracker" /></div>
<div class="gift-item">

<div class="gotcha">
<img src="<?php echo $template_url; ?>/images/busted.png" alt="Busted!" >
<div class="gotcha-box">
REALLY?
<a href="javascript:void(0);" class="try-again">Try Again</a>
</div>
</div>

</div>
</div>
<div class="gift-box gift-box-04 clickable">
<div class="gift-item"><img class="giftImages" src="<?php echo $template_url; ?>/images/present_bear.png" alt="gift hourse" /></div>
<div class="gift-item"><img class="giftImages" src="<?php echo $template_url; ?>/images/present_gingerbread.png" alt="present nutcracker" /></div>
<div class="gift-item">


<div class="gotcha">
<img src="<?php echo $template_url; ?>/images/really.png" alt="Really?" >
<div class="gotcha-box">
REALLY?
<a href="javascript:void(0);" class="try-again">Try Again</a>
</div>
</div>

</div>
</div>
<div class="gift-box gift-box-05 clickable">
<div class="gift-item"><img class="giftImages" src="<?php echo $template_url; ?>/images/present_socks.png" alt="gift hourse" /></div>
<div class="gift-item"><img class="giftImages" src="<?php echo $template_url; ?>/images/present_sweater.png" alt="present nutcracker" /></div>
<div class="gift-item">

<div class="gotcha">
<a href="javascript:void(0);" class="try-again">Try Again</a>
<img src="<?php echo $template_url; ?>/images/seriously.png" alt="Seriously?" >
<div class="gotcha-box">
SERIOUSLY?

</div>
</div>

</div>
</div>
<div class="overlay"<?php if(!empty($_GET['try'])) { echo 'style="display:none;"'; } ?>></div>
</div>

</div>
 <!-- Body Content -->
  <!--<div class="container-innerpage">
    <div class="row">
      
        <div class="breadcrumb"> <strong>You are here:</strong> 
<?php /*?>		<?php
			if(function_exists('bcn_display')) {
				bcn_display();
			}
       ?><?php */?>
		</div>


<div class="open-screen">

<div class="screen-content">
<h1>Take a Look<br />
but Don't Get Caught!
</h1>
<p>Click on 3 presents without getting caught and we will make a donation on your behalf to the Greater Vancouver Food Bank.</p>
<p>Good luck!</p>
<a href="javascript:void(0);" onClick="playGame()" class="play-bt">Play</a>
</div>

</div>

<div class="win-screen">

<div class="screen-content">
<h1>Happy Holidays
</h1>
<p>Please join us in making a donation to the <br >
  <a href="https://www.foodbank.bc.ca">Greater Vancouver Food Bank.</a></p>
<p><img src="<?php echo $template_url; ?>/images/logo.png" alt="logo" ></p>
<div class="share">
<span>SHARE WITH A FRIEND:</span>
<a href="#"><img src="<?php echo $template_url; ?>/images/fb-icon.png" alt="Facebook Share" ></a>
<a href="#"><img src="<?php echo $template_url; ?>/images/twitter-icon.png" alt="Twitter Share" ></a>
<a href="#"><img src="<?php echo $template_url; ?>/images/mail-icon.png" alt="Email Share" ></a>
</div>
<a href="javascript:void(0);" onClick="tryAgain()" class="play-bt">Play Again</a>
</div>
</div>

<div class="container">

<div class="gift-box gift-box-01">
<div class="gift-item"><img  class="giftImages" src="<?php echo $template_url; ?>/images/present_horse.png" alt="gift hourse" /></div>
<div class="gift-item"><img  class="giftImages" src="<?php echo $template_url; ?>/images/present_nutcracker.png" alt="present nutcracker" /></div>
<div class="gift-item">

<div class="gotcha">
<img src="<?php echo $template_url; ?>/images/gochta.png" alt="Gotcha!" >
<div class="gotcha-box">
GOTCHA!
<a href="javascript:void(0);" onClick="tryAgain()">Try Again</a>
</div>

</div>

</div>
</div>
<div class="gift-box gift-box-02">
<div class="gift-item"><img  class="giftImages" src="<?php echo $template_url; ?>/images/present_hat.png" alt="gift hourse" /></div>
<div class="gift-item"><img  class="giftImages" src="<?php echo $template_url; ?>/images/present_sled.png" alt="present nutcracker" /></div>
<div class="gift-item">

<div class="gotcha">
<img src="<?php echo $template_url; ?>/images/gochta.png" alt="Gotcha!" >
<div class="gotcha-box">
GOTCHA!
<a href="javascript:void(0);" onClick="tryAgain()">Try Again</a>
</div>
</div>

</div>
</div>
<div class="gift-box gift-box-03">
<div class="gift-item"><img class="giftImages" src="<?php echo $template_url; ?>/images/present_skates.png" alt="gift hourse" /></div>
<div class="gift-item"><img class="giftImages" src="<?php echo $template_url; ?>/images/present_truck.png" alt="present nutcracker" /></div>
<div class="gift-item">

<div class="gotcha">
<img src="<?php echo $template_url; ?>/images/busted.png" alt="Busted!" >
<div class="gotcha-box">
BUSTED!
<a href="javascript:void(0);" onClick="tryAgain()">Try Again</a>
</div>
</div>

</div>
</div>
<div class="gift-box gift-box-04">
<div class="gift-item"><img class="giftImages" src="<?php echo $template_url; ?>/images/present_bear.png" alt="gift hourse" /></div>
<div class="gift-item"><img class="giftImages" src="<?php echo $template_url; ?>/images/present_gingerbread.png" alt="present nutcracker" /></div>
<div class="gift-item">


<div class="gotcha">
<img src="<?php echo $template_url; ?>/images/really.png" alt="Really?" >
<div class="gotcha-box">
REALLY?
<a href="javascript:void(0);" onClick="tryAgain()">Try Again</a>
</div>
</div>

</div>
</div>
<div class="gift-box gift-box-05">
<div class="gift-item"><img class="giftImages" src="<?php echo $template_url; ?>/images/present_socks.png" alt="gift hourse" /></div>
<div class="gift-item"><img class="giftImages" src="<?php echo $template_url; ?>/images/present_sweater.png" alt="present nutcracker" /></div>
<div class="gift-item">

<div class="gotcha">
<a href="javascript:void(0);" onClick="tryAgain()">Try Again</a>
<img src="<?php echo $template_url; ?>/images/seriously.png" alt="Seriously?" >
<div class="gotcha-box">
SERIOUSLY?

</div>
</div>

</div>
</div>
<div class="overlay">
</div>
</div>

</div>
        
		<?php /*?><?php
		
		if( have_posts() ) : 
			while( have_posts() ) : the_post();
			?>
				<h1><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
			<?php
			endwhile;
		endif;		  
		?>
	  <?php */?>


</div>-->
</div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<!--<script src="http://investright.108ideaspace.com/wp-content/themes/investright/js/pjax.js"></script>-->
<script type="text/javascript">
jQuery(document).ready(function() {
    var count;
    var audio = new Audio('http://www.investright.org/wp-content/themes/investright/audio/057364340-x-mas-magix-no-leads.mp3');
	audio.addEventListener('ended', function() {
		this.currentTime = 0;
		this.play();
	}, false);
	audio.play();
	
	jQuery(".play-bt").on("click", function() {
		playGame();
	});
    function playGame() {
        jQuery(".open-screen").fadeOut([500]);
        jQuery(".overlay").hide();
		ga('send','event',{'eventCategory':'holidaycard_playbtn','eventAction':'click', 'eventLabel':'Holiday Card 2016'});
    };
    function winGame() {
        jQuery(".win-screen").fadeIn([500]);
		//ga('send','event',{'eventCategory':'calculator_btn','eventAction':'click', 'eventLabel':'Investment Fee Calculator'});
    };
	jQuery(".gotcha-box a, .try-again").on("click", function() {
		tryAgain("try");
		return false;
	});
	jQuery(".play-bt-again").on("click", function() {
		tryAgain("play");
		return false;
	});
    function tryAgain(action) {
        count = 0;

        jQuery(".gift-box").children(".gift-item").fadeOut([500]).delay(1000);
        jQuery(".overlay").fadeOut([500]).delay(1000);
        jQuery(".animates-box").fadeOut([500]).delay(1000);
		var originalURL = window.location.href;
		
		if(action=='play') {
ga('send','event',{'eventCategory':'holidaycard_playbtn','eventAction':'click', 'eventLabel':'Holiday Card 2016'});
			var alteredURL = removeParam("try", originalURL);
			<?php if(!empty($_GET["play"])) { ?>
			window.location.href = originalURL;
			<?php } else { ?>
			window.location.href = alteredURL+"?play=again";
			<?php } ?>
		} else {
			var alteredURL = removeParam("play", originalURL);
        <?php if(!empty($_GET["try"])) { ?>
			window.location.reload();
		<?php } else { ?>
			window.location.href = alteredURL+"?try=again";
		<?php } ?>
		}

    }
	function removeParam(key, sourceURL) {
		var rtn = sourceURL.split("?")[0],
			param,
			params_arr = [],
			queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
		if (queryString !== "") {
			params_arr = queryString.split("&");
			for (var i = params_arr.length - 1; i >= 0; i -= 1) {
				param = params_arr[i].split("=")[0];
				if (param === key) {
					params_arr.splice(i, 1);
				}
			}
			rtn = rtn + "?" + params_arr.join("&");
		}
		return rtn;
	}
    function playAgain() {
        //winGameReset();
        //count = 0;
        //jQuery(".gift-box").children(".gift-item").fadeOut([500]).delay(1000);
		jQuery(".overlay").hide();
        setTimeout(function() {
            jQuery(".overlay").fadeOut([500]);
            jQuery(".gift-box").removeClass("animates-box");
        }, 500);
        setTimeout(function() {
            jQuery(".gift-item").attr("style", "");
        }, 600);
        //holidayGift();
        window.location.reload();
    }

    jQuery(".gift-box").mouseenter(function() {
        jQuery(this).addClass("shakes");

    }).mouseleave(function() {
        jQuery(this).removeClass("shakes");
    });
    jQuery(".gift-box.animates-box").mouseenter(function() {
        jQuery(this).removeClass("shakes");

    }).mouseleave(function() {
        jQuery(this).removeClass("shakes");
    });

    function holidayGift() {
       

        count = 0;
        //var clicked = false;
     
        jQuery(".clickable").one("click",function() {
            
            var $this = jQuery(this);
            $this.removeClass("clickable");

            var giftOpen = true;
            
            var totalGift = 0;
            //var clicked = true;
            count++;
			
            var getIndex = $this.index();
            $this.addClass("no-shakes");
            
            $this.addClass("non-clickable");
            $this.queue(function() {
                jQuery(".overlay").fadeIn();
                $this.addClass("animates-box").dequeue();
            });
			
            $this.queue(function() {
				var gotcha = jQuery("#page-holiday").data("gotcha");
                <?php if(!empty($_GET["try"])) { ?>
				var giftItemRandom = Math.floor(Math.random() * 2);
				<?php } else { ?>
				if( gotcha != 0 && count == gotcha) {
					var giftItemRandom = 2;
				} else {
					var giftItemRandom = Math.floor(Math.random() * 3);
				}
				<?php } ?>

                if (giftItemRandom < 2 && count < 3) {

                    if (getIndex == 0 && giftItemRandom == 0) {

                        //alert(giftItemRandom);
                        $this.addClass("customized");
                        $this.children(".gift-item").eq(giftItemRandom).animate({
                            width: "200%"
                        }, 600).fadeIn(500).delay(800).dequeue();

                    } else if (getIndex == 0 && giftItemRandom == 1) {
                        //alert(giftItemRandom);
                        $this.addClass("customized-two");
                        $this.children(".gift-item").eq(giftItemRandom).animate({
                            height: "210%",
                            width: "170%"
                        }, 600).fadeIn(500).delay(800).dequeue();

                    } else if (getIndex == 1 && giftItemRandom == 0) {
                        $this.addClass("customized");
                        //            $this.children(".gift-item").eq(giftItemRandom).animate({width:"150%"},800).fadeIn(500).delay(800).dequeue();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "150%",
                                marginLeft: "-=37",
                                marginTop: "-=105"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "150%",
                                marginTop: "-=217",
                                marginLeft: "-=80"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }

                    } else if (getIndex == 1 && giftItemRandom == 1) {
                        $this.addClass("customized");
                        //var windowWidth = window.width();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "150%",
                                marginLeft: "-=30",
                                marginTop: "-=135"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "150%",
                                marginLeft: "-=65",
                                marginTop: "-=285"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }
                    } else if (getIndex == 2 && giftItemRandom == 0) {
                        $this.addClass("customized");
                        //            $this.children(".gift-item").eq(giftItemRandom).animate({width:"150%"},800).fadeIn(500).delay(800).dequeue();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "100%",
                                marginLeft: "+=8",
                                marginTop: "-=12"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "100%",
                                marginTop: "-=10px",
                                marginLeft: "0"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }

                    } else if (getIndex == 2 && giftItemRandom == 1) {
                        $this.addClass("customized");
                        //var windowWidth = window.width();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "120%",
                                marginLeft: "-=20",
                                marginTop: "-=35"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "120%",
                                marginLeft: "-=45",
                                marginTop: "-=75"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }
                    } else if (getIndex == 3 && giftItemRandom == 0) {
                        $this.addClass("customized");
                        //            $this.children(".gift-item").eq(giftItemRandom).animate({width:"150%"},800).fadeIn(500).delay(800).dequeue();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "125%",
                                marginLeft: "-=115",
                                marginTop: "-=19"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "125%",
                                marginTop: "-=10px",
                                marginLeft: "-=215"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }

                    } else if (getIndex == 3 && giftItemRandom == 1) {
                        $this.addClass("customized");
                        //var windowWidth = window.width();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "125%",
                                marginLeft: "-=125",
                                marginTop: "-=65"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "125%",
                                marginLeft: "-=215",
                                marginTop: "-=10"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }
                    } else if (getIndex == 4 && giftItemRandom == 0) {
                        $this.addClass("customized");
                        //            $this.children(".gift-item").eq(giftItemRandom).animate({width:"150%"},800).fadeIn(500).delay(800).dequeue();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "125%",
                                marginLeft: "-=36",
                                marginTop: "-=90"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "125%",
                                marginTop: "-=160px",
                                marginLeft: "-=36"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }

                    } else if (getIndex == 4 && giftItemRandom == 1) {
                        $this.addClass("customized");
                        //var windowWidth = window.width();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "120%",
                                marginLeft: "-=0",
                                marginTop: "-=50"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "120%",
                                marginLeft: "-=0",
                                marginTop: "-=150"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }
                    }


                    //$this.children(".gift-item").eq(giftItemRandom).animate({width: '150%'},"fast");
                    setTimeout(function() {
                        jQuery(".overlay").fadeOut([500]).delay(1000);
                    }, 1100);
                    setTimeout(function() {
                        jQuery(".gift-box").removeClass("customized").delay(500);
                        jQuery(".gift-box").removeClass("customized-two").delay(500);
                        jQuery(".gift-box.gift-box-01").children(".gift-item:nth-child(2)").animate({
                            height: "100%"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                        jQuery(".gift-box.gift-box-02").children(".gift-item").animate({
                            width: "100%",
                            marginTop: "0",
                            marginLeft: "0"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                        if (getIndex == 2 && giftItemRandom == 1) {
                        jQuery(".gift-box.gift-box-03").children(".gift-item:nth-child(2)").animate({
                            width: "100%",
                            marginTop: "+=75",
                            marginLeft: "0"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                        }
                        if (getIndex == 3 && giftItemRandom == 0) {
                        jQuery(".gift-box.gift-box-04").children(".gift-item:nth-child(1)").animate({
                            width: "100%",
                            marginTop: "-=00",
                            marginLeft: "+=80"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                         }
                         if (getIndex == 3 && giftItemRandom == 1) {
                        jQuery(".gift-box.gift-box-04").children(".gift-item:nth-child(2)").animate({
                            width: "100%",
                            marginTop: "-=00",
                            marginLeft: "0"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                         }
                         if (getIndex == 4 && giftItemRandom == 0) {
                        jQuery(".gift-box.gift-box-05").children(".gift-item:nth-child(1)").animate({
                            width: "100%",
                            marginTop: "-=0",
                            marginLeft: "-=30"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                         }
                        jQuery(".gift-box.gift-box-05").children(".gift-item:nth-child(2)").animate({
                            width: "100%",
                            marginTop: "-=0",
                            marginLeft: "+=0"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                        jQuery(".gift-box").children(".gift-item").animate({
                            width: "100%"
                        }, 400).fadeOut([400]).delay(300);

                    }, 1000);
                    setTimeout(function() {
                        jQuery(".gift-box").removeClass("animates-box").delay(1000);

                    }, 1100);

                    clicked = true;
                    return count;
                } 
//                else if (giftItemRandom < 2 && count < 3 && clicked == true) {
//
//                    alert("sorry");
//                    clicked = false;
//                    count -= count;
//                } 
                else if (giftItemRandom < 2 && count == 3) {

                    if (getIndex == 0 && giftItemRandom == 0) {

                        //alert(giftItemRandom);
                        $this.addClass("customized");
                        $this.children(".gift-item").eq(giftItemRandom).animate({
                            width: "200%"
                        }, 600).fadeIn(500).delay(800).dequeue();

                    } else if (getIndex == 0 && giftItemRandom == 1) {
                        //alert(giftItemRandom);
                        $this.addClass("customized-two");
                        $this.children(".gift-item").eq(giftItemRandom).animate({
                            height: "210%",
                            width: "170%"
                        }, 600).fadeIn(500).delay(800).dequeue();

                    } else if (getIndex == 1 && giftItemRandom == 0) {
                        $this.addClass("customized");
                        //            $this.children(".gift-item").eq(giftItemRandom).animate({width:"150%"},800).fadeIn(500).delay(800).dequeue();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "150%",
                                marginLeft: "-=37",
                                marginTop: "-=105"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "150%",
                                marginTop: "-=217",
                                marginLeft: "-=80"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }

                    } else if (getIndex == 1 && giftItemRandom == 1) {
                        $this.addClass("customized");
                        //var windowWidth = window.width();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "150%",
                                marginLeft: "-=30",
                                marginTop: "-=135"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "150%",
                                marginLeft: "-=65",
                                marginTop: "-=285"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }
                    } else if (getIndex == 2 && giftItemRandom == 0) {
                        $this.addClass("customized");
                        //            $this.children(".gift-item").eq(giftItemRandom).animate({width:"150%"},800).fadeIn(500).delay(800).dequeue();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "100%",
                                marginLeft: "+=8",
                                marginTop: "-=12"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "100%",
                                marginTop: "-=10px",
                                marginLeft: "0"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }

                    } else if (getIndex == 2 && giftItemRandom == 1) {
                        $this.addClass("customized");
                        //var windowWidth = window.width();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "120%",
                                marginLeft: "-=20",
                                marginTop: "-=35"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "120%",
                                marginLeft: "-=45",
                                marginTop: "-=75"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }
                    } else if (getIndex == 3 && giftItemRandom == 0) {
                        $this.addClass("customized");
                        //            $this.children(".gift-item").eq(giftItemRandom).animate({width:"150%"},800).fadeIn(500).delay(800).dequeue();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "125%",
                                marginLeft: "-=115",
                                marginTop: "-=19"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "125%",
                                marginTop: "-=10px",
                                marginLeft: "-=215"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }

                    } else if (getIndex == 3 && giftItemRandom == 1) {
                        $this.addClass("customized");
                        //var windowWidth = window.width();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "125%",
                                marginLeft: "-=125",
                                marginTop: "-=65"
                            }, 800).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "125%",
                                marginLeft: "-=215",
                                marginTop: "-=10"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }
                    } else if (getIndex == 4 && giftItemRandom == 0) {
                        $this.addClass("customized");
                        //            $this.children(".gift-item").eq(giftItemRandom).animate({width:"150%"},800).fadeIn(500).delay(800).dequeue();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "125%",
                                marginLeft: "-=36",
                                marginTop: "-=90"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "125%",
                                marginTop: "-=160px",
                                marginLeft: "-=36"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }

                    } else if (getIndex == 4 && giftItemRandom == 1) {
                        $this.addClass("customized");
                        //var windowWidth = window.width();
                        if (jQuery(window).width() <= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "120%",
                                marginLeft: "-=0",
                                marginTop: "-=50"
                            }, 600).fadeIn(500).delay(800).dequeue();

                        } else if (jQuery(window).width() >= 767) {
                            $this.children(".gift-item").eq(giftItemRandom).animate({
                                width: "120%",
                                marginLeft: "-=0",
                                marginTop: "-=150"
                            }, 600).fadeIn(500).delay(800).dequeue();
                        }
                    }




                    setTimeout(function() {
                        jQuery(".overlay").fadeIn([500]).delay(1000);
                    }, 1500);
                    setTimeout(function() {
                        jQuery(".gift-box").removeClass("customized").delay(500);
                        jQuery(".gift-box").removeClass("customized-two").delay(500); 
                        jQuery(".gift-box.gift-box-01").children(".gift-item:nth-child(2)").animate({
                            height: "100%"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                        jQuery(".gift-box.gift-box-02").children(".gift-item").animate({
                            width: "100%",
                            marginTop: "0",
                            marginLeft: "0"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                        if (getIndex == 2 && giftItemRandom == 1) {
                        jQuery(".gift-box.gift-box-03").children(".gift-item:nth-child(2)").animate({
                            width: "100%",
                            marginTop: "+=75",
                            marginLeft: "0"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                        }
                        if (getIndex == 3 && giftItemRandom == 0) {
                        jQuery(".gift-box.gift-box-04").children(".gift-item:nth-child(1)").animate({
                            width: "100%",
                            marginTop: "-=00",
                            marginLeft: "+=80"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                         }
                         if (getIndex == 3 && giftItemRandom == 1) {
                        jQuery(".gift-box.gift-box-04").children(".gift-item:nth-child(2)").animate({
                            width: "100%",
                            marginTop: "0",
                            marginLeft: "0"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                         }
                         if (getIndex == 4 && giftItemRandom == 0) {
                        jQuery(".gift-box.gift-box-05").children(".gift-item:nth-child(1)").animate({
                            width: "100%",
                            marginTop: "-=0",
                            marginLeft: "-=30"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                         }
                        if (getIndex == 4 && giftItemRandom == 1) {
                        jQuery(".gift-box.gift-box-05").children(".gift-item:nth-child(2)").animate({
                            width: "100%",
                            marginTop: "+=75",
                            marginLeft: "+=0"
                        }, 400).fadeOut([400]).delay(300).dequeue();
                        }
                        jQuery(".gift-box").children(".gift-item").animate({
                            width: "100%"
                        }, 400).fadeOut([400]).delay(300);

                    }, 1000);
                    setTimeout(function() {
                        jQuery(".gift-box").removeClass("animates-box").delay(1000);
                       
                        winGame();
                    }, 1500);
                    //giftOpen = false;
                    //return totalGift;
                } else if (giftItemRandom == 2) {
					setTimeout(function() {
					$this.children(".gift-item").eq(giftItemRandom).fadeIn([500]).delay(1500).dequeue();
					}, 1500);
					//$this.children(".gift-item").eq(giftItemRandom).animate({width: '150%'},"fast");
					setTimeout(function() {
					jQuery(".gift-box").addClass("nobg");
					}, 1200);
					//$this.children(".gift-item").eq(giftItemRandom).animate({width: '150%'},"fast");
					jQuery(".overlay").fadeIn([500]).delay(1000);
					//giftOpen = false;
					//tryAgain();
                }
            });
            //
//            }
//            else{
//                jQuery(".gift-box.non-clickable").click(function(){
//                    //clicked = false;
////                    return false;
////              count = count;     
//      alert("hii");
//}); 
//                
//            }

        });
    }
    holidayGift();
});
</script>     
<?php //get_footer(); ?>
</body>
</html>