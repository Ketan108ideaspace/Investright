<?php
/*
Template Name: Glossary Template
*/
get_header();
?>
  <!-- Main Menu -->
  
  <!-- Body Content -->
  
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
		<h1 class="page-title"><?php echo get_the_title(8498); ?></h1>
		<div class="editor-content glossary-temp">
			<p>
			<?php
				$content = get_post_field('post_content', 8498);
				echo $content;
			?>
			</p>
			<div class="glosry-srch-wrap">
				<div class="row">
					<form>
						<?php /*?><input type="search" placeholder="SEARCH GLOSSARY"  class="input-xx" aria-label="Glossary Search" value="<?php echo $_GET['gs']; ?>" name="gs" id="glossaysearch"><?php */?>
						<input type="search" placeholder="SEARCH GLOSSARY"  class="input-xx" aria-label="Glossary Search" name="gs" id="glossaysearch" onkeypress="handleKeyPress(event)">
						<input type="button" value="Search" class="gls-srch-btn" id="glsry-src-btn">
					</form>
				
					<a href="javascript:void(0);" class="glsbtn openallbtn" title="Open all">open all</a>
					<a href="javascript:void(0);" class="glsbtn backtoglossary" title="Back to Glossary">Back to Glossary</a>
				</div>
			</div>
			<div class="glossary-accordion">
				<?php
				$nvNo = 1;
				$nvAutoCom = "";
				$nvWhileCount = 1;
				for ($i=65; $i <= 90; $i++) {
					$nvArgs = array(
						'post_type' => 'glossary', 
						'post_status' => 'publish', 
						'posts_per_page' => -1,
						'pagination' => true,
						'orderby' => 'title',
						'order' => 'ASC'
					);
					if( !empty( chr($i) ) ) {
						$nvArgs['post_title_like'] = "".chr($i)."";
					}
					$nvWpQry = new WP_Query($nvArgs);
					if ($nvWpQry->have_posts()) {
						if($nvNo == 1) {
							echo '<h3 id="'.$nvWhileCount.'" class="showhideaccordion">';
							$nvAbcNo = $i;
							echo chr($nvAbcNo++)."".chr($nvAbcNo++);
							if("["!=chr($nvAbcNo++)) {
								echo chr($nvAbcNo - 1);
							}
							echo '</h3>';
							echo '<div id="accordion'.$nvWhileCount.'" class="showhideaccordiondata"><table>';
						}
						?>
						
						<?php while ( $nvWpQry->have_posts() ) : $nvWpQry->the_post();?>
							<?php $nvAutoCom .= '"'.html_entity_decode(get_the_title()).'",'; ?>
									<tr>
										<td class="gls-dt"><?php echo ucfirst(get_the_title()); ?></td>
										<td class="gls-dd"><?php echo get_the_content(); ?></td>
									</tr>
								
						<?php
						endwhile;
						$nvWhileCount++;
					}
					$nvCond = $nvNo;
					if($nvNo == 3) {
						$nvNo = 0;
						echo '</table></div>';
					}
					$nvNo++;
				}
				if($nvCond==1 || $nvCond==2) {
					echo '</table></div>';
				}
				//echo "==>".$nvAutoCom;
				?>
		</div>
		<div class="glossary-search">
				
		</div>
		</article>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
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
            $( "<a/>" ).attr( "href", "javascript:void(0);" ).html( label ).appendTo( $li );
            
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
            source: tags,
			select: function (event, ui) {
				var nvglossaysearch = ui.item.label;
				if(nvglossaysearch!="") {
					glossary_search_func(nvglossaysearch);
				}
			}
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