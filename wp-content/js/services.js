$(function ($) {
    "use strict";
	
	$('#contoh').dataTable({
		"processing": true,
		"serverSide": true,
		"scrollX": true,
		"ajax": {
			"url": "data/services",
			"type": "POST"
		},
		"order": [[ 0, "desc" ]],
		"columns": [
			{ "data": "id", "visible": false },
			{ "data": "name" }
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
		$('#serviceID').val("");
		$('#serviceName').val("");
		
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
			
			$('#serviceID').val(data.id);
			$('#serviceName').val(data.name);
			
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
		$.post( "save/services", {
			"id":  $("#serviceID").val(),
			"name":  $("#serviceName").val()
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
		
		$.post( "delete/services", {
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
