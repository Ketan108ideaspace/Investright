var ajax_glossary_url = location.protocol + "//" + location.hostname + "/wp-content/themes/investright/glossary-search-result.php";
var ajax_fraud_url = location.protocol + "//" + location.hostname + "/wp-content/themes/investright/fraud-quiz-result.php";
var ajax_news_url = location.protocol + "//" + location.hostname + "/wp-content/themes/investright/get-news-result.php";
//var ajax_comment_url = location.protocol + "//" + location.hostname + "/wp-content/themes/investright/wp-mail.php";
var ajax_comment_url = "https://www.investright.org/wp-content/themes/investright/wp-mail.php";
// Adds and removes body class depending on screen width.
$(document).ready(function() {
	localStorage.yesclickcount = "";
	localStorage.noclickcount = "";
	localStorage.notsureclickcount = "";

	if (localStorage.stepfourvisit == "YES") {
		$("#jsstep4 .fstep-linktxt a").addClass("visitied");
	}
	
	if (localStorage.steptwovisit == "YES") {
		$("#jsstep2 .fstep-linktxt a").addClass("visitied");
	}
	
	$(".fquiz-result-wrap").hide();
	$(".backtoglossary").hide();
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
		dynamicCssStyle();
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
	
	$('.fstep-ans-btn-retake').on('click tap', function () {
		//$(".que_progressbar_percentage").css("width", "16.66%");
		$(".quizposition").html("1 of 6");
		$(".box").removeClass("current");
		$(".box").removeClass("active");
		$(".quizbox1").addClass("active");
		$(".quizbox1").addClass("current");
		$(".quiz-jscode").show();
		$(".fstep-ques").hide();
		$(".first-ques").show();
		$(".fquiz-result-wrap").hide();
		$("#fresult-box1").hide();
		$("#fresult-box2").hide();
		$("#fresult-box3").hide();
		$("#ans-colors").removeClass("low-risk");
		$("#ans-colors").removeClass("medium-risk");
		$("#ans-colors").removeClass("high-risk");
		
		var aTag = $("a[name='#takeaquiz']");
        var scrollTag = aTag.offset().top - 275;
		$('html,body').animate({scrollTop: scrollTag},'slow');
		
	});
	
	$('.fstep-ans-btn-jscode').on('click tap', function () {
		var nvQue = $(".fstep-ques:visible").attr("id");
		
		var nvAns = $(this).attr("id");
		if(nvAns=="Yes") {
			localStorage.yesclickcount = "Yes";
		} else if(nvAns=="No") {
			if (localStorage.noclickcount) {
				localStorage.noclickcount = Number(localStorage.noclickcount)+1;
			} else {
				localStorage.noclickcount = 1;
			}
		} else {
			if (localStorage.notsureclickcount) {
				localStorage.notsureclickcount = Number(localStorage.notsureclickcount)+1;
			} else {
				localStorage.notsureclickcount = 1;
			}
		}
		if(nvQue!=6) {
			var nvPgNo = parseInt(nvQue) + 1;
			//var nvpg = nvPgNo * 16.66;
			//$(".que_progressbar_percentage").css("width", nvpg+"%");
			$(".quizposition").html(nvPgNo+" of "+6);
			$(".box").removeClass("current");
			$(".quizbox"+nvPgNo).addClass("active");
			$(".quizbox"+nvPgNo).addClass("current");
			$(".fstep-ques:visible").next(".fstep-ques:hidden").show().prev(".fstep-ques:visible").hide();
		} else {
			$(".quiz-jscode").hide();
			$(".hideboxcls").hide();
			$(".fquiz-result-wrap").show();
			if(localStorage.yesclickcount=="Yes") {
				$("#ans-colors").addClass("high-risk");
				$("#fresult-box1").show();
				var nvQuizAns = "Red";
			} else if (Number(localStorage.noclickcount)==6) {
				$("#ans-colors").addClass("low-risk");
				$("#fresult-box2").show();
				var nvQuizAns = "Green";
			} else {
				$("#ans-colors").addClass("medium-risk");
				$("#fresult-box3").show();
				var nvQuizAns = "Orange";
			}
			
			var params = { action : 'glossary_search_action', txtanswer:nvQuizAns };
			jQuery.ajax({
				method: 'POST',
				// async: false,
				dataType: 'html',
				url: ajax_fraud_url,
				data: params,
				success: function(response) {
					
				}
			});
			
			localStorage.yesclickcount = "";
			localStorage.noclickcount = "";
			localStorage.notsureclickcount = "";
		}
		return false;
	});
	
	$('.nextquesionbtn').on('click tap', function () {
		$(".fieldreqerr").hide();
		var queValidId = $(".quizquesionshowhide:visible").attr("id");
		if($('#input_'+queValidId+':checked').length<=0) {
			$(".fieldreqerr").show();
		} else {
			var nvStep = parseInt(queValidId) + 1;
			var nvWidth = parseInt(nvStep) * 10;
			$('.gf_progressbar_percentage').css('width', nvWidth+'%');
			$(".gf_progressbar_title").html("Step "+nvStep+" of 10");
			$(".quizquesionshowhide:visible").next().show().prev().hide();
			var queId = $(".quizquesionshowhide:visible").attr("id");
			if(queId==10) {
				$(this).hide();
				$(".prevquesionbtn").show();
				$(".resquesionbtn").show();
			} else {
				$(".prevquesionbtn").show();
				$(".resquesionbtn").hide();
			}
		}
		$('.progressgif').show();
		$('.progressgif').show().delay(500).hide(0);
		//$(".quizquesionshowhide:visible").next(".quizquesionshowhide:hidden").show().prev(".quizquesionshowhide:visible").hide();
	});
	
	$('.resquesionbtn').on('click tap', function () {
		$(".fieldreqerr").hide();
		var queValidId = $(".quizquesionshowhide:visible").attr("id");
		if($('#input_'+queValidId+':checked').length<=0) {
			$(".fieldreqerr").show();
		} else {
			var que1 = $("input[name='input_1']:checked").val();
			var que2 = $("input[name='input_2']:checked").val();
			var que3 = $("input[name='input_3']:checked").val();
			var que4 = $("input[name='input_4']:checked").val();
			var que5 = $("input[name='input_5']:checked").val();
			var que6 = $("input[name='input_6']:checked").val();
			var que7 = $("input[name='input_7']:checked").val();
			var que8 = $("input[name='input_8']:checked").val();
			var que9 = $("input[name='input_9']:checked").val();
			var que10 = $("input[name='input_10']:checked").val();
			var total = parseInt(que1) + parseInt(que2) + parseInt(que3) + parseInt(que4) + parseInt(que5) + parseInt(que6) + parseInt(que7) + parseInt(que8) + parseInt(que9) + parseInt(que10);
			if(total>=61) {
				$(location).attr('href',$("#confident_link").val());
			} else if(total>=55) {
				$(location).attr('href',$("#diligent_link").val());
			} else if(total>=45) {
				$(location).attr('href',$("#reserved_link").val());
			} else if(total>=40) {
				$(location).attr('href',$("#impulsive_link").val());
			} else {
				$(location).attr('href',$("#tumultuous_link").val());
			}
		}
		$('.progressgif').show();
		$('.progressgif').show().delay(500).hide(0);
		//$(".quizquesionshowhide:visible").next(".quizquesionshowhide:hidden").show().prev(".quizquesionshowhide:visible").hide();
	});
	
	$('.prevquesionbtn').on('click tap', function () {
		$(".fieldreqerr").hide();
		$(".quizquesionshowhide:visible").prev().show().next().hide();
		var queId = $(".quizquesionshowhide:visible").attr("id");
		$(".gf_progressbar_title").html("Step "+queId+" of 10");
		var nvWidth = parseInt(queId) * 10;
		$('.gf_progressbar_percentage').css('width', nvWidth+'%');
		if(queId==1) {
			$(".prevquesionbtn").hide();
			$(".resquesionbtn").hide();
			$(".nextquesionbtn").show();
		} else {
			$(".prevquesionbtn").show();
			$(".resquesionbtn").hide();
			$(".nextquesionbtn").show();
		}
		$('.progressgif').show();
		$('.progressgif').show().delay(500).hide(0);
	});
	
	$('.openallbtn').on('click tap', function () {
		var a = $(this).hasClass("opencloseall");
		if(a==true) {
			$(this).html("OPEN ALL");
			$(this).removeClass("opencloseall");
			$(".showhideaccordion").removeClass("show");
			$(".showhideaccordiondata").hide();
		} else {
			$(this).html("CLOSE ALL");
			$(this).addClass("opencloseall");
			$(".showhideaccordion").addClass("show");
			$(".showhideaccordiondata").show();
		}
	});
	
	$('.showhideaccordion').on('click tap', function () {
		var accordionId = $(this).attr("id");
		
		var a = $(this).hasClass("show");
        
        if(a==true) {
			//$(".showhideaccordion").removeClass("show");
			$(this).removeClass("show");
			$("#accordion"+accordionId).removeClass("opened");
			//$(".showhideaccordiondata").slideUp(1000);
			$("#accordion"+accordionId).hide();
        } else {
			//$(".showhideaccordion").removeClass("show");
			$("#accordion"+accordionId).addClass("opened");
			$(this).addClass("show");
			//$(".showhideaccordiondata").slideUp(1000);
			$("#accordion"+accordionId).show();
		}
	});
	
	$('#glsry-src-btn').on('click tap', function () {
		var nvglossaysearch = $.trim($("#glossaysearch").val());
		if(nvglossaysearch!="") {
			glossary_search_func(nvglossaysearch);
		}
	});
	
	$('.backtoglossary').on('click tap', function () {
		$("#glossaysearch").val("");
		$(this).hide();
		$(".openallbtn").show();
		$(".glossary-search").hide();
		$(".glossary-accordion").show();
	});

	$('.fstep-take-quiz').on('click tap', function () {
		//$(".que_progressbar_percentage").css("width", "16.66%");
		var nvlow = $(".fstep-quiz-wrap").hasClass("low-risk");
		var nvmedium = $(".fstep-quiz-wrap").hasClass("medium-risk");
		var nvhigh = $(".fstep-quiz-wrap").hasClass("high-risk");
		if(nvlow==true || nvmedium==true || nvhigh==true) {
			$(".quizposition").html("1 of 6");
			$(".box").removeClass("current");
			$(".box").removeClass("active");
			$(".quizbox1").addClass("active");
			$(".quizbox1").addClass("current");
			
			localStorage.yesclickcount = "";
			localStorage.noclickcount = "";
			localStorage.notsureclickcount = "";
			
			$(".fstep-ques").hide();
			$(".first-ques").show();
			$(".fquiz-result-wrap").hide();
			$("#fresult-box1").hide();
			$("#fresult-box2").hide();
			$("#fresult-box3").hide();
			$("#ans-colors").removeClass("low-risk");
			$("#ans-colors").removeClass("medium-risk");
			$("#ans-colors").removeClass("high-risk");
		}
		
		var a = $(this).parent(".fstep-quiz-wrap").hasClass("active");
        
        if(a==true) {
			$(".quiz-jscode").hide();
			$(".commondivcls").hide();
			$(this).parent(".fstep-quiz-wrap").removeClass("active");
        } else {
			$(".quiz-jscode").show();
			$(".commondivcls").show();
			$(this).parent(".fstep-quiz-wrap").addClass("active");			
		}
	});
	
	$('.fstep-submit-tip').on('click tap', function () {
		var a = $(this).parent(".fstep-submit-tip-wrap").hasClass("active");
        if(a==true) {
			$(this).parent(".fstep-submit-tip-wrap").removeClass("active");
        } else {
			$(this).parent(".fstep-submit-tip-wrap").addClass("active");			
		}
		
	});

	/*$('.fraud-step-list li').on('click tap', function () {
		$('.fraud-step-list li').removeClass("active");
		$(this).addClass("active");
	});*/

	$(window).scroll(function() {
		var nvHasClass = $('body').hasClass('template-fraud-quiz-questions');
		if(nvHasClass==true) {
			var fstep1 = isVisible($("#jsstep1"));
			var fstep2 = isVisible($("#jsstep2"));
			var fstep3 = isVisible($("#jsstep3"));
			var fstep4 = isVisible($("#jsstep4"));
			if(fstep1==true) {
				$('.stepactcls').removeClass("active");
				$('.stepactcls1').addClass("active");
			} else if(fstep2==true) {
				$('.stepactcls').removeClass("active");
				$('.stepactcls2').addClass("active");
			} else if(fstep3==true) {
				$('.stepactcls').removeClass("active");
				$('.stepactcls3').addClass("active");
			} else if(fstep4==true) {
				$('.stepactcls').removeClass("active");
				$('.stepactcls4').addClass("active");
			} else {
			}
		} else {
		}
	});
	
	$('.stepactcls').on('click tap', function () {
		var nvA = $(".fstep-quiz-wrap").hasClass("active");
        
        if(nvA==true) {
			$(".quiz-jscode").hide();
			$(".commondivcls").hide();
			$(".fstep-quiz-wrap").removeClass("active");
        }
		
		var nvB = $(".fstep-submit-tip-wrap").hasClass("active");
        if(nvB==true) {
			$(".fstep-submit-tip-wrap").removeClass("active");
        }
		
		//$('.stepactcls').removeClass("active");
		var href = $(this).attr("id");
		//$('#'+href+'').addClass("active");
		var aTag = $("a[name='#"+ href +"']");
        var scrollTag = aTag.offset().top - 275;
		$('html,body').animate({scrollTop: scrollTag},'slow');
	});
	
	$('.centerscrollbtn').on('click tap', function () {
		var href = $(this).attr("id");
		var aTag = $("a[name='#"+ href +"']");
        var scrollTag = aTag.offset().top - 275;
		$('html,body').animate({scrollTop: scrollTag},'slow');
	});
	
	/*$('.icon-scroll-down').on('click tap', function () {
		//$('.stepactcls').removeClass("active");
		var href = $(this).attr("id");
		//$('#'+href+'').addClass("active");
		var aTag = $("a[name='#"+ href +"']");
        var scrollTag = aTag.offset().top - 275;
		$('html,body').animate({scrollTop: scrollTag},'slow');
	});*/
	
	$('.fraud-top-content').on('click tap', function () {
		//$('.stepactcls').removeClass("active");
		var href = $(this).attr("id");
		//$('#'+href+'').addClass("active");
		var aTag = $("a[name='#"+ href +"']");
        var scrollTag = aTag.offset().top - 275;
		$('html,body').animate({scrollTop: scrollTag},'slow');
	});

	$('#jsstep2 .fstep-linktxt a').on('click tap', function () {
		$(this).addClass("visitied");
		localStorage.steptwovisit = "YES";
	});

	$('#jsstep4 .fstep-linktxt a').on('click tap', function () {
		$(this).addClass("visitied");
		localStorage.stepfourvisit = "YES";
	});
	
	$('#roi-sub-button').on('click', function () {
		var initialamout = $("#initialamout").val();
		var finalamout = $("#finalamout").val();
		var totalamout =  parseFloat(finalamout) - parseFloat(initialamout);
		var returninvestment = parseFloat(totalamout) * parseFloat(100) / parseFloat(initialamout);
		var returninvestment = parseFloat(returninvestment).toFixed( 2 );
		var totalamout = parseFloat(totalamout).toFixed( 2 );
		$("#returninvestment").val(returninvestment);
		$("#totalamout").val(totalamout);
		return false;
	});
	
	$('.ques-wrap').on('click tap', function () {
		$(this).toggleClass("open");
		$(this).next(".ans-wrap").slideToggle('slow');
	});

	var txtpageno = 1;
	
	$('.newsloadmore').on('click', function () {
		
		var txtcat = $("#cat").val();
		var txtyear = $("#year").val();
		txtpageno++;
		var params = { action : 'investor_news_action', txtcat:txtcat, txtyear:txtyear, txtpageno:txtpageno };
		jQuery.ajax({
			method: 'POST',
			// async: false,
			dataType: 'html',
			url: ajax_news_url,
			data: params,
			success: function(response) {
				//alert(response);
				if(response!=""){
					jQuery("#articles_content").append(response);
					setTimeout(function(){ equalheight('.news-wrap>.row'); }, 1000);
				} else{
					jQuery(".newsloadmore").html("");
				}
			}
		});
		return false;
	});
	
	$('#commentsubmitbtn').on('click', function () {
		var txtcommentid = $("#txtcommentid").val().replace(/\n/g, '<br>');
		var params = { action : 'investor_comment_action', txtcommentid:txtcommentid };
		jQuery.ajax({
			method: 'POST',
			dataType: 'html',
			url: ajax_comment_url,
			data: params,
			success: function(response) {
				if(response!=""){
					$("#thankcmtid").html("<h2>Thank you for your comment</h2>");
				}
			}
		});
		return false;
	});
	
	/*$("#cat").change(function(){
		var nvCat = $(this).val();
		var nvPageLink = $("#currentpagelink").val();
		if(nvCat!="" || nvCat!="0") {
			window.location.href = nvPageLink+"/?category="+nvCat;
		} else {
			window.location.href = nvPageLink;
		}
		return false;
	});*/
	
	//$("#year").change(function(){
	$('.filter_articles_cate_go').on('click', function () {
		var nvYear = $("#year").val();
		var nvCat = $("#cat").val();
		var nvPageLink = $("#currentpagelink").val();
		if(nvYear!="" || nvYear!="0" && nvCat!="" || nvCat!="0") {
			window.location.href = nvPageLink+"/?yea="+nvYear+"&category="+nvCat;
		} else if(nvCat!="" || nvCat!="0") {
			window.location.href = nvPageLink+"/?category="+nvCat;
		} else if(nvYear!="" || nvYear!="0") {
			window.location.href = nvPageLink+"/?yea="+nvYear;
		} else {
			//window.location.href = nvPageLink;
		}
		return false;
	});

	jQuery(".res-col-wrap").click(function(){
		jQuery('html,body').animate({
			scrollTop: $(".res-blog-wrap").offset().top},
			'slow');
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
	
	if($('body').hasClass('events-calendar')) {
		calendarimagefunc();
	}
	equalheight('.video-title');
	dynamicCssStyle();
});

function handleKeyPress(e){
	var key=e.keyCode || e.which;
	if (key==13){
		var nvglossaysearch = $.trim($("#glossaysearch").val());
		$(".glossary-search").empty();
		glossary_search_func(nvglossaysearch);
		e.preventDefault();
	}
}

function glossary_search_func(txtglossary) {
	//if(txtglossary!="") {
		var params = { action : 'glossary_search_action', txtglossary:txtglossary };
		jQuery.ajax({
			method: 'POST',
			// async: false,
			dataType: 'html',
			url: ajax_glossary_url,
			data: params,
			success: function(response) {
				if(response!="") {
					$(".glsbtn").hide();
					$(".glossary-accordion").hide();
					$(".backtoglossary").show();
					$(".glossary-search").empty();
					$(".glossary-search").html(response);
					$(".glossary-search").show();
					
					var option = {
						color: "black",
						background: "yellow",
						bold: false,
						class: "high",
						ignoreCase: true,
						wholeWord: false
					}
					var originalContent = $(".textbox").html();
					$(".textbox").highlight($("#glossaysearch").val(), option);
						
					var originalContent = $(".textbox1").html();
					$(".textbox1").highlight($("#glossaysearch").val(), option);
					
				} else {
					$(".backtoglossary").hide();
					$(".glossary-search").hide();
					$(".glsbtn").show();
					$(".glossary-accordion").show();
				}
			}
		});
	//}
}

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
	//$( ".main-wrapper" ).css( {"margin-top" : $("header").height() } ); // Used for all pages to manage gap b/w header and body content	
	$( ".fraud-main-img" ).css( {"height" : $(window).height() - $("header").height(), "max-height" : $(".fraud-main-img > img").height() } );
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
jQuery(window).load(function() {
		equalheight('.be-wrap > div > div');
		equalheight('.mf-wrap .equalHeight');
		equalheight('.pq-two-col .equalHeight');
		equalheight('.prsonlt-wrap .equalHeight');
		equalheight('.pq-result-topwrap .equalHeight');
		equalheight('.video-title');
		equalheight('.news-wrap>.row');
		equalheight('.news-img');
		equalheight('.news-content h3');
		equalheight('.step-col .step-col-inner');
		equalheight('.res-wrap .row > .res-col-wrap');
});
jQuery(window).resize(function() {
		equalheight('.be-wrap > div > div');
		equalheight('.mf-wrap .equalHeight');
		equalheight('.pq-two-col .equalHeight');
		equalheight('.prsonlt-wrap .equalHeight');
		equalheight('.pq-result-topwrap .equalHeight');
		equalheight('.video-title');
		equalheight('.news-wrap>.row');
		equalheight('.news-img');
		equalheight('.news-content h3');
		equalheight('.step-col .step-col-inner');
		equalheight('.res-wrap .row > .res-col-wrap');
});

window.onscroll = function() {
	if($('body').hasClass('template-fraud-quiz-questions')) {
		fstepFunction();
	}
};

function fstepFunction() {
	var header = document.getElementById("fraudStep");
	var sticky = header.offsetTop;
	//alert(window.pageYOffset+" hello "+sticky);
  if (window.pageYOffset >= sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

function isVisible($el) {
  var winTop = $(window).scrollTop();
  var winBottom = winTop + $(window).height();
  var elTop = $el.offset().top - 100;
  var elBottom = elTop + $el.height();
  return ((elBottom<= winBottom) && (elTop >= winTop));
}