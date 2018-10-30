jQuery(document).ready(function(e) {
    jQuery('.filter_articles_go').on('click', function() {
        var nvTmpLink = jQuery('#templatelink').val();
        var nvTmpLink = nvTmpLink + "/categoryname.php";
        var pagelink = jQuery('#pagelink').val();
        var cat = "-1";
        var mon = jQuery('#monthly').val();
        var yea = jQuery('#year').val();
		var catslug1 = $('#cat').find(':selected').attr('data-cat-slug');
		if (cat == -1) {
			location.href = pagelink + "/resources/investor-news/?category=" + cat + "&yea=" + yea + "&month=" + mon;
		} else {
			location.href = pagelink + "/category/" + catslug1 + "?category=" + cat + "&yea=" + yea + "&month=" + mon;
		}
        /*jQuery.ajax({
            url: nvTmpLink,
            type: 'POST',
            data: 'cateid=' + cat,
            success: function(data) {
                if (cat == -1) location.href = pagelink + "/investor-news/" + data + "?category=" + cat + "&yea=" + yea + "&month=" + mon;
                else
                    location.href = pagelink + "/category/" + data + "?category=" + cat + "&yea=" + yea + "&month=" + mon;
            },
            error: function(e) {}
        });*/
    });
    jQuery('.filter_articles_cate_go').on('click', function() {
        var nvTmpLink = jQuery('#templatelink').val();
        var nvTmpLink = nvTmpLink + "/categoryname.php";
        var pagelink = jQuery('#pagelink').val();
        var cat = jQuery('#cat').val();
        var mon = "0";
        var yea = "0";
		var catslug1 = $('#cat').find(':selected').attr('data-cat-slug');
		if (cat == -1) {
			location.href = pagelink + "/resources/investor-news/";
		} else {
			location.href = pagelink + "/category/" + catslug1 + "?category=" + cat + "&yea=" + yea + "&month=" + mon;
		}
		/*jQuery.ajax({
            url: nvTmpLink,
            type: 'POST',
            data: 'cateid=' + cat,
            success: function(data) {
                if (cat == -1) location.href = pagelink + "/investor-news/" + data + "?category=" + cat + "&yea=" + yea + "&month=" + mon;
                else
                    location.href = pagelink + "/category/" + data + "?category=" + cat + "&yea=" + yea + "&month=" + mon;
            },
            error: function(e) {}
        });*/
    });
    jQuery('.filter_articles').on('change', function() {
        var nvTmpLink = jQuery('#templatelink').val();
        var nvTmpLink = nvTmpLink + "/categoryname.php";
        var pagelink = jQuery('#pagelink').val();
        var cat = jQuery('#cat').val();
        var mon = "0";
        var yea = "0";
		var catslug1 = $('#cat').find(':selected').attr('data-cat-slug');
		if (cat == -1) {
			location.href = pagelink + "/resources/investor-news/";
		} else {
			location.href = pagelink + "/category/" + catslug1 + "?category=" + cat + "&yea=" + yea + "&month=" + mon;
		}
        /*jQuery.ajax({
            url: nvTmpLink,
            type: 'POST',
            data: 'cateid=' + cat,
            success: function(data) {
                if (cat == -1) location.href = pagelink + "/investor-news/" + data + "?category=" + cat + "&yea=" + yea + "&month=" + mon;
                else
                    location.href = pagelink + "/category/" + data + "?category=" + cat + "&yea=" + yea + "&month=" + mon;
            },
            error: function(e) {}
        });*/
    });
    jQuery('.event_filter_articles_go').on('click', function() {
        var nvLink = jQuery('#archivepagelink').val();
        alert(nvLink + 'test');
        var cat = "-1";
        var mon = jQuery('#monthly').val();
        var yea = jQuery('#year').val();
        location.href = nvLink + "?category=" + cat + "&yea=" + yea + "&month=" + mon;
    });
    jQuery('.event_filter_articles').on('change', function() {
        var nvLink = jQuery('#archivepagelink').val();
        var cat = jQuery('#cat').val();
        var mon = "0";
        var yea = "0";
        location.href = nvLink + "?category=" + cat + "&yea=" + yea + "&month=" + mon;
    });
    jQuery('#upcoming_events').click(function() {
        $(".pastevent").hide();
        $(".comingevent").show();
    });
    jQuery('#past_events').click(function() {
        $(".comingevent").hide();
        $(".pastevent").show();
    });
    jQuery('#show_all_events').click(function() {
        $(".pastevent").show();
        $(".comingevent").show();
    });
});