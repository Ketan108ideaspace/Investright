<?php /*Template Name: Annual Return Calculator Template*/ ?>
<?php
get_header();
?>
<link href="<?php echo $template_url; ?>/css/annual-calculator.css" rel="stylesheet">
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>
<!-- Body Content -->
<div class="calculator-container">
  <div class="row">
    <article class="content-wrap">
      <div class="calculator-header">
        <?php while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; ?>
      </div>
      <div class="calculator-body">
        <div class="pencil-graphics"><img src="<?php echo $template_url; ?>/images/arc-pen.png" alt="Annual Return Calculator - Invest Right"/></div>
        <div class="calculator-inner-wrap">
          <div class="calculator-wrap">
            <div class="calculator-box">
              <div class="calculator-content">
                <div class="form-horizontal">
                  <table>
                    <tbody>
                      <tr>
                        <th>TERM</th>
                        <th>20 years</th>
                      </tr>
                      <tr>
                        <td>INVESTED AMOUNT</td>
                        <td>$
                          <input id="amout" type="tel" value="10000" name="initial-investment" step="500" min="500" max="9999999" /></td>
                      </tr>
                      <tr>
                        <td>ANNUAL CONTRIBUTIONS 1</td>
                        <td>$
                          <input id="option1" type="tel" value="2000" name="initial-investment" step="500" min="500" max="9999999" /></td>
                      </tr>
                      <tr>
                        <td>ANNUAL CONTRIBUTIONS 2</td>
                        <td>$
                          <input id="option2" type="tel" value="1000" name="initial-investment" step="500" min="500" max="9999999" /></td>
                      </tr>
                      <tr>
                        <td>Average Annual Return</td>
                        <td>4%</td>
                      </tr>
                      <tr>
                        <td>Inflation</td>
                        <td>2%</td>
                      </tr>
                      <tr>
                        <td colspan="2" ><input onClick="ga('send','event',{'eventCategory':'calculator_btn','eventAction':'click', 'eventLabel':'Investment Fee Calculator'});" name="take a look" type="submit" value="CALCULATE" id="sub-button"/></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="infowrap"> <span class="iconset info"></span>
                    <div class="info-content">
                      <p>ASSUMPTIONS</p>
                      <ol>
                        <li>Returns compounded annually at a default rate of 4%</li>
                        <li>Inflation compounded annually at a rate of 2%. Inflation is included in this calculation to show the future value of investments.</li>
                        <li>Deposits are made once per year</li>
                        <li>No periodic withdrawals are permitted in this calculator</li>
                        <li>The calculator results are for reference only. They do not reflect the results of an actual investment.</li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="calculated-value">
            <div id="tabs">
              <ul style="display:none">
                <li><a href="#tabs-2">RETURNS</a></li>
              </ul>
              <div id="tabs-2">
                <h2 class="show_on_build_map" style="font-size:1.31em;">Compare how different amounts of yearly contributions grow a $10,000 investment over a 20-year time period.</h2>
                <div id="chart_div" style="height:500px !important">
                  <canvas id="chart_2"></canvas>
                </div>
                <div class="show_on_build_map legend">
                  <div class="tooltip-wrap three desktop-only">
                    
                    <div class="yellow tooltip box_5" id="ancboxtop">Annual Contributions 1</div>
					<div class="green tooltip box_4" id="ancboxbottom">Annual Contributions 2</div>
                  </div>
                </div>
                <div style="clear:both"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>
  </div>
</div>
<script>
    jQuery( function() {
		
		jQuery('#amout').keyup(function() {
			var nvamout = $(this).val();
			
			if($(this).val().length > 7){
				val=$(this).val().substr(0,7);
				$(this).val(val);
			} else if($(this).val() <= 500){
				
			} else {
			}
			
		});
		
		jQuery('#amout').focusout(function() {
			var nvamout = $(this).val();
			if($(this).val() <= 500){
				$(this).val("500");
			}
			
		});
		
		jQuery('#option1').keyup(function() {
			var nvamout = $(this).val();
			
			if($(this).val().length > 7){
				val=$(this).val().substr(0,7);
				$(this).val(val);
			} else if($(this).val() <= 500){
				
			} else {
			}
			
		});
		
		jQuery('#option1').focusout(function() {
			var nvamout = $(this).val();
			if($(this).val() <= 500){
				$(this).val("500");
			}
			
		});
		
		jQuery('#option2').keyup(function() {
			var nvamout = $(this).val();
			
			if($(this).val().length > 7){
				val=$(this).val().substr(0,7);
				$(this).val(val);
			} else if($(this).val() <= 500){
				
			} else {
			}
			
		});
		
		jQuery('#option2').focusout(function() {
			var nvamout = $(this).val();
			if($(this).val() <= 500){
				$(this).val("500");
			}
			
		});
		
		
		graphfunc();
		
        jQuery("input[type='tel']").spinner();

        jQuery( "input[type='tel']" ).on( "spinchange", function( event, ui ) {
            if(jQuery('.calculator-wrap').hasClass('calculator-wrap-new-width')) {
				//build_map()
			}
        });
        
        jQuery('#sub-button').click(function(){
			graphfunc();
        });
		
		function graphfunc() {
			jQuery( ".calculator-wrap" ).addClass("calculator-wrap-new-width");
            jQuery( ".calculated-value" ).addClass("calculated-value-width");
            jQuery( "#tabs" ).show(0,function(){
                jQuery( "#tabs" ).tabs();
            });
            jQuery.ajax({
                url: '<?php echo admin_url( 'admin-ajax.php' )?>',
                data: {
                    'action':'ivr_view_counter',
                    'id':<?php echo $post->ID?>
                },
                success:function(data) {
                    console.log(data);
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });
            build_map();
		}
        function format_number(value)
        {
            if(parseInt(value) > 1000)
            {
                return '$' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            else
            {
                return '$' + value;
            }
        }
        function build_map()
        {
            jQuery('#chart_div').html('<canvas id="chart_2"></canvas>');
            var graph_type;
            var duration = 20;
            var fee_1=jQuery('input[name=fee-1]').val();
            var fee_2=jQuery('input[name=fee-2]').val();
            var initial_investment=jQuery('input[name=initial-investment]').val();
            var annual_rate=jQuery('input[name=annual-rate]').val();

            if(jQuery('#show_line_graph').is(':checked'))
            {
                graph_type='bar-graph';
            }
            else
            {
                graph_type='bar-graph';
            }

            // graph points calculator
            
                var return_amount_fee_1_array= new Array();
                var return_amount_fee_2_array= new Array();
                var finalOptionVal1 = parseFloat($("#amout").val());
				var finalOptionVal2 = parseFloat($("#amout").val());
				
				var option1 = parseFloat($("#option1").val());
				var option2 = parseFloat($("#option2").val());
				
				$("#ancboxtop").removeClass("yellow");
				$("#ancboxtop").removeClass("green");
				$("#ancboxbottom").removeClass("yellow");
				$("#ancboxbottom").removeClass("green");
				
				for(i=1;i<=20;i++)
                {
                    var plusOptionVal1 = finalOptionVal1 + option1;
					var finalOptionVal1 = plusOptionVal1 * 1.04/1.02;
					
					var plusOptionVal2 = finalOptionVal2 + option2;
					var finalOptionVal2 = plusOptionVal2 * 1.04/1.02
                    return_amount_fee_1_array[i]= parseFloat(finalOptionVal1).toFixed( 2 );
					return_amount_fee_2_array[i]= parseFloat(finalOptionVal2).toFixed( 2 );
					var popoptionval1 = format_number(parseFloat(finalOptionVal1).toFixed( 2 ));
					var popoptionval2 = format_number(parseFloat(finalOptionVal2).toFixed( 2 ));
                }
				
				if(option1>option2) {
					$("#ancboxtop").addClass("yellow");
					$("#ancboxtop").html("Annual Contributions 1 "+popoptionval1);
					$("#ancboxbottom").addClass("green");
					$("#ancboxbottom").html("Annual Contributions 2 "+popoptionval2);
				} else {
					$("#ancboxbottom").addClass("yellow");
					$("#ancboxbottom").html("Annual Contributions 1 "+popoptionval1);
					$("#ancboxtop").addClass("green");
					$("#ancboxtop").html("Annual Contributions 2 "+popoptionval2);
				}

                var ctx4 = jQuery("#chart_div #chart_2");
                var myChart4 = new Chart(ctx4, {
                    type: 'line',
                    data: {
                        labels: ["0","","","","","5","","","","","10","","","","","15","","","","","20"],
                        datasets: [
                        {
                            type: 'line',
                            label: "Return",
                            data: return_amount_fee_2_array,
                            borderColor : '#9dba46',
                            pointBackgroundColor : '#9dba46',
                            borderWidth: 2,
                            backgroundColor:"rgba(157, 186, 70, 0)"
                        },
                        {
                            type: 'line',
                            label: "Return",
                            data: return_amount_fee_1_array,
                            borderColor : '#ff9a3f',
                            pointBackgroundColor : '#ff9a3f',
                            borderWidth: 2,
                            backgroundColor:"rgba(157, 186, 70, 0)"
                        }]
                    },
                    options: {
                        maintainAspectRatio : false,
                        legend:{display: false},
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true,
                                    maxRotation :0,
                                    callback: function(value, index, values) {
                                        if(parseInt(value) > 1000)
                                        {
                                            return '$' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }
                                        else
                                        {
                                            return '$' + value;
                                        }
                                    }
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    beginAtZero:true,
                                    maxRotation :0,
                                    stepSize:5,
                                },
                                gridLines: {
                                    color: "rgba(0, 0, 0, 0)",
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItem, data) {
                                    if(parseInt(tooltipItem.yLabel) > 1000)
                                    {
                                        return '$' + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }
                                    else
                                    {
                                        return '$' + tooltipItem.yLabel;
                                    }
                                }
                            }
                        },
                        animation: {
                            duration: 0
                        }
                    }
                });
                //myChart4.destroy();
        }
    })
</script>
<style>
    .ui-tabs-panel{padding-bottom: 30px}
</style>
<?php get_footer(); ?>
