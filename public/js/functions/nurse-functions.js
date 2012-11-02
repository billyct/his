$('[name="id_card"]').live('focusout', function(){

	var self = $(this);
	var show_patient_url = self.attr('data-url');

	$.get(show_patient_url+'/'+self.val()+'/2', function(data){
		data = $.parseJSON(data);
		if(!_.isEmpty(data)){
			$('[name="name"]').val(data['name']);
			$('#gender_select_container div.jqTransformSelectWrapper ul li a')[data["gender"]].click();
			$('[name="age"]').val(data['age']);
			$('[name="address"]').val(data['address']);
			$('[name="phone"]').val(data['phone']);
		}else {
			var o = get_gender_age(self.val());
			console.log(o);
			$('[name="age"]').val(o.age);
			$('#gender_select_container div.jqTransformSelectWrapper ul li a')[o.gender].click();
		}
	});

});

$('#addreg_btn').live('click',function(){
	//$("#adduser_form").submit();

	var regdata = {
		id_card   : $('#addreg_form input[name="id_card"]').val(),
		name      : $('#addreg_form input[name="name"]').val(),
		gender    : $('#addreg_form select[name="gender"]').val(),
		age       : $('#addreg_form input[name="age"]').val(),
		address   : $('#addreg_form input[name="address"]').val(),
		phone     : $('#addreg_form input[name="phone"]').val(),
		flag      : $('#addreg_form select[name="flag"]').val(),
		depart_id : $('#addreg_form select[name="depart_id"]').val(),
		expert_id : $('#addreg_form select[name="expert_id"]').val()
	};

	addbtn_function($(this), regdata, 'reglist_tr_tmpl', '#reglist_table tbody');

	return false;
});

$('.show_patient').live('click', function() {
	var url = $(this).attr('href');
	$.getJSON(url, function(data) {

		var tmpl = document.getElementById('patient_tmpl').innerHTML;
		var doTtmpl = doT.template(tmpl);
		
		apprise(doTtmpl(data), {'animate': true, 'textOk': '确定'});
		
		console.log(data);
	});

	return false;

});

$('#finddrug_btn').live('click', function(){
	$('#drug_table tbody').empty();
	var case_info = {
		case_id : $('#finddrug_form input[name="id"]').val()
	};

	addbtn_function($(this), case_info, 'case_drug_tmpl', '#drug_table tbody');

	$('#finddrug_form input[name="id"]').attr('disabled', 'disabled');
	return false;
});

$('#prescribe_btn').live('click', function(){
	// var drugs_data = new Array();
	// $.each($('#drug_table tbody tr:not(:last)'), function(){
	// 	var self = $(this);
	// 	var drug_id = parseInt($(this).find('td:eq(0)').text());
	// 	var drug_sum = parseInt($(this).find('td:eq(2)').text());
	// 	drugs_data = _.union(drugs_data, {id:drug_id, sum:drug_sum});
	// });
	var case_id = $('#finddrug_form input[name="id"]').val();
	if (case_id == '') {
		apprise('请输入病例编号来开药', {'animate': true, 'textOk': '确定'});
		return false;
	};
	$.post('nurse/prescribe', {
		case_id    : case_id
	}, function(data){
		data = $.parseJSON(data);
		apprise(data['msg'], {'animate': true, 'textOk': '确定'});
		if (data['code'] == 1) {
			$('#finddrug_form input[name="id"]').val('');
		}
	});

	$('#finddrug_form input[name="id"]').removeAttr('disabled');

	return false;
});

$('#cancelprescribe_btn').live('click', function(){
	$('#drug_table tbody').empty();
	$('#finddrug_form input[name="id"]').val('');
	$('#finddrug_form input[name="id"]').removeAttr('disabled');
	return false;
});
