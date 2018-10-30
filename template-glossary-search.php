<?php
/*
Template Name: Glossary Search Template
*/
get_header();
$nvWpQry = new WP_Query(array('s'=>$_GET['gs'], 'post_status' => 'publish', 'order'=>'DESC', 'posts_per_page'=> -1, 'post_type'=> array('glossary')));
?>
<div class="container-innerpage">
	<div class="row">
	  <?php get_sidebar();?>
	  <article class="content-wrap">
		<div class="breadcrumb"> <strong>You are here:</strong>
		  <?php if(function_exists('bcn_display'))
		{
			bcn_display();
		}?>
		</div>
		<h1 class="page-title"><?php echo get_the_title(35); ?> Search Results</h1>
		<div class="editor-content">
			<p>
			<?php
				$content = get_post_field('post_content', 35);
				echo $content;
			?>
			</p>
			<div class="glosry-srch-wrap">
            <div class="row">
				<form action="<?php echo get_permalink(6890);?>" method="get">
					<input type="search" placeholder="SEARCH GLOSSARY"  class="input-xx" aria-label="Glossary Search" value="<?php echo $_GET['gs']; ?>" name="gs" id="glossaysearch">
                    <input type="submit" class="gls-srch-btn">
				</form>
                <a href="/glossary/" class="glsbtn back" title="Back to Glossary">Back to Glossary</a>
                </div>
			</div>
			
			<div class="glosry-srch-result">
			<?php
			if($nvWpQry->found_posts!=0 && $_GET['gs']!="") {
				if ($nvWpQry->have_posts()) {
					echo '<table>';
					while ($nvWpQry->have_posts()) : $nvWpQry->the_post(); ?>
						<tr>
							<td class="textbox gls-dt"><?php echo ucfirst(get_the_title()); ?></td>
							<td class="textbox1 gls-dd"><?php echo get_the_content(); ?></td>
						</tr>
					<?php endwhile;
					echo '</table>';
				}
			} else {
				echo "No result found.";
			}

			$nvAutoCom = "";
			for ($i=65; $i <= 90; $i++) {
				$nvArgs1 = array(
					'post_type' => 'glossary', 
					'post_status' => 'publish', 
					'pagination' => true,
					'orderby' => 'title',
					'order' => 'ASC'
				);
				if( !empty( chr($i) ) ) {
					$nvArgs1['post_title_like'] = "".chr($i)."";
				}
				$nvWpQry1 = new WP_Query($nvArgs1);
				
				if ($nvWpQry1->have_posts()) {
					
					while ( $nvWpQry1->have_posts() ) : $nvWpQry1->the_post();
						$nvAutoCom .= '"'.get_the_title().'",';
					endwhile;
				}
			}
			?>
			
			</div>
		</div>
		</article>
	</div>
</div>

			<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
(function( $ ) {
    
    // Custom autocomplete instance.
    $.widget( "app.autocomplete", $.ui.autocomplete, {
        
        // Which class get's applied to matched text in the menu items.
        options: {
            highlightClass: "ui-state-highlight"
        },
        
        _renderItem: function( ul, item ) {

            // Replace the matched text with a custom span. This
            // span uses the class found in the "highlightClass" option.
            var re = new RegExp( "(" + this.term + ")", "gi" ),
                cls = this.options.highlightClass,
                template = "<span class='" + cls + "'>$1</span>",
                label = item.label.replace( re, template ),
                $li = $( "<li/>" ).appendTo( ul );
            
            // Create and return the custom menu item content.
            $( "<a/>" ).attr( "href", "javascript:void(0);" )
                       .html( label )
                       .appendTo( $li );
            
            return $li;
            
        }
        
    });
    
    // Demo data for autocomplete source.
    var tags = [
		<?php
		echo $nvAutoCom;
		?>
        ""
    ];
    
    // Create autocomplete instances.
    $(function() {
        
        $( "#glossaysearch" ).autocomplete({
            highlightClass: "bold-text",
            source: tags
        });
        
  });
    
})( jQuery );
</script>
<style>
.bold-text {
    font-weight: bold;
}
.ui-helper-hidden-accessible {
	display:none;
}
</style>
<?php
get_footer();
?>