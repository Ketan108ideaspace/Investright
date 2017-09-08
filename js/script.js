//Filter for Articles

jQuery(document).ready(function(e) {
    
	jQuery('.filter_articles_go').on('click', function() {
		var nvTmpLink = jQuery('#templatelink').val();
		var nvTmpLink = nvTmpLink+"/categoryname.php";
		var pagelink = jQuery('#pagelink').val();
		var cat = "-1";
		var mon = jQuery('#monthly').val();
		var yea = jQuery('#year').val();
		jQuery.ajax({
			url: nvTmpLink,
			type: 'POST',
			data: 'cateid='+cat,
			success: function(data) {
				//alert(pagelink+"/category/"+data+"?category="+cat+"&yea="+yea+"&month="+mon);
				if(cat== -1)
					location.href = pagelink+"/investor-news/"+data+"?category="+cat+"&yea="+yea+"&month="+mon;
				else
				location.href = pagelink+"/category/"+data+"?category="+cat+"&yea="+yea+"&month="+mon;
			},
			error: function(e) {
				//called when there is an error
				//alert("error");
			}
		});
	});
	
	jQuery('.filter_articles_cate_go').on('click', function() {
		var nvTmpLink = jQuery('#templatelink').val();
		var nvTmpLink = nvTmpLink+"/categoryname.php";
		var pagelink = jQuery('#pagelink').val();
		var cat = jQuery('#cat').val();
		
		var mon = "0";
		var yea = "0";
		jQuery.ajax({
			url: nvTmpLink,
			type: 'POST',
			data: 'cateid='+cat,
			success: function(data) {
				//alert(pagelink+"/category/"+data+"?category="+cat+"&yea="+yea+"&month="+mon);
				if(cat== -1)
					location.href = pagelink+"/investor-news/"+data+"?category="+cat+"&yea="+yea+"&month="+mon;
				else
				location.href = pagelink+"/category/"+data+"?category="+cat+"&yea="+yea+"&month="+mon;
			},
			error: function(e) {
				//called when there is an error
				//alert("error");
			}
		});
	});
        // Single category change filter
        jQuery('.filter_articles').on('change', function() {
		var nvTmpLink = jQuery('#templatelink').val();
		var nvTmpLink = nvTmpLink+"/categoryname.php";
		var pagelink = jQuery('#pagelink').val();
		var cat = jQuery('#cat').val();
		var mon = "0";
		var yea = "0";
		jQuery.ajax({
			url: nvTmpLink,
			type: 'POST',
			data: 'cateid='+cat,
			success: function(data) {
				//alert(pagelink+"/category/"+data+"?category="+cat+"&yea="+yea+"&month="+mon);
				if(cat== -1)
					location.href = pagelink+"/investor-news/"+data+"?category="+cat+"&yea="+yea+"&month="+mon;
				else
				location.href = pagelink+"/category/"+data+"?category="+cat+"&yea="+yea+"&month="+mon;
			},
			error: function(e) {
				//called when there is an error
				//alert("error");
			}
		});
	});
	
	jQuery('.event_filter_articles_go').on('click', function() {
		var nvLink = jQuery('#archivepagelink').val();
		alert(nvLink+'test');
		var cat = "-1";
		//alert(cat);
		var mon = jQuery('#monthly').val();
		//var array = mon.split('/');
        //var month = array[array.length-2];
		var yea = jQuery('#year').val();
		//alert(nvLink+"?category="+cat+"&yea="+yea+"&month="+mon);
		//var yea_array = yea.split('/');
        //var year = yea_array[yea_array.length-2];
		
		location.href = nvLink+"?category="+cat+"&yea="+yea+"&month="+mon;
	});
	
	jQuery('.event_filter_articles').on('change', function() {
		var nvLink = jQuery('#archivepagelink').val();
		//alert(nvLink);
		var cat = jQuery('#cat').val();
		//alert(cat);
		var mon = "0";
		//var array = mon.split('/');
        //var month = array[array.length-2];
		var yea = "0";
		//alert(nvLink+"?category="+cat+"&yea="+yea+"&month="+mon);
		//var yea_array = yea.split('/');
        //var year = yea_array[yea_array.length-2];
		
		location.href = nvLink+"?category="+cat+"&yea="+yea+"&month="+mon;

	});
	
	/*jQuery('#cal_event_type').on('change', function() {
		var nvData = $(this).val();
		if(nvData!="") {
			$(".eventRow").hide();
			$(".Year_"+nvData+"").show();
		} else {
			$(".eventRow").show();
		}
	});*/
	
	jQuery('#upcoming_events').click(function(){
		$(".pastevent").hide();
		$(".comingevent").show();
	});
	
	jQuery('#past_events').click(function(){
		$(".comingevent").hide();
		$(".pastevent").show();
	});
	
	jQuery('#show_all_events').click(function(){
		$(".pastevent").show();
		$(".comingevent").show();
	});
	
});