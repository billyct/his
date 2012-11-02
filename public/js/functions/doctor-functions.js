$('body').attr('name','drug_body');

$('#adddrug_link').live('click', function(){
	$('#drug_table tbody').append($('#drug_tr_tmpl').html());
	return false;
});

$('#drug_type_select').live('change', function(){
	var self = $(this);
	var tr = self.parents('tr');
	var drug_type = parseInt(self.val());
	switch(drug_type) {
		case 1:
			tr.find('.drug_div').hide();
			tr.find('#drugZY_select_container').show();
			break;
		case 2:
			tr.find('.drug_div').hide();
			tr.find('#drugXY_select_container').show();
			break;
		case 3:
			tr.find('.drug_div').hide();
			tr.find('#drugZCY_select_container').show();
			break;
		default:
		    break;
	}
});

$('#adddrug_btn').live('click', function(){

	var patient_talk = $('textarea[name="patient_talk"]').val();
	var doctor_talk = $('textarea[name="doctor_talk"]').val();

	var drugs_data = new Array();

	$.each($('.drug_tr'), function(i){
		var self = $(this);
		var drug_type = parseInt(self.find('select[name="drug_type"]').val());
		var drug_id = null;
		switch(drug_type){
			case 1:
				drug_id = self.find('select[name="drugZY"]').val();
				break;
			case 2:
				drug_id = self.find('select[name="drugXY"]').val();
				break;
			case 3:
				drug_id = self.find('select[name="drugZCY"]').val();
				break;
			default:
				break;
		}
		var drug_sum = self.find('input[name="sum"]').val();
		drugs_data = _.union(drugs_data, {drug_type:drug_type, drug_id:drug_id, drug_sum:drug_sum});
	});

	var doctor_control_data = {
		patient_id : $('input[name="patient_id"]').val(),
		reg_id : $('input[name="reg_id"]').val(),
		doctor_talk : doctor_talk,
		patient_talk : patient_talk,
		drugs_data : drugs_data
	};

	$.post($(this).attr('action_url'), doctor_control_data, function(data){
		data = $.parseJSON(data);
		apprise(data['msg'], {'animate': true, 'textOk': '确定'});
		if (data['code'] == 1) {
			$('#drug_table tbody').empty();
			$('#patient_reg').empty();
			$('textarea[name="patient_talk"]').val('');
			$('textarea[name="doctor_talk"]').val('');
			$('#findreg_form input[name="id"]').val('');
		};
	});

	// console.log($('input[name="patient_id"]').val());
	// console.log($('input[name="reg_id"]').val());
	// console.log($(this).attr('action_url'));
	// console.log(doctor_talk);
	// console.log(patient_talk);
	console.log(drugs_data);

	return false;
});

$('#findreg_btn').live('click', function(){
	var patient_info = {
		id : $('#findreg_form input[name="id"]').val()
	};

	addbtn_function($(this), patient_info, 'patient_reg_tmpl', '#patient_reg');

	return false;
});