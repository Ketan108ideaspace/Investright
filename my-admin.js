(function($){
$(document).ready(function() {

    var $page_template = $('#page_template'); // For example

    $page_template.change(function() {
		
        if ($(this).val() == 'template-anchor-page.php') {
			$('#acf_2853').show();
			$('#standard2').hide(); //Related event
			$('#standard').hide(); //Mega menu
			$('#videometabox').hide(); //Video embeds
        } else if ($(this).val() == 'default') {
            $('#acf_2853').hide(); //anchor page
			$('#standard2').hide(); //related event
			$('#standard').hide(); //Mega menu
			$('#videometabox').hide(); //Video embeds
        } else if ($(this).val() == 'template-events.php') {
            $('#acf_2853').hide();
			$('#standard2').show(); //related event
			$('#standard').hide(); //Mega menu
			$('#videometabox').show(); //Video embeds
        } else if ($(this).val() == 'template-main-level-index.php') {
            $('#acf_2853').hide();
			$('#standard2').hide(); //related event
			$('#standard').show(); //Mega menu
			$('#videometabox').show(); //Video embeds
        } else if ($(this).val() == 'template-2nd-level-index.php') {
            $('#acf_2853').hide();
			$('#standard2').hide(); //related event
			$('#standard').hide(); //Mega menu
			$('#videometabox').show(); //Video embeds
        } else if ($(this).val() == 'template-no-sidebar.php') {
            $('#acf_2853').hide();
			$('#standard2').hide(); //related event
			$('#standard').hide(); //Mega menu
			$('#videometabox').hide(); //Video embeds
        } else if ($(this).val() == 'template-test.php') {
			$('#acf_2853').hide();
			$('#standard2').hide(); //related event
			$('#standard').show(); //Mega menu
			$('#videometabox').hide(); //Video embeds
		} else if ($(this).val() == 'template-sitemap.php') {
			$('#acf_2853').hide();
			$('#standard2').hide(); //related event
			$('#standard').hide(); //Mega menu
			$('#videometabox').hide(); //Video embeds
		} else {
			
		}
		
    }).change();

});
})(jQuery);