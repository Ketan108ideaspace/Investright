<?php /*Template Name: Fee Calculator Template*/ ?>
<?php
get_header();
?>
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
                <div class="pencil-graphics"><img src="<?php echo $template_url; ?>/images/pencil-graphics.png" alt="calculator - Invest Right"/></div>
                <div class="calculator-inner-wrap">
                    <div class="calculator-wrap">
                        <div class="calculator-box">
                            <div class="calculator-content">
                                <div class="form-horizontal">
                                    <table>
                                        <tbody>
                                            <tr><th>TERM</th><th>20 years</th></tr>
                                            <tr><td>INVESTED AMOUNT</td><td>$ <input id="amout" type="number" value="50000" name="initial-investment" step="500" min="500" max="9999999" /></td></tr>
                                            <tr><td><label id="label-tooltip" for="rate" ><div class="tooltip-hover">Expected average return over the life of the expected amount</div> AVERAGE ANNUAL RETURN</label></td><td><input id="rate" type="number" value="5" name="annual-rate" min="-5" max="15" step="0.01" /> %</td></tr>
                                            <tr><td colspan="2">
												<div class="fee-wrap">
														<div>FEE</div>
														<div class="fee-input">
                                                        	<input id="fee01" type="number" value="2.5" name="fee-1" step="0.01" min="0" /> %
                                                        </div>
														<div>VS</div>
														<div class="fee-input">
                                                        	<input id="fee02" type="number" value="1.5" name="fee-2" step="0.01" min="0" /> %
                                                        </div>
												</div>
											</td></tr>
											<tr><td colspan="2" ><input onClick="ga('send','event',{'eventCategory':'calculator_btn','eventAction':'click', 'eventLabel':'Investment Fee Calculator'});" name="take a look" type="submit" value="CALCULATE" id="sub-button"/></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="switch-button">
                            <span class="line-graph">LINE GRAPH</span>
                            <label class="switch">
                                <input type="checkbox" checked name="show_line_graph" id="show_line_graph">
                                <div class="slider round"></div>
                            </label>
                            <span class="bar-graph">BAR GRAPH</span>
                        </div>
                    </div>

                    <div class="calculated-value">
                        <div id="tabs">
                            <ul>
								<li><a href="#tabs-2">RETURNS</a></li>
                                <li><a href="#tabs-1">FEES PAID</a></li>
                                
                            </ul>
                            <div id="tabs-1">
                                <h2 class="show_on_build_map" style="font-size:1.31em;display:none">Here’s what you would have to pay in fees over 20 years on your <span class="initial_investment"></span> investment</h2>
                                <div id="chart_div_second" style="height:500px !important">
                                    <canvas id="chart_1"></canvas>
                                </div>

                                <div class="show_on_build_map legend" style="display:none">
                                    <div class="tooltip-wrap two desktop-only">
                                        <div class="yellow tooltip box_1"><div><span class="init_fee2"></span>% FEE</div><div><span class="fee_paid_2_final"></span></div></div>
                                        <div class="green tooltip box_2"><div><span class="init_fee1"></span>% FEE</div><div><span class="fee_paid_1_final"></span></div></div>
                                    </div>

                                    <div class="tooltip-wrap two mobile-only bar-graph">
                                        <div class="green tooltip"><div><span class="init_fee1"></span>% FEE</div><div><span class="fee_paid_1_final"></span></div></div>
                                        <div class="yellow tooltip"><div><span class="init_fee2"></span>% FEE</div><div><span class="fee_paid_2_final"></span></div></div>
                                    </div>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                            <div id="tabs-2">
                                <h2 class="show_on_build_map" style="font-size:1.31em;display:none">Here’s the return you would see over 20 years on your <span class="initial_investment"></span> investment.</h2>
                                <div id="chart_div" style="height:500px !important">
                                    <canvas id="chart_2"></canvas>
                                </div>
                                <div class="show_on_build_map legend" style="display:none">
                                    <div class="tooltip-wrap three desktop-only">
                                        <div class="red tooltip box_3"><div><span>NO FEES</span></div><div><span class="return_amount_no_fees"></span></div></div>
                                        <div class="green tooltip box_4"><div><span class="init_fee1"></span> % FEE</div><div><span class="return_amount_fee_1"></span></div></div>
                                        <div class="yellow tooltip box_5"><div><span class="init_fee2"></span> % FEE</div><div><span class="return_amount_fee_2"></span></div></div>
                                    </div>
                                    <div class="tooltip-wrap three mobile-only bar-graph">
                                        <div class="red tooltip"><div><span>NO FEES</span></div><div><span class="return_amount_no_fees"></span></div></div>
                                        <div class="green tooltip"><div><span class="init_fee1"></span> % FEE</div><div><span class="return_amount_fee_1"></span></div></div>
                                        <div class="yellow tooltip"><div><span class="init_fee2"></span> % FEE</div><div><span class="return_amount_fee_2"></span></div></div>
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
		
		$('#rate').keyup(function(event) {
			var nvAvr = $(this).val();
			if(nvAvr>=-5 && nvAvr<=15) {
			} else {
				if(nvAvr>=15) {
					$(this).val("15");
				} else if(nvAvr<=-5) {
					$(this).val("-5");
				} else {
					$(this).val("15");
				}
			}
		});
		
		graphfunc();
		
        jQuery("input[type='number']").spinner();

        jQuery( "input[type='number']" ).on( "spinchange", function( event, ui ) {
            if(jQuery('.calculator-wrap').hasClass('calculator-wrap-new-width'))
            {build_map()}
        });
        jQuery('.ui-spinner-button').click(function(){
            if(jQuery('.calculator-wrap').hasClass('calculator-wrap-new-width'))
            {build_map()}
        });
        jQuery('#show_line_graph').click(function(){
          build_map();
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
            //jQuery("#chart_div #chart_2").destroy();
            //jQuery("#chart_div_second #chart_1").destroy();
            jQuery('#chart_div_second').html('<canvas id="chart_1"></canvas>');
            jQuery('#chart_div').html('<canvas id="chart_2"></canvas>');
            var graph_type;
            var duration = 20;
            var fee_1=jQuery('input[name=fee-1]').val();
            var fee_2=jQuery('input[name=fee-2]').val();
            /*if(fee_1>fee_2)
            {
                fee_2_new = fee_1;
                fee_1 = fee_2;
                fee_2 = fee_2_new
            }*/
            var initial_investment=jQuery('input[name=initial-investment]').val();
            var annual_rate=jQuery('input[name=annual-rate]').val();

            if(jQuery('#show_line_graph').is(':checked'))
            {
                graph_type='bar-graph';
            }
            else
            {
                graph_type='line-graph';
            }

            // graph points calculator
            if(graph_type=='bar-graph')
            {
                return_amount_no_fees = Math.round(initial_investment * Math.pow((1 + (annual_rate*.01)),duration));
                return_amount_fee_1 = Math.round(initial_investment * Math.pow((1 + ((annual_rate-fee_1)*.01)),duration));
                return_amount_fee_2 = Math.round(initial_investment * Math.pow((1 + ((annual_rate-fee_2)*.01)),duration));
                var fee_paid_1_final = fee_paid_1 = return_amount_no_fees - return_amount_fee_1;
                var fee_paid_2_final = fee_paid_2 = return_amount_no_fees - return_amount_fee_2;

                var ctx1 = jQuery("#chart_div_second #chart_1");
                var myChart1 = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: [fee_1+'%', fee_2+"%"],
                        datasets: [{
                            label: "Fees Paid",
                            data: [fee_paid_1, fee_paid_2],
                            backgroundColor: ['#9dba46','#ff9a3f'],
                            borderWidth: 1
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
                                        if(parseInt(value) > 1000){
                                            return '$' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }
                                        else {
                                            return '$' + value;
                                        }
                                    }
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    beginAtZero:true,
                                    maxRotation :0,
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

                var ctx2 = jQuery("#chart_div #chart_2");
                var myChart2 = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: ['No Fees',fee_1+'%', fee_2+"%"],
                        datasets: [{
                            label: "Return",
                            data: [return_amount_no_fees, return_amount_fee_1,return_amount_fee_2],
                            backgroundColor: ['#032c46','#9dba46','#ff9a3f'],
                            borderWidth: 1
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
            }
            else
            {
                var label_array= new Array();
                var return_amount_no_fees_array= new Array();
                var return_amount_fee_1_array= new Array();
                var return_amount_fee_2_array= new Array();
                var fee_paid_1_array= new Array();
                var fee_paid_2_array=new Array();
                for(i=0;i<=20;i++)
                {
                    label_array[i]=i;

                    return_amount_no_fees=Math.round(initial_investment * Math.pow((1 + (annual_rate*.01)),i));
                    return_amount_no_fees_array[i]=return_amount_no_fees;

                    return_amount_fee_1=Math.round(initial_investment * Math.pow((1 + ((annual_rate-fee_1)*.01)),i));
                    return_amount_fee_1_array[i]=return_amount_fee_1;

                    return_amount_fee_2=Math.round(initial_investment * Math.pow((1 + ((annual_rate-fee_2)*.01)),i));
                    return_amount_fee_2_array[i]=return_amount_fee_2;

                    fee_paid_1=return_amount_no_fees - return_amount_fee_1;
                    fee_paid_1_array[i] = fee_paid_1;

                    fee_paid_2=return_amount_no_fees - return_amount_fee_2;
                    fee_paid_2_array[i] = fee_paid_2;
                }
                var fee_paid_1_final = fee_paid_1;
                var fee_paid_2_final = fee_paid_2;

                var ctx3 = jQuery("#chart_div_second #chart_1");
                var myChart3 = new Chart(ctx3, {
                    type: 'line',
                    data: {
                        type: 'bar',
                        labels: ["0","","","","","5","","","","","10","","","","","15","","","","","20"],
                        datasets: [{
                            label: "Fees Paid",
                            data: fee_paid_1_array,
                            borderColor: "#9dba46",
                            pointBackgroundColor : '#9dba46',
                            borderWidth: 2,
                            backgroundColor:"rgba(157, 186, 70, 0)"
                        },
                        {
                            type: 'line',
                            label: "Fees Paid",
                            data: fee_paid_2_array,
                            borderColor: "#ff9a3f",
                            pointBackgroundColor : '#ff9a3f',
                            borderWidth: 2,
                            backgroundColor:"rgba(255, 154, 63, 0)"
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

                var ctx4 = jQuery("#chart_div #chart_2");
                var myChart4 = new Chart(ctx4, {
                    type: 'line',
                    data: {
                        labels: ["0","","","","","5","","","","","10","","","","","15","","","","","20"],
                        datasets: [{
                            type: 'line',
                            label: "Return",
                            data: return_amount_no_fees_array,
                            borderColor : '#032c46',
                            pointBackgroundColor : '#032c46',
                            borderWidth: 2,
                            backgroundColor:"rgba(157, 186, 70, 0)"
                        },
                        {
                            type: 'line',
                            label: "Return",
                            data: return_amount_fee_1_array,
                            borderColor : '#9dba46',
                            pointBackgroundColor : '#9dba46',
                            borderWidth: 2,
                            backgroundColor:"rgba(157, 186, 70, 0)"
                        },
                        {
                            type: 'line',
                            label: "Return",
                            data: return_amount_fee_2_array,
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
            jQuery('.init_fee1').html(fee_1);
            jQuery('.init_fee2').html(fee_2);

            jQuery('.initial_investment').html(format_number(initial_investment));
            jQuery('.fee_paid_1_final').html(format_number(fee_paid_1));
            jQuery('.fee_paid_2_final').html(format_number(fee_paid_2));
            jQuery('.return_amount_no_fees').html(format_number(return_amount_no_fees));
            jQuery('.return_amount_fee_1').html(format_number(return_amount_fee_1));
            jQuery('.return_amount_fee_2').html(format_number(return_amount_fee_2));

            jQuery('.show_on_build_map').show();
            if(jQuery(window).width()<992)
            {
                if(graph_type=='bar-graph')
                {
                    jQuery('.show_on_build_map .desktop-only').hide();
                    jQuery('.show_on_build_map .mobile-only.bar-graph').show();
                }
                else
                {
                    jQuery('.show_on_build_map .desktop-only').show();
                    jQuery('.show_on_build_map .mobile-only.bar-graph').hide();
                }
            }
            else
            {
                jQuery('.show_on_build_map .desktop-only').show();
                jQuery('.show_on_build_map .mobile-only.bar-graph').hide();
                if(fee_1>fee_2)
                {
                    jQuery('.box_1 .init_fee2,.box_5 .init_fee2').html(fee_1);
                    jQuery('.box_2 .init_fee1,.box_4 .init_fee1').html(fee_2);

                    jQuery('.box_1,.box_5').removeClass('green yellow').addClass('green');
                    jQuery('.box_1 .fee_paid_2_final').html(format_number(fee_paid_1));
                    jQuery('.box_5 .return_amount_fee_2').html(format_number(return_amount_fee_1));

                    jQuery('.box_2,.box_4').removeClass('green yellow').addClass('yellow');
                    jQuery('.box_2 .fee_paid_1_final').html(format_number(fee_paid_2));
                    jQuery('.box_4 .return_amount_fee_1').html(format_number(return_amount_fee_2));
                }
                else
                {
                    jQuery('.box_1 .init_fee2,.box_5 .init_fee2').html(fee_2);
                    jQuery('.box_2 .init_fee1,.box_4 .init_fee1').html(fee_1);

                    jQuery('.box_1,.box_5').removeClass('green yellow').addClass('yellow');
                    jQuery('.box_1 .fee_paid_2_final').html(format_number(fee_paid_2));
                    jQuery('.box_5 .return_amount_fee_2').html(format_number(return_amount_fee_2));

                    jQuery('.box_2,.box_4').removeClass('green yellow').addClass('green');
                    jQuery('.box_2 .fee_paid_1_final').html(format_number(fee_paid_1));
                    jQuery('.box_4 .return_amount_fee_1').html(format_number(return_amount_fee_1));
                }
            }
        }
    })
</script>
<style>
    .ui-tabs-panel{padding-bottom: 30px}
</style>
<?php get_footer(); ?>
