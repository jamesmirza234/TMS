$(function ($) {
    "use strict";
	
	$('#contoh').dataTable({
		"processing": true,
		"serverSide": true,
		"scrollX": true,
		"ajax": {
			"url": "data/customer",
			"type": "POST"
		},
		"order": [[ 0, "desc" ]],
		"columns": [
			{ "data": "id", "visible": false },
			{ "data": "name" },
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
		
		$('#dtUser').DataTable().rows().remove().draw();
		
		if ($('#contoh tbody tr.selected td.dataTables_empty').length) {
		}
		else if ($('#contoh tbody tr.selected').length) {
			var data = $('#contoh').DataTable().row($('#contoh tbody tr.selected')).data();
			
			$.post( "data/user_customer", {
				"id":  data.id,
			})
			.done(function( result ) {
				var sh = JSON.parse (result);
				
				sh.forEach(function (row) {
					$('#dtUser').DataTable().row.add([
						row.id,
						row.customer,
						row.user
					]);
				});
				
				$('#dtUser').DataTable().draw();
			});
		}
	});
	
	$('#dtUser').dataTable({ 
		"scrollY": "320px", 
		"scrollCollapse": true, 
		"paging": false,
		"columns": [
			{ "visible": false },
			{ },
			{ }
		]
	});
	
	$('#dtUser tbody').on('click', 'tr', function () {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
		}
		else {
			$('#dtUser tbody tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
	
	$("#bSave").click(function(e){
		$('#customerID').val("");
		$('#customerName').val("");
		$('#customerAddress').val("");
		$('#customerCity').val("");
		$('#customerProvince').val("");
		$('#customerCountry').val("");
		$('#customerZip').val("");
		$('#customerContact').val("");
		$('#customerPhone').val("");
		$('#customerEmail').val("");
		
		$('#modSave').modal('show');
	});
	
	$("#bUserSave").click(function(e){
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
			
			$('#newUserName').val("");
			$('#newUserPassword').val("");
			
			$('#modNewUser').modal('show');
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
	
	$("#bSubmitUserNew").click(function(e){
		var data = $('#contoh').DataTable().row($('#contoh tbody tr.selected')).data();
				
		$.post( "save/user_new", {
			"id":  data.id,
			"username":  $("#newUserName").val(),
			"password":  $("#newUserPassword").val()
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
			
			$('#dtUser').DataTable().rows().remove().draw();
			
			$.post( "data/user_customer", {
				"id":  data.id,
			})
			.done(function( result ) {
				var sh = JSON.parse (result);
				
				sh.forEach(function (row) {
					$('#dtUser').DataTable().row.add([
						row.id,
						row.customer,
						row.user
					]);
				});
				
				$('#dtUser').DataTable().draw();
			});
			
			$('#modNewUser').modal('hide');
		});
	});
	
	$("#bUserEdit").click(function(e){
		if ($('#dtUser tbody tr.selected td.dataTables_empty').length) {
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
		else if ($('#dtUser tbody tr.selected').length) {
			var data = $('#dtUser').DataTable().row($('#dtUser tbody tr.selected')).data();
			
			$('#modUserPasswd').modal('show');
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
			
			$('#customerID').val(data.id);
			$('#customerName').val(data.name);
			$('#customerAddress').val(data.address);
			$('#customerCity').val(data.city);
			$('#customerProvince').val(data.province);
			$('#customerCountry').val(data.country);
			$('#customerZip').val(data.zip);
			$('#customerContact').val(data.contact);
			$('#customerPhone').val(data.phone);
			$('#customerEmail').val(data.email);
			
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
		$.post( "save/customer", {
			"id":  $("#customerID").val(),
			"name":  $("#customerName").val(),
			"address":  $("#customerAddress").val(),
			"city":  $("#customerCity").val(),
			"province":  $("#customerProvince").val(),
			"country":  $("#customerCountry").val(),
			"zip":  $("#customerZip").val(),
			"contact":  $("#customerContact").val(),
			"phone":  $("#customerPhone").val(),
			"email":  $("#customerEmail").val()
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
		
		$.post( "delete/customer", {
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
