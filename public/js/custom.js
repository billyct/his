/* NUMBER ANIMATION */
(function(a){a.fn.animateNumber=function(b,c,d){var e=a(this),f=d?parseInt(e.val()):parseInt(e.html());var g=b>f,h=1;var i=function(){f=Math.floor(g?f+h:f-h);if(g&&f>b||!g&&f<b){f=b;clearInterval(j)}e.html(f);if(d){e.val(f);d()}};var j=setInterval(i,c)}})(jQuery);
/*
 Fusionfile v0.1
 Author: Bruno Quaranta (fusiondevs)
 Licensed under the MIT license.
*/
(function(a){fusionFileObj=function(a,b){this.constructor(a,b)};a.extend(fusionFileObj.prototype,{version:"1.0.1",constructor:function(b,c){this.defaults={};this.options={};this.options=a.extend(true,this.defaults,c);b.each(function(b){var c=a(this);c.addClass("file-file");c.wrap('<div class="input-field">');var d=c.parent(".input-field");d.prepend('<input type="text" class="file-text" disabled="disabled"><span class="file-button">Select file</span>');c.live("change",function(){d.find(".file-text").val(c.val().replace("C:\\fakepath\\",""))});c.hover(function(){d.find(".file-text").addClass("hover");d.find(".file-button").addClass("hover")},function(){d.find(".file-text").removeClass("hover");d.find(".file-button").removeClass("hover")})})}});a.fn.fusionFile=function(b){new fusionFileObj(a(this),b)}})(jQuery);

// tipsy, facebook style tooltips for jquery
// version 1.0.0a
// (c) 2008-2010 jason frame [jason@onehackoranother.com]
// releated under the MIT license
(function(a){function b(a){if(a.attr("title")||typeof a.attr("original-title")!="string"){a.attr("original-title",a.attr("title")||"").removeAttr("title")}}function c(c,d){this.$element=a(c);this.options=d;this.enabled=true;b(this.$element)}c.prototype={show:function(){var b=this.getTitle();if(b&&this.enabled){var c=this.tip();c.find(".tipsy-inner")[this.options.html?"html":"text"](b);c[0].className="tipsy";c.remove().css({top:0,left:0,visibility:"hidden",display:"block"}).appendTo(document.body);var d=a.extend({},this.$element.offset(),{width:this.$element[0].offsetWidth,height:this.$element[0].offsetHeight});var e=c[0].offsetWidth,f=c[0].offsetHeight;var g=typeof this.options.gravity=="function"?this.options.gravity.call(this.$element[0]):this.options.gravity;var h;switch(g.charAt(0)){case"n":h={top:d.top+d.height+this.options.offset,left:d.left+d.width/2-e/2};break;case"s":h={top:d.top-f-this.options.offset,left:d.left+d.width/2-e/2};break;case"e":h={top:d.top+d.height/2-f/2,left:d.left-e-this.options.offset};break;case"w":h={top:d.top+d.height/2-f/2,left:d.left+d.width+this.options.offset};break}if(g.length==2){if(g.charAt(1)=="w"){h.left=d.left+d.width/2-15}else{h.left=d.left+d.width/2-e+15}}c.css(h).addClass("tipsy-"+g);if(this.options.fade){c.stop().css({opacity:0,display:"block",visibility:"visible"}).animate({opacity:this.options.opacity})}else{c.css({visibility:"visible",opacity:this.options.opacity})}}},hide:function(){if(this.options.fade){this.tip().stop().fadeOut(function(){a(this).remove()})}else{this.tip().remove()}},getTitle:function(){var a,c=this.$element,d=this.options;b(c);var a,d=this.options;if(typeof d.title=="string"){a=c.attr(d.title=="title"?"original-title":d.title)}else if(typeof d.title=="function"){a=d.title.call(c[0])}a=(""+a).replace(/(^\s*|\s*$)/,"");return a||d.fallback},tip:function(){if(!this.$tip){this.$tip=a('<div class="tipsy"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"/></div>')}return this.$tip},validate:function(){if(!this.$element[0].parentNode){this.hide();this.$element=null;this.options=null}},enable:function(){this.enabled=true},disable:function(){this.enabled=false},toggleEnabled:function(){this.enabled=!this.enabled}};a.fn.tipsy=function(b){function d(d){var e=a.data(d,"tipsy");if(!e){e=new c(d,a.fn.tipsy.elementOptions(d,b));a.data(d,"tipsy",e)}return e}function e(){var a=d(this);a.hoverState="in";if(b.delayIn==0){a.show()}else{setTimeout(function(){if(a.hoverState=="in")a.show()},b.delayIn)}}function f(){var a=d(this);a.hoverState="out";if(b.delayOut==0){a.hide()}else{setTimeout(function(){if(a.hoverState=="out")a.hide()},b.delayOut)}}if(b===true){return this.data("tipsy")}else if(typeof b=="string"){return this.data("tipsy")[b]()}b=a.extend({},a.fn.tipsy.defaults,b);if(!b.live)this.each(function(){d(this)});if(b.trigger!="manual"){var g=b.live?"live":"bind",h=b.trigger=="hover"?"mouseenter":"focus",i=b.trigger=="hover"?"mouseleave":"blur";this[g](h,e)[g](i,f)}return this};a.fn.tipsy.defaults={delayIn:0,delayOut:0,fade:false,fallback:"",gravity:"n",html:false,live:false,offset:0,opacity:.8,title:"title",trigger:"hover"};a.fn.tipsy.elementOptions=function(b,c){return a.metadata?a.extend({},c,a(b).metadata()):c};a.fn.tipsy.autoNS=function(){return a(this).offset().top>a(document).scrollTop()+a(window).height()/2?"s":"n"};a.fn.tipsy.autoWE=function(){return a(this).offset().left>a(document).scrollLeft()+a(window).width()/2?"e":"w"}})(jQuery);

/*
 *
 * jqTransform
 * by mathieu vilaplana mvilaplana@dfc-e.com
 * Designer ghyslain armand garmand@dfc-e.com
 *
 *
 * Version 1.0 25.09.08
 * Version 1.1 06.08.09
 * Add event click on Checkbox and Radio
 * Auto calculate the size of a select element
 * Can now, disabled the elements
 * Correct bug in ff if click on select (overflow=hidden)
 * No need any more preloading !!
 * 
 ******************************************** */
(function(a){var b={preloadImg:true};var c=false;var d=function(a){a=a.replace(/^url\((.*)\)/,"$1").replace(/^\"(.*)\"$/,"$1");var b=new Image;b.src=a.replace(/\.([a-zA-Z]*)$/,"-hover.$1");var c=new Image;c.src=a.replace(/\.([a-zA-Z]*)$/,"-focus.$1")};var e=function(b){var c=a(b.get(0).form);var d=b.next();if(!d.is("label")){d=b.prev();if(d.is("label")){var e=b.attr("id");if(e){d=c.find('label[for="'+e+'"]')}}}if(d.is("label")){return d.css("cursor","pointer")}return false};var f=function(b){var c=a(".jqTransformSelectWrapper ul:visible");c.each(function(){var c=a(this).parents(".jqTransformSelectWrapper:first").find("select").get(0);if(!(b&&c.oLabel&&c.oLabel.get(0)==b.get(0))){a(this).hide()}})};var g=function(b){if(a(b.target).parents(".jqTransformSelectWrapper").length===0){f(a(b.target))}};var h=function(){a(document).mousedown(g)};var i=function(b){var c;a(".jqTransformSelectWrapper select",b).each(function(){c=this.selectedIndex<0?0:this.selectedIndex;a("ul",a(this).parent()).each(function(){a("a:eq("+c+")",this).click()})});a("a.jqTransformCheckbox, a.jqTransformRadio",b).removeClass("jqTransformChecked");a("input:checkbox, input:radio",b).each(function(){if(this.checked){a("a",a(this).parent()).addClass("jqTransformChecked")}})};a.fn.jqTransCheckBox=function(){return this.each(function(){if(a(this).hasClass("jqTransformHidden")){return}var b=a(this);var c=this;var d=e(b);d&&d.click(function(){f.trigger("click")});var f=a('<a href="#" class="jqTransformCheckbox"></a>');b.addClass("jqTransformHidden").wrap('<span class="jqTransformCheckboxWrapper"></span>').parent().prepend(f);b.change(function(){this.checked&&f.addClass("jqTransformChecked")||f.removeClass("jqTransformChecked");return true});f.click(function(){if(b.attr("disabled")){return false}b.trigger("click").trigger("change");return false});this.checked&&f.addClass("jqTransformChecked")})};a.fn.jqTransRadio=function(){return this.each(function(){if(a(this).hasClass("jqTransformHidden")){return}var b=a(this);var c=this;oLabel=e(b);oLabel&&oLabel.click(function(){d.trigger("click")});var d=a('<a href="#" class="jqTransformRadio" rel="'+this.name+'"></a>');b.addClass("jqTransformHidden").wrap('<span class="jqTransformRadioWrapper"></span>').parent().prepend(d);b.change(function(){c.checked&&d.addClass("jqTransformChecked")||d.removeClass("jqTransformChecked");return true});d.click(function(){if(b.attr("disabled")){return false}b.trigger("click").trigger("change");a('input[name="'+b.attr("name")+'"]',c.form).not(b).each(function(){a(this).attr("type")=="radio"&&a(this).trigger("change")});return false});c.checked&&d.addClass("jqTransformChecked")})};a.fn.jqTransSelect=function(){return this.each(function(b){var c=a(this);if(c.hasClass("jqTransformHidden")){return}if(c.attr("multiple")){return}var d=e(c);var g=c.addClass("jqTransformHidden").wrap('<div class="jqTransformSelectWrapper"></div>').parent().css({zIndex:10-b});g.prepend('<div><span></span><a href="#" class="jqTransformSelectOpen"></a></div><ul></ul>');var h=a("ul",g).css("width",c.width()).hide();a("option",this).each(function(b){var c=a('<li><a href="#" index="'+b+'">'+a(this).html()+"</a></li>");h.append(c)});h.find("a").click(function(){a("a.selected",g).removeClass("selected");a(this).addClass("selected");if(c[0].selectedIndex!=a(this).attr("index")&&c[0].onchange){c[0].selectedIndex=a(this).attr("index");c[0].onchange()}c[0].selectedIndex=a(this).attr("index");a("span:eq(0)",g).html(a(this).html());h.hide();return false});a("a:eq("+this.selectedIndex+")",h).click();a("span:first",g).click(function(){a("a.jqTransformSelectOpen",g).trigger("click")});d&&d.click(function(){a("a.jqTransformSelectOpen",g).trigger("click")});this.oLabel=d;var i=a("a.jqTransformSelectOpen",g).click(function(){if(h.css("display")=="none"){f()}if(c.attr("disabled")){return false}h.slideToggle("fast",function(){var b=a("a.selected",h).offset().top-h.offset().top;h.animate({scrollTop:b})});return false});var j=c.outerWidth();var k=a("span:first",g);var l=j>k.innerWidth()?j+i.outerWidth():g.width();g.css("width",l);h.css("width",l-2);k.css({width:j});h.css({display:"block",visibility:"hidden"});var m=a("li",h).length*a("li:first",h).height();m<h.height()&&h.css({height:m,overflow:"hidden"});h.css({display:"none",visibility:"visible"})})};a.fn.jqTransform=function(c){var d=a.extend({},b,c);return this.each(function(){var b=a(this);if(b.hasClass("jqtransformdone")){return}b.addClass("jqtransformdone");a("input:checkbox:not(.ios)",this).jqTransCheckBox();a("input:radio",this).jqTransRadio();if(a("select:not(.chzn-select)",this).jqTransSelect().length>0){h()}b.bind("reset",function(){var a=function(){i(this)};window.setTimeout(a,10)})})}})(jQuery);


function apprise(a,b,c){var d={confirm:false,verify:false,input:false,animate:false,textOk:"Ok",textCancel:"Cancel",textYes:"Yes",textNo:"No"};if(b){for(var e in d){if(typeof b[e]=="undefined")b[e]=d[e]}}var f=$(document).height();var g=$(document).width();$("body").append('<div class="appriseOverlay" id="aOverlay"></div>');$(".appriseOverlay").css("height",f).css("width",g).fadeIn(100);$("body").append('<div class="appriseOuter"></div>');$(".appriseOuter").append('<div class="appriseInner"></div>');$(".appriseInner").append(a);$(".appriseOuter").css("left",($(window).width()-$(".appriseOuter").width())/2+$(window).scrollLeft()+"px");if(b){if(b["animate"]){var h=b["animate"];if(isNaN(h)){h=400}$(".appriseOuter").css("top","-200px").show().animate({top:"45%"},h)}else{$(".appriseOuter").css("top","100px").fadeIn(200)}}else{$(".appriseOuter").css("top","100px").fadeIn(200)}if(b){if(b["input"]){if(typeof b["input"]=="string"){$(".appriseInner").append('<div class="aInput"><input type="text" class="aTextbox" t="aTextbox" value="'+b["input"]+'" /></div>')}else{$(".appriseInner").append('<div class="aInput"><input type="text" class="aTextbox" t="aTextbox" /></div>')}$(".aTextbox").focus()}}$(".appriseInner").append('<div class="aButtons"></div>');if(b){if(b["confirm"]||b["input"]){$(".aButtons").append('<button value="ok">'+b["textOk"]+"</button>");$(".aButtons").append('<button value="cancel">'+b["textCancel"]+"</button>")}else if(b["verify"]){$(".aButtons").append('<button value="ok">'+b["textYes"]+"</button>");$(".aButtons").append('<button value="cancel">'+b["textNo"]+"</button>")}else{$(".aButtons").append('<button value="ok">'+b["textOk"]+"</button>")}}else{$(".aButtons").append('<button value="ok">Ok</button>')}$(document).keydown(function(a){if($(".appriseOverlay").is(":visible")){if(a.keyCode==13){$('.aButtons > button[value="ok"]').click()}if(a.keyCode==27){$('.aButtons > button[value="cancel"]').click()}}});var i=$(".aTextbox").val();if(!i){i=false}$(".aTextbox").keyup(function(){i=$(this).val()});$(".aButtons > button").click(function(){$(".appriseOverlay").remove();$(".appriseOuter").remove();if(c){var a=$(this).attr("value");if(a=="ok"){if(b){if(b["input"]){c(i)}else{c(true)}}else{c(true)}}else if(a=="cancel"){c(false)}}})};

/* OPERA FIX FOR WINDOW LOAD */
history.navigationMode = 'compatible';

/* IPHONE */
function isiPhone(){
    return (
        (navigator.platform.indexOf("iPhone") != -1) ||
        (navigator.platform.indexOf("iPod") != -1)
    );
}

/* LOADER */
jQuery(document).ready(function() {
	if (isiPhone()) { jQuery('#loading-block').hide();  }
});
jQuery(window).load(function() { 
	jQuery('#loading-block').fadeOut(function() {
		// increase widgets numbers
		if (jQuery('.arrow-up, .arrow-down, .arrow-right').length) {
			jQuery('.arrow-up, .arrow-down, .arrow-right').each(function() {
				var t = jQuery(this);
				var e = t.find('.perc span');
				var v = parseInt(e.attr('data-value'), 10);
				
				e.data('counter', '');
				e.html('0');
		
				var $counter = e;
				e.animateNumber(v, 20);
			});
		}
		
		if (jQuery('.knob').length) {
			jQuery('.knob').each(function() {
				var t = jQuery(this);
				var e = t;
				var v = parseInt(e.attr('data-value'), 10);
				
				e.data('counter', '');
				e.val(0);
		
				var $counter = e;
				e.animateNumber(v, 20, function() { e.change(); });
				
			});
		}
		
		// CHART 1
		if (jQuery('#chart1').length) {
			var chart = jQuery('#chart1');
			chart.width(chart.parent().width());
			chart.height(chart.parent().height());
			
			var s1 = [[2002, 112000], [2003, 122000], [2004, 104000], [2005, 99000], [2006, 121000], [2007, 148000], [2008, 114000], [2009, 133000], [2010, 161000], [2011, 173000]];
			var s2 = [[2002, 10200], [2003, 10800], [2004, 11200], [2005, 11800], [2006, 12400], [2007, 12800], [2008, 13200], [2009, 12600], [2010, 13100], [2011, 15400]];
			plot1 = jQuery.jqplot("chart1", [s2, s1], {
				seriesColors:['#659ebe', '#e0df71', '#d3a1ce', '#9bd49c', '#ba7979'],
				animate: ((jQuery.browser.mozilla) ? false : true),
				animateReplot: false,
				cursor: { showTooltip: false },
				grid: {
					backgroundColor: 'transparent',
					gridLineColor: '#121212',
					borderColor: '#121212',
					borderWidth: 0,
					shadowAlpha: 0.03
				},
				series:[
					{	// Serie 1
						pointLabels: {
							show: true
						},
						renderer: $.jqplot.BarRenderer,
						showHighlight: false,
						yaxis: 'y2axis',
						rendererOptions: {
							animation: {
								speed: 3500
							},
							barWidth: 20,
							barPadding: -15,
							barMargin: 0,
							highlightMouseOver: false
						}
					}, 
					{	// Serie 2
						rendererOptions: {
							animation: {
								speed: 3000
							}
						}
					}
				],
				axesDefaults: {
					pad: 0
				},
				axes: {
					// These options will set up the x axis like a category axis.
					xaxis: {
						tickInterval: 1,
						drawMajorGridlines: false,
						drawMinorGridlines: true,
						drawMajorTickMarks: false,
						rendererOptions: {
						tickInset: 0.5,
						minorTicks: 1
					}
					},
					yaxis: {
						tickOptions: {
							formatString: "$%'d"
						},
						rendererOptions: {
							forceTickAt0: true
						}
					},
					y2axis: {
						tickOptions: {
							formatString: "$%'d"
						},
						rendererOptions: {
							// align the ticks on the y2 axis with the y axis.
							alignTicks: true,
							forceTickAt0: true
						}
					}
				},
				highlighter: {
					show: true, 
					showLabel: true, 
					tooltipAxes: 'y',
					sizeAdjust: 7.5 , 
					tooltipLocation : 'n'
				}
			});
			jQuery(window).bind('resize', function(event, ui) {
				// Resize the chart to its parent (or any other container)
				var chart = jQuery('#chart1');
				chart.width(chart.parent().width());
				chart.height(chart.parent().height());
				// replot the chart
				plot1.replot({resetAxes: true});
			});
		}
		// END CHART 1
		
		// CHART 2
		if (jQuery('#chart2').length) {
			var chart = jQuery('#chart2');
			chart.width(chart.parent().width());
			chart.height(chart.parent().height());
			
			plot2 = jQuery.jqplot('chart2', [[[2,1], [4,2], [7,3], [10,4]]], {
				captureRightClick: true,
				seriesColors:['#659ebe', '#e0df71', '#d3a1ce', '#9bd49c', '#ba7979'],
				seriesDefaults:{
					renderer:$.jqplot.BarRenderer,
					shadowAngle: 135,
					rendererOptions: {
						barDirection: 'horizontal',
						highlightMouseDown: true,
						barWidth: 40
					},
					pointLabels: {show: true, formatString: '%d'}
				},
				axes: {
					yaxis: {
						renderer: $.jqplot.CategoryAxisRenderer
					}
				},
				animate: ((jQuery.browser.mozilla) ? false : true),
				animateReplot: false,
				grid: {
					backgroundColor: 'transparent',
					gridLineColor: '#121212',
					borderColor: '#121212',
					borderWidth: 0,
					shadowAlpha: 0.0
				}
			});
			
			jQuery(window).bind('resize', function(event, ui) {
				// Resize the chart to its parent (or any other container)
				var chart = jQuery('#chart2');
				chart.width(chart.parent().width());
				chart.height(chart.parent().height());
				// replot the chart
				plot2.replot({resetAxes: true});
			});
		}
		// END CHART 2
		
		// CHART 3
		if (jQuery('#chart3').length) {
			var chart = jQuery('#chart3');
			chart.width(chart.parent().width());
			chart.height(chart.parent().height());
			
			var s1 = [['a',6], ['b',8], ['c',14], ['d',20]];
			var s2 = [['a', 8], ['b', 12], ['c', 6], ['d', 9]];
			
			var plot3 = $.jqplot('chart3', [s1, s2], {
				seriesColors:['#659ebe', '#e0df71', '#d3a1ce', '#9bd49c', '#ba7979'],
				seriesDefaults: {
				  // make this a donut chart.
				  renderer:$.jqplot.DonutRenderer,
				  rendererOptions:{
					// Donut's can be cut into slices like pies.
					sliceMargin: 3,
					// Pies and donuts can start at any arbitrary angle.
					startAngle: -90,
					showDataLabels: true,
					// By default, data labels show the percentage of the donut/pie.
					// You can show the data 'value' or data 'label' instead.
					dataLabels: 'value'
				  }
				},
				animate: ((jQuery.browser.mozilla) ? false : true),
				animateReplot: false,
				grid: {
					backgroundColor: 'transparent',
					gridLineColor: '#121212',
					borderColor: '#121212',
					borderWidth: 0,
					shadowAlpha: 0.0
				}
			});
			jQuery(window).bind('resize', function(event, ui) {
				// Resize the chart to its parent (or any other container)
				var chart = jQuery('#chart3');
				chart.width(chart.parent().width());
				chart.height(chart.parent().height());
				// replot the chart
				plot3.replot({resetAxes: true});
			});
		}
		// END CHART 3
		
		// CHART DASHBOARD
		if (jQuery('#chart_dashboard').length) {
			var chart = jQuery('#chart_dashboard');
			chart.width(chart.parent().width());
			chart.height(chart.parent().height());
			
			var s1 = [[2002, 11200], [2003, 12200], [2004, 10400], [2005, 9900], [2006, 12100], [2007, 14800], [2008, 11400], [2009, 13000], [2010, 16100], [2011, 17000]];
			plot1 = jQuery.jqplot("chart_dashboard", [s1], {
				seriesColors:['#bee058', '#659ebe', '#d3a1ce', '#9bd49c', '#ba7979'],
				animate: ((jQuery.browser.mozilla) ? false : true),
				animateReplot: false,
				cursor: { showTooltip: false },
				grid: {
					backgroundColor: 'transparent',
					gridLineColor: '#121212',
					borderColor: '#121212',
					borderWidth: 0,
					shadowAlpha: 0.03
				},
				series:[
					{	// Serie 2
						rendererOptions: {
							animation: {
								speed: 3000
							}
						}
					}
				],
				seriesDefaults: {
					lineWidth: 3.5,
					markerOptions: {
						show: true,             // wether to show data point markers.
						style: 'filledCircle',  // circle, diamond, square, filledCircle, filledDiamond or filledSquare.
						lineWidth: 2,       // width of the stroke drawing the marker.
						size: 10,            // size (diameter, edge length, etc.) of the marker.
						shadow: true,       // wether to draw shadow on marker or not.
						shadowAngle: 45,    // angle of the shadow.  Clockwise from x axis.
						shadowOffset: 1,    // offset from the line of the shadow,
						shadowDepth: 3,     // Number of strokes to make when drawing shadow.  Each stroke offset by shadowOffset from the last.
						shadowAlpha: 0.1   // Opacity of the shadow
					}
				},
				axesDefaults: {
					pad: 0
				},
				axes: {
					// These options will set up the x axis like a category axis.
					xaxis: {
						tickInterval: 1,
						drawMajorGridlines: false,
						drawMinorGridlines: true,
						drawMajorTickMarks: false,
						rendererOptions: {
							tickInset: 0.5,
							minorTicks: 1
						}
					},
					yaxis: {
						tickOptions: {
							formatString: "%'d"
						},
						rendererOptions: {
							forceTickAt0: true
						}
					}
				},
				highlighter: {
					show: true, 
					showLabel: true, 
					tooltipAxes: 'y',
					sizeAdjust: 7.5 , 
					tooltipLocation : 'n'
				}
			});
			jQuery(window).bind('resize', function(event, ui) {
				// Resize the chart to its parent (or any other container)
				var chart = jQuery('#chart_dashboard');
				chart.width(chart.parent().width());
				chart.height(chart.parent().height());
				// replot the chart
				plot1.replot({resetAxes: true});
			});
		}
		// END CHART DASHBOARD
		
		
	}); 
});

/* Caffeine */
jQuery(document).ready(function() {
	// add plus to nav
	var plus = '<span class="plus"></span>';
	jQuery('.nav li').each(function() {
		var t = jQuery(this);
		if (t.find('.submenu').length) {
			t.find('a').eq(0).append(plus);
			t.addClass('has-menu');
		}
	});
	// nav toggle
	jQuery('.nav li.has-menu > a').live('click', function(event) {
		event.preventDefault();
		var t = jQuery(this).parent('li');
		t.find('ul.submenu').slideToggle();
	});
	// active nav
	jQuery('.nav li.active').each(function() {
		var t = jQuery(this);
		if (t.parent().attr('class') == 'submenu') {
			t.parent().slideToggle();
		}
		else {
			t.find('a').append('<span class="arrow"></span>');
		}
	});
	
	// Knob widgets
	
	jQuery(".knob").each(function() {
		jQuery(this).val(0);
		jQuery(this).knob({
			class : 'widget-knob',
			draw : function () {
				var a = this.angle(this.cv)  		// Angle
					, sa = this.startAngle          // Previous start angle
					, sat = this.startAngle         // Start angle
					, ea                            // Previous end angle
					, eat = sat + a                 // End angle
					, r = 1;
				this.g.lineWidth = this.lineWidth;
				this.o.cursor
					&& (sat = eat - 0.3)
					&& (eat = eat + 0.3);
				this.g.beginPath();
				this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
				this.g.arc(this.xy, this.xy, this.radius - this.lineWidth*1.5, sat, eat, false);
				this.g.stroke();
				this.g.lineWidth = 2;
				this.g.beginPath();
				this.g.strokeStyle = this.o.fgColor;
				this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
				this.g.stroke();
				return false;
			}
		});
	});
	
	// Mask
	if (jQuery('input.mask').length) {
		jQuery('input.mask').each(function() {
			var t = jQuery(this);
			var mask = t.attr('data-mask');
			t.mask(mask);
		});
	}
	// Chozen
	if (jQuery('.chzn-select').length) {
		jQuery('.chzn-select').chosen();
	}
	// Alerts 
	jQuery('.alert-small .close').click(function() {
		var p = jQuery(this).parent();
		p.fadeOut();
	});
	// Sliders
	$("#slider").slider({ 
		from: 1000, 
		to: 100000, 
		step: 500, 
		smooth: true, 
		round: 0, 
		dimension: "&nbsp;$", 
		skin: "round_plastic" 
	});
	jQuery("#slider2").slider({ 
		from: 5, 
		to: 50, 
		step: 2.5, 
		round: 1, 
		format: { 
			format: '##.0', 
			locale: 'de' 
		}, 
		dimension: '&nbsp;€', 
		skin: "round_plastic" 
	});
	
	// Editor 
	jQuery('.wysihtml5-contents textarea').each(function() {
		var ta = jQuery(this);
		var tb = ta.parent().parent().find('.wysihtml5-toolbar');
		
		if ((!ta.attr('id')) || (!tb.attr('id'))) { alert('Your WYSIWYG editor requires ID attribute to be set into the textarea and the toolbar div'); }
		else {
			var editor = new wysihtml5.Editor(ta.attr('id'), { toolbar: tb.attr('id'), parserRules: wysihtml5ParserRules });
		}
			
	});
	
	// File fields
	if (jQuery('input:file').length) {
		jQuery('input:file').fusionFile();
	}
	
	// iPhone checkbox
	if (jQuery(':checkbox.ios').length) {
		jQuery(':checkbox.ios').iphoneStyle();
	}
	
	// Spinner
	jQuery('.spinner').each(function() {
		var t = jQuery(this);
		var v_max = 100;
		var v_min = 0;
		if (t.attr('data-max')) { v_max = parseInt(t.attr('data-max'), 10); }
		if (t.attr('data-min')) { v_min = parseInt(t.attr('data-min'), 10); }
		t.spinner({min: v_min, max: v_max});
	});
	
	// ColorPicker
	if (jQuery(".color-picker").length) {
		jQuery(".color-picker").miniColors({
			letterCase: 'uppercase'
		});
	}
	
	// Data tables
	if (jQuery('table.data-table').length) {
		jQuery('table.data-table').dataTable( {
			"sPaginationType": "full_numbers"
		});
	}
	
	// Tipsy 
	if (jQuery('.tipsy-trigger').length) {
		jQuery('.tipsy-trigger').each(function() {
			jQuery(this).tipsy({
				gravity: ((jQuery(this).attr('data-tipsy-direction')) ? jQuery(this).attr('data-tipsy-direction') : 's'), 
				fade: true
			});
		});
	}
	jQuery('.tipsy-header').tipsy({gravity: 'n', fade: true});
	
	
	// Progress bars
	jQuery('.progress-bar:not(.vertical) .complete').each(function() {
		var t = jQuery(this);
		var p = t.parent();
		var size = parseInt(p.attr('data-size'), 10);
		if (size) { p.width(size); }
		
		var progress = parseInt(t.attr('data-progress'), 10);
		
		var p_w = p.width();
		var complete_width = (((p_w-12)/100)*progress);
		t.css({'width': complete_width+'px'});
		p.find('.label').html(progress+'%');
		
		var l_w = p.find('.label').width();
		p.find('.label').css('left', ((p_w/2)-(l_w/2)));
	});
	
	jQuery('.progress-bar.vertical .complete').each(function() {
		var t = jQuery(this);
		var p = t.parent();
		var size = parseInt(p.attr('data-size'), 10);
		if (size) { p.height(size); }
		
		var progress = parseInt(t.attr('data-progress'), 10);
		
		var p_h = p.height();
		var complete_height = (((p_h-12)/100)*progress);
		t.css({'height': complete_height+'px'});
		p.find('.label').html(progress+'%');
		
		var l_h = p.find('.label').height();
		p.find('.label').css('top', ((p_h/2)-(l_h/2)));
		var l_w = p.find('.label').width();
		var p_w = p.width();
		p.find('.label').css('left', ((p_w/2)-(l_w/2)));
	});
	
	// Tabs
	jQuery('.tabs-set').each(function() {
		var p = jQuery(this);
		p.find('.tabs li').click(function() {
			p.find('.tabs li').removeClass('active');
			jQuery(this).addClass('active');
			var ix = jQuery(this).index();
			p.find('.tab-panel').hide().eq(ix).show();
		}).eq(0).click();
	});
	
	// Search form
	jQuery('.search-box.closed').live('click', function() {
		var t = jQuery(this);
		t.removeClass('closed').addClass('opened');
		t.animate({'width': '230px'}, function() {
			t.find('input').fadeIn().focus();
		});
	});
	
	// SliderNav
	if (jQuery('.slider-contact').length) {
		jQuery('.slider-contact').sliderNav();
	}
	
	// prettyPhoto
	if (jQuery("a[rel^='prettyPhoto']").length) {
		jQuery("a[rel^='prettyPhoto']").prettyPhoto();
	}
	
	// Widget Sparkline
	if (jQuery(".widget .sparkline").length) {
		jQuery(".widget .sparkline").each(function() {
			jQuery(this).sparkline('html', {
				type: 'bar',
				barWidth: 7,
				barSpacing: 2,
				barColor: ((jQuery(this).attr('data-color')) ? jQuery(this).attr('data-color') : '#63D844'),
				negBarColor: '#bd5151',
				height: 35,
				width: 70
			});
		});
	};
	// jqTransform
	if ((jQuery('select:not(.chzn-select)').length) || (jQuery('input[type=checkbox]').length) || (jQuery('input[type=radio]:not(.ios)').length)) {
		if (!jQuery('.dataTables_length select').length) {
			jQuery('body').jqTransform({imgPath:'img/'});
		}
	}
	

});