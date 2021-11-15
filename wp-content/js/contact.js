$(function ($) {
    "use strict";
	
	$('#contoh').dataTable({
		"processing": true,
		"serverSide": true,
		"scrollX": true,
		"ajax": {
			"url": "data/contact",
			"type": "POST"
		},
		"order": [[ 0, "desc" ]],
		"columns": [
			{ "data": "id", "visible": false },
			{ "data": "name" },
			{ "data": "company" },
			{ "data": "address", "visible": false },
			{ "data": "city" },
			{ "data": "province", "visible": false },
			{ "data": "country", "visible": false },
			{ "data": "zip", "visible": false },
			{ "data": "contact" },
			{ "data": "phone" },
			{ "data": "email" }
		]
	});
	
	$('#contoh tbody').on('click', 'tr', function () {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
		}
		else {
			$('#contoh tbody tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
	
	$("#bSave").click(function(e){
		$('#contactID').val("");
		$('#contactName').val("");
		$('#contactCompany').val("");
		$('#contactAddress').val("");
		$('#contactCity').val("");
		$('#contactProvince').val("");
		$('#contactCountry').val("");
		$('#contactZip').val("");
		$('#contactContact').val("");
		$('#contactPhone').val("");
		$('#contactEmail').val("");
		
		$('#modSave').modal('show');
	});
	
	$("#bEdit").click(function(e){
		if ($('#contoh tbody tr.selected td.dataTables_empty').length) {
			var n = noty({
				text        : 'No data found',
				type        : 'information',
				dismissQueue: true,
				killer      : true,
				timeout     : 3000,
				layout      : 'bottomRight',
				theme       : 'defaultTheme'
			});
		}
		else if ($('#contoh tbody tr.selected').length) {
			var data = $('#contoh').DataTable().row($('#contoh tbody tr.selected')).data();
			
			$('#contactID').val(data.id);
			$('#contactName').val(data.name);
			$('#contactCompany').val(data.company);
			$('#contactAddress').val(data.address);
			$('#contactCity').val(data.city);
			$('#contactProvince').val(data.province);
			$('#contactCountry').val(data.country);
			$('#contactZip').val(data.zip);
			$('#contactContact').val(data.contact);
			$('#contactPhone').val(data.phone);
			$('#contactEmail').val(data.email);
			
			$('#modSave').modal('show');
		}
		else {
			var n = noty({
				text        : 'Please select',
				type        : 'information',
				dismissQueue: true,
				killer      : true,
				timeout     : 3000,
				layout      : 'bottomRight',
				theme       : 'defaultTheme'
			});
		}
	});
	
	$("#bSubmitSave").click(function(e){
		$.post( "save/contact", {
			"id":  $("#contactID").val(),
			"name":  $("#contactName").val(),
			"company":  $("#contactCompany").val(),
			"address":  $("#contactAddress").val(),
			"city":  $("#contactCity").val(),
			"province":  $("#contactProvince").val(),
			"country":  $("#contactCountry").val(),
			"zip":  $("#contactZip").val(),
			"contact":  $("#contactContact").val(),
			"phone":  $("#contactPhone").val(),
			"email":  $("#contactEmail").val()
		})
		.done(function( result ) {
			var n = noty({
				text        : result,
				type        : 'information',
				dismissQueue: true,
				killer      : true,
				timeout     : 3000,
				layout      : 'bottomRight',
				theme       : 'defaultTheme'
			});
			
			$('#contoh').DataTable().ajax.reload();
			
			$('#modSave').modal('hide');
		});
	});
	
	$("#bDelete").click(function(e){
		if ($('#contoh tbody tr.selected td.dataTables_empty').length) {
			var n = noty({
				text        : 'No data found',
				type        : 'information',
				dismissQueue: true,
				killer      : true,
				timeout     : 3000,
				layout      : 'bottomRight',
				theme       : 'defaultTheme'
			});
		}
		else if ($('#contoh tbody tr.selected').length) {
			$('#modDelete').modal('show');
		}
		else {
			var n = noty({
				text        : 'Please select',
				type        : 'information',
				dismissQueue: true,
				killer      : true,
				timeout     : 3000,
				layout      : 'bottomRight',
				theme       : 'defaultTheme'
			});
		}
	});
	
	$("#bSubmitDelete").click(function(e){
		var data = $('#contoh').DataTable().row($('#contoh tbody tr.selected')).data();
		
		$.post( "delete/contact", {
			"id":  data.id
		})
		.done(function( result ) {
			var n = noty({
				text        : result,
				type        : 'information',
				dismissQueue: true,
				killer      : true,
				timeout     : 3000,
				layout      : 'bottomRight',
				theme       : 'defaultTheme'
			});
			
			$('#contoh').DataTable().ajax.reload();
			
			$('#modDelete').modal('hide');
		});
	});
});
