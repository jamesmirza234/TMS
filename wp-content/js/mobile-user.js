$(function ($) {
    "use strict";
	
	$('#contoh').dataTable({
		"processing": true,
		"serverSide": true,
		"scrollX": true,
		"ajax": {
			"url": "data/mobile_user",
			"type": "POST"
		},
		"order": [[ 0, "desc" ]],
		"columns": [
			{ "data": "id", "visible": false },
			{ "data": "username" },
			{ "data": "active" },
			{ "data": "name" },
			{ "data": "imei" },
			{ "data": "hp" },
			{ "data": "key" },
			{ "data": "lat", "visible": false },
			{ "data": "lon", "visible": false },
			{ "data": "acc", "visible": false },
			{ "data": "level", "visible": false },
			{ "data": "connect", "visible": false }
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
			
			$('#mobileID').val(data.id);
			$('#mobileUsername').val(data.username);
			$('#mobileActive').val(data.active);
			$('#mobileName').val(data.name);
			$('#mobileImei').val(data.imei);
			$('#mobileHp').val(data.hp);
			$('#mobileKey').val(data.key);
			$('#mobileLat').val(data.lat);
			$('#mobileLon').val(data.lon);
			$('#mobileAcc').val(data.acc);
			$('#mobileLevel').val(data.level);
			$("#mobileConnect").prop("checked", Boolean(parseInt(data.connect)));
			
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
	
	$("#bGenerate").click(function(e){
		$.post( "save/generate_key", {
			"id":  $("#mobileID").val()
		})
		.done(function( result ) {
			$('#mobileKey').val(result);
		});
	});
	
	$("#bSubmitSave").click(function(e){
		$.post( "save/mobile_user", {
			"id":  $("#mobileID").val(),
			"level":  $('#mobileLevel').val(),
			"connect":  $("#mobileConnect").is(':checked')
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
});
