
$('#adduser_btn').live('click',function(){
	//$("#adduser_form").submit();

	var userdata = {
		username  : $('#adduser_form input[name="username"]').val(),
		password  : $('#adduser_form input[name="password"]').val(),
		real_name : $('#adduser_form input[name="real_name"]').val(),
		flag      : $('#adduser_form select[name="flag"]').val(),
		depart_id : $('#adduser_form select[name="depart_id"]').val()
	};

	addbtn_function($(this), userdata, 'userlist_tr_tmpl', '#userlist_table tbody');

	return false;
});

$('#adddepart_btn').live('click',function(){

	var departdata = {
		depart_name  : $('#adddepart_form input[name="depart_name"]').val(),
	};
	addbtn_function($(this), departdata, 'departlist_tr_tmpl', '#departlist_table tbody');



	return false;
});


$('#adddrug_btn').live('click', function() {
	var drugdata = {
		type : $('#adddrug_form select[name="drug_type"]').val(),
		name : $('#adddrug_form input[name="drug_name"]').val(),
		price: $('#adddrug_form input[name="drug_price"]').val(),
		sum  : $('#adddrug_form input[name="drug_sum"]').val()
	};

	addbtn_function($(this), drugdata, 'druglist_tr_tmpl', '#druglist_table tbody');

	return false;


});

$('#flag_select_container select[name="flag"]').live('click', function(){
	if (parseInt($(this).val()) == 3) {
		$('#depart_select').removeAttr('disabled');
	} else {
		$('#depart_select').val(0);
		$('#depart_select').attr('disabled', 'disabled');
	}
	
});