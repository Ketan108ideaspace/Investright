// Adds and removes body class depending on screen width.
jQuery(document).ready(function() {
		dynamicCssStyle();

	// And recheck if window gets resized.
	jQuery(window).bind('resize',function(){
		dynamicCssStyle();
	});
		
	jQuery(".lp-dwn-arrow").click(function(){
		jQuery('html,body').animate({
			scrollTop: $(".content-wrap").offset().top},
			'slow');
	});

});

// Dynamic height
function dynamicCssStyle() {
	jQuery( ".video-content" ).css( {"margin-top" : ( jQuery(".video-wrap").outerHeight() - jQuery(".video-content").outerHeight() ) / 2.65 } );
	//jQuery( ".header-wrap" ).css( {"height" : jQuery(window).height(), "max-height" : jQuery(".lp-bg-img").height() } ); // Fixed height for mobile nav section
}

// Equal Height Function
equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     jQueryel,
     topPosition = 0;
 jQuery(container).each(function() {

   jQueryel = jQuery(this);
   jQuery(jQueryel).height('auto')
   topPostion = jQueryel.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = jQueryel.height();
     rowDivs.push(jQueryel);
   } else {
     rowDivs.push(jQueryel);
     currentTallest = (currentTallest < jQueryel.height()) ? (jQueryel.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
   
   return currentTallest;
   
 });
}

jQuery(window).load(function() {
	equalheight('.bottom-wrap .bottom-col');
});

jQuery(window).resize(function(){
	equalheight('.bottom-wrap .bottom-col');
});