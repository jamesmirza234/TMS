$(function ($) {
    "use strict";
	
	$('#contoh').dataTable({
		"processing": true,
		"serverSide": true,
		"scrollX": true,
		"ajax": {
			"url": "data/view_shipment",
			"type": "POST"
		},
		"order": [[ 0, "desc" ]],
		"columns": [
			{ "data": "id", "visible": false },
			{ "data": "customer" },
			{ "data": "shipment" },
			{ "data": "description" },
			{ "data": "status" },
			{ "data": "origin" },
			{ "data": "now_at" },
			{ "data": "destination" },
			{ "data": "collie" },
			{ "data": "weight" }
		]
	});

	$('#parcel').dataTable({ "scrollY": "320px", "scrollCollapse": true, "paging": false });
	
	$('#contoh tbody').on('click', 'tr', function () {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
		}
		else {
			$('#contoh tbody tr.selected').removeClass('selected');
			$(this).addClass('selected');
			
			if ($('#contoh tbody tr.selected td.dataTables_empty').length) {
			}
			else {
				var data = $('#contoh').DataTable().row($('#contoh tbody tr.selected')).data();
			
				$.post( "data/shipment_detail", {
					"id":  data.id
				})
				.done(function( result ) {
					var dc = JSON.parse (result);
					
					$("#shipmentOrigin").val(dc.origin);
					$("#shipmentOriginCompany").val(dc.o_company);
					$("#shipmentOriginAddress").val(dc.o_address);
					$("#shipmentOriginCity").val(dc.o_city);
					$("#shipmentOriginProvince").val(dc.o_province);
					$("#shipmentOriginCountry").val(dc.o_country);
					$("#shipmentOriginZip").val(dc.o_zip);
					$("#shipmentOriginContact").val(dc.o_contact);
					$("#shipmentOriginPhone").val(dc.o_phone);
					$("#shipmentOriginEmail").val(dc.o_email);
					
					$("#shipmentDestination").val(dc.destination);
					$("#shipmentDestinationCompany").val(dc.d_company);
					$("#shipmentDestinationAddress").val(dc.d_address);
					$("#shipmentDestinationCity").val(dc.d_city);
					$("#shipmentDestinationProvince").val(dc.d_province);
					$("#shipmentDestinationCountry").val(dc.d_country);
					$("#shipmentDestinationZip").val(dc.d_zip);
					$("#shipmentDestinationContact").val(dc.d_contact);
					$("#shipmentDestinationPhone").val(dc.d_phone);
					$("#shipmentDestinationEmail").val(dc.d_email);
				});
			
				$.post( "data/shipment_parcel", {
					"id":  data.id
				})
				.done(function( result ) {
					var dc = JSON.parse (result);
					
					$('#parcel').DataTable().rows().remove();
					
					dc.forEach(function (row) {
						$('#parcel').DataTable().row.add([
							row.no,
							row.name
						]);
					});
					
					$('#parcel').DataTable().draw();
				});
			}
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
			
			$('#shipmentNo').val(data.shipment);
			$('#shipmentLocation').val('');
			$('#shipmentStatus').val('');
			
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
	
	$("#bExport").click(function(e){
		var url = 'export/shipment_excel';
		var form = $('<form action="' + url + '" method="post" target="_blank">' +
			'<input type="text" name="search" id="exportSearch" />' +
			'</form>');
		$('body').append(form);
		$("#exportSearch").val(JSON.stringify($('#contoh').DataTable().ajax.params()));
		$(form).submit();
		$(form).remove();
	});
	
	$("#bLabel").click(function(e){
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
			
			var url = 'export/shipment_label';
			var form = $('<form action="' + url + '" method="post" target="_blank">' +
				'<input type="text" name="search" id="exportSearch" />' +
				'</form>');
			$('body').append(form);
			$("#exportSearch").val(data.shipment);
			$(form).submit();
			$(form).remove();
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
	
	$("#bAWB").click(function(e){
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
			
			var url = 'export/shipment_awb';
			var form = $('<form action="' + url + '" method="post" target="_blank">' +
				'<input type="text" name="search" id="exportSearch" />' +
				'</form>');
			$('body').append(form);
			$("#exportSearch").val(data.shipment);
			$(form).submit();
			$(form).remove();
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
	
	$("#bPOD").click(function(e){
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
			
			var url = 'export/shipment_pod';
			var form = $('<form action="' + url + '" method="post" target="_blank">' +
				'<input type="text" name="search" id="exportSearch" />' +
				'</form>');
			$('body').append(form);
			$("#exportSearch").val(data.shipment);
			$(form).submit();
			$(form).remove();
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
		$.post( "save/view_shipment", {
			"shipment":  $("#shipmentNo").val(),
			"location":  $("#shipmentLocation").val(),
			"status":  $("#shipmentStatus").val()
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
			
			resetAll();
			
			$('#modSave').modal('hide');
		});
	});
	
	function resetAll() {
		$("#shipmentOrigin").val("");
		$("#shipmentOriginCompany").val("");
		$("#shipmentOriginAddress").val("");
		$("#shipmentOriginCity").val("");
		$("#shipmentOriginProvince").val("");
		$("#shipmentOriginCountry").val("");
		$("#shipmentOriginZip").val("");
		$("#shipmentOriginContact").val("");
		$("#shipmentOriginPhone").val("");
		$("#shipmentOriginEmail").val("");
		
		$("#shipmentDestination").val("");
		$("#shipmentDestinationCompany").val("");
		$("#shipmentDestinationAddress").val("");
		$("#shipmentDestinationCity").val("");
		$("#shipmentDestinationProvince").val("");
		$("#shipmentDestinationCountry").val("");
		$("#shipmentDestinationZip").val("");
		$("#shipmentDestinationContact").val("");
		$("#shipmentDestinationPhone").val("");
		$("#shipmentDestinationEmail").val("");
		
		$('#parcel').DataTable().rows().remove().draw();
	}
	
	resetAll();
});
