

$('.delete_link').live('click', function(){
	var self = $(this);
	var attr_data = $(this).attr('data');
	var delete_link = $(this).attr('href');
	if (attr_data) {
		$.post(delete_link, {
			id : attr_data
		}, function(data){
			data = $.parseJSON(data);
			apprise(data['msg'], {'animate': true, 'textOk': '确定'});
			if (data['code'] == 1) {
				self.parents('tr').remove();
			}
		});
	}else {
		self.parents('tr').remove();
	}

	return false;
});



$('.page_link').click(function(){
	
	//$('body').removeAttr('name');

	var self = $(this);
	$('#main_nav li[class="active"] a').find('span').remove();
	$('#main_nav li[class="active"]').removeAttr('class');

	self.parent('li').attr('class', 'active');
	self.append('<span class="arrow"></span>');

	$('#current_link_title').text(self.text());

	$('#page_main').children().hide();

	var page_dataid = $('#page_main').children('#'+self.attr('dataid'));

	if ($('#page_main').hasClass(self.attr('dataid'))) {	
		jQuery('#loading-block').show();
		jQuery('#loading-block').fadeOut(function() {
			page_dataid.show();
			//jQuery('body').jqTransform({imgPath:'img/'});
		});
	}else {	
		$.get(self.attr('href'), function(data){
			jQuery('#loading-block').show();
			jQuery('#loading-block').fadeOut(function() {
				$('#page_main').addClass(self.attr('dataid'));
				$('#page_main').append(data);

				// Mask
				if (jQuery('input.mask').length) {
					jQuery('input.mask').each(function() {
						var t = jQuery(this);
						var mask = t.attr('data-mask');
						t.mask(mask);
					});
				}

				jQuery('body[name!="drug_body"]').jqTransform({imgPath:'img/'});


				select_function();
			});
		});
	}


	return false;

});




function select_function() {
	$("#flag_select_container div.jqTransformSelectWrapper ul li a").click(function(){
	        var value = $(this).parent().index();
	        $("[name=flag]").attr('selectedIndex', value);

	        // will alert 21, 12, or 34 depending on which one was selected
	        if ($('#depart_select')[0]) {
		        if($("[name=flag]").val() == 3) {
		        	$('#depart_select').removeAttr('disabled');
		        }else {
		        	$("#depart_select_container div.jqTransformSelectWrapper ul li a")[0].click();
		        	$('#depart_select').attr('disabled', 'disabled');
		        }
		    }

	        if ($('#expert_select')[0]) {
		        if($('[name=flag]').val() == 1) {
		        	$('#expert_select').removeAttr('disabled');		        	
		        }else {
		        	$("#expert_select_container div.jqTransformSelectWrapper ul li a")[0].click();
		        	$('#expert_select').attr('disabled', 'disabled');
		        }
		    }
	        return false; 
	});


	// $(".drug_type_select_container div.jqTransformSelectWrapper ul li a").click(function(){
	// 	var tr = $(this).parents('tr');
	// 	console.log(tr);
	// 	var value = $(this).parent().index();
	// 	tr.find("[name=drug_type]").attr('selectedIndex', value);
	// 	var drug_type = parseInt(tr.find("[name=drug_type]").val());

	// 	switch(drug_type) {
	// 		case 1:
	// 			tr.find('.drug_div').hide();
	// 			tr.find('#drugZY_select_container').show();
	// 			break;
	// 		case 2:
	// 			tr.find('.drug_div').hide();
	// 			tr.find('#drugXY_select_container').show();
	// 			break;
	// 		case 3:
	// 			tr.find('.drug_div').hide();
	// 			tr.find('#drugZCY_select_container').show();
	// 			break;
	// 		default:
	// 		    break;

	// 	}


	//     return false;
	// });
}

function get_gender_age(id_card) {
	//获取出生日期 
	//UUserCard.substring(6, 10) + "-" + UUserCard.substring(10, 12) + "-" + UUserCard.substring(12, 14); 
	//获取性别 
	var gender = null;
	if (parseInt(id_card.substr(16, 1)) % 2 == 1) { 
		//男
		gender = 1; 
	} else { 
		//女
		gender = 0; 
	} 
	//获取年龄 
	var myDate = new Date(); 
	var month = myDate.getMonth() + 1; 
	var day = myDate.getDate();
	var age = myDate.getFullYear() - id_card.substring(6, 10) - 1; 
	if (id_card.substring(10, 12) < month || id_card.substring(10, 12) == month && id_card.substring(12, 14) <= day) { 
		age++; 
	}

	return {
		gender : gender,
		age : age
	};
}

function addbtn_function(self, data_insert, tmpl_id, append_id) {

	$.post(self.parents('form').attr('action'), data_insert, function(data){
		data = $.parseJSON(data);
		
		_.extend(data_insert, data['data']);

		console.log(data_insert);
		//data_insert['id'] = data['data']['id'];
		//jQuery('#jgrowl').jGrowl(data['msg']);
		apprise(data['msg'], {'animate': true, 'textOk': '确定'});
		if (data['code'] == 1) {

			var tmpl = document.getElementById(tmpl_id).innerHTML;
			var doTtmpl = doT.template(tmpl);

			$(append_id).append(doTtmpl(data_insert));
		};
	});

};