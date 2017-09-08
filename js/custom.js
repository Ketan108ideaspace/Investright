// Adds and removes body class depending on screen width.
$(document).ready(function() {
	  // force PDF Files to open in new window
    $('a[href$=".pdf"]').attr('target', '_blank');
	$('a[href$=".doc"]').attr('target', '_blank');
	$('a[href$=".docs"]').attr('target', '_blank');
	$('a[href$=".txt"]').attr('target', '_blank');
	$('a[href$=".pptx"]').attr('target', '_blank');
	$('a[href$=".xls"]').attr('target', '_blank');
	$('a[href$=".xlsx"]').attr('target', '_blank');
	$("#question").validate();
		megaMenuWidth();
		//contentWrapWidth();
		//dynamicCssStyle();
		//stickSidebar();
		$('#menu').slicknav();
// And recheck if window gets resized.
	$(window).bind('resize',function(){
		megaMenuWidth();
		//contentWrapWidth();
		//dynamicCssStyle();
	});

	
	 $("#textsizer a").textresizer({
        target: "body",
        type: "fontSize",
        sizes: ["16px", "17px", "18px"],
        selectedIndex: 1
    });
			// Home page Banner
	        $('.flexslider').flexslider({

            animation: "slide",

            controlNav: false,
			directionNav: true,

            keyboard: true,

            animationLoop: true,

            pausePlay: true
        });	

		// Home page Banner ends
	$("#gotoCalDate").click(function(){
		var nvMonth = $("#cal_event_month").val();
		var nvYear = $.trim($("#txtYear").val());
		if(nvYear=="") {
			var nvYear = new Date().getFullYear();
		}
		$('#calendar').fullCalendar( 'gotoDate', new Date(nvYear, nvMonth) );
		calendarimagefunc();
    });

	$('.mobilemenu').on('click hover', function () {
		var id = $(this).attr('id');
		$(".mega-menu-"+id+"").show();
		return false;		
	});
	
	$(".watch-video-btn").hover(function () { //mouseover
		var nvUrl = $("#fullpathtemplateurl").val();
		$(".watch-video-btn img").attr("src",""+nvUrl+"/images/icon/arrow-white-right-hover.png");
	}, function () { //mouseout
		var nvUrl = $("#fullpathtemplateurl").val();
		$(".watch-video-btn img").attr("src",""+nvUrl+"/images/icon/arrow-white-right.png");
	});
	
	$('.inv_titles').on('click tap', function () {
		$(this).css('color','#609');
	});
	
});

$(window).load(function() {
	
	$('.fc-prev-button').click(function () {
		//alert("The current date of the calendar is " + actualMonth);
		calendarimagefunc();
	});
	$('.fc-next-button').click(function () {
		calendarimagefunc();
		//alert("The current date of the calendar is " + actualMonth);
	});
	calendarimagefunc();
});

function calendarimagefunc() {
	var calendarDate = $('#calendar').fullCalendar('getDate');
	var dateFormet = new Date(calendarDate);
	var actualMonth = dateFormet.getUTCMonth();
	var actualYear = dateFormet.getFullYear();
	if(actualYear==2017) {
		if(actualMonth==2) {
			$(".octImg").hide();
			$(".novImg").hide();
			$(".marchImg").show();
		} else if(actualMonth==9) {
			$(".marchImg").hide();
			$(".novImg").hide();
			$(".octImg").show();
		} else if (actualMonth==10) {
			$(".marchImg").hide();
			$(".octImg").hide();
			$(".novImg").show();
		} else {
			$(".marchImg").hide();
			$(".octImg").hide();
			$(".novImg").hide();
		}
	} else {
		$(".marchImg").hide();
		$(".octImg").hide();
		$(".novImg").hide();
	}
	return false;
}
		

// Dynamic width for Megamenu
function megaMenuWidth() {
	if(($(window).innerWidth() >= 768) && ($(window).innerWidth() <= 1024)) {
		$( ".mega-menu" ).css( {"max-width" : $(window).width() - 30} );
	//} else if(($(window).innerWidth() >= 1025) && ($(window).innerWidth() <= 1365)) {
		//$( ".mega-menu" ).css( {"max-width" : $(window).width() - $(".latest-news-wrap").innerWidth() - 26} );
	} else {
		$( ".mega-menu" ).css( {"width" : "", "max-width" : ""});
	}
}

// Dynamic width for Content Wrap
function contentWrapWidth() {
	if(($(window).innerWidth() >= 1600)) {
		$( ".content-wrap" ).css( {"width" : $(window).width() - 470} );
	} else {
		$( ".content-wrap" ).css( {"width" : ""});
	}
}

// Dynamic height Used in Managing Finance Page
function mfwrapInnerHeight() {
	if(($(window).innerWidth() >= 768)) {
		$( ".mf-wrap .left > div" ).css( {"height" : $(".mf-wrap .right").height() } );
		$( ".mf-wrap .right > div" ).css( {"height" : $(".mf-wrap .left").height() } );
	} else {
		$( ".mf-wrap .left > div" ).css( {"height" : ""});
		$( ".mf-wrap .right > div" ).css( {"height" : ""});
	}
}

// Dynamic height
function dynamicCssStyle() {
	//$( ".be-wrap > div > div" ).css( {"height" : $(".be-wrap").height() } ); // Used in Homepage
	//$( ".container-innerpage" ).css( {"margin-top" : $("header").height() } );
	$( ".main-wrapper" ).css( {"margin-top" : $("header").height() } ); // Used for all pages to manage gap b/w header and body content	
}

function stickSidebar() {
	//var s = $("aside");
	var pos = s.position();	
	//var stickermax = $(document).height() - $("header").height() - $("footer").height() - s.height() - 0; //0 value is the total of the top and bottom margin
	var stickermax = $(".container-innerpage > .row").outerHeight() - $("header").outerHeight() - $("footer").outerHeight() - 350;

	$(window).scroll(function() {
		var windowpos = $(window).scrollTop();
		//s.html("Distance from top:" + pos.top + "<br />Scroll position: " + windowpos);
		if (windowpos >= pos.top && windowpos < stickermax) {
			s.attr("style", ""); //kill absolute positioning
			s.addClass("stick"); //stick it
		} else if (windowpos >= stickermax) {
			s.removeClass("stick"); //un-stick
			s.css({position: "absolute", width: "auto", top: stickermax + "px"}); //set sticker right above the footer
			
		} else {
			s.removeClass("stick"); //top of page
		}
	});
	//alert(stickermax); //uncomment to show max sticker postition value on doc.ready
}

equalheight = function(container) {

    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    jQuery(container).each(function() {

        $el = jQuery(this);
        jQuery($el).height('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}
jQuery(document).ready(function() {

		equalheight('.be-wrap > div > div');
		equalheight('.mf-wrap .equalHeight');
	
});
jQuery(window).resize(function() {

		equalheight('.be-wrap > div > div');
		equalheight('.mf-wrap .equalHeight');

});