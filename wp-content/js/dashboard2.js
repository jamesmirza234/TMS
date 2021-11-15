$(function ($) {
    "use strict";
	
	$('#contoh').dataTable({ "scrollY": "320px", "scrollCollapse": true, "paging": false });
	
	$("#historyDate1").datepicker(
	{
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$("#historyDate2").datepicker( "option", "minDate", selectedDate );
			getHeader();
		}
	});
	
	$("#historyDate2").datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$("#historyDate1").datepicker( "option", "maxDate", selectedDate );
			getHeader();
		}
	});
	
	$("#bSent").click(function(e){
		$('#contoh').DataTable().rows().remove().draw();
		
		$.post( "data/dashboard_detail", {
			"start":  $("#historyDate1").val(),
			"end":  $("#historyDate2").val(),
			"status": "Sent"
		})
		.done(function( result ) {
			var sh = JSON.parse (result);
			
			sh.forEach(function (row) {
				$('#contoh').DataTable().row.add([
					row.shipment,
					row.description,
					row.status,
					row.origin,
					row.now_at,
					row.destination,
					row.collie,
					row.weight
				]);
			});
			
			$('#contoh').DataTable().draw();
		});
	});
	
	$("#bIntransit").click(function(e){
		$('#contoh').DataTable().rows().remove().draw();
		
		$.post( "data/dashboard_detail", {
			"start":  $("#historyDate1").val(),
			"end":  $("#historyDate2").val(),
			"status": "In Transit"
		})
		.done(function( result ) {
			var sh = JSON.parse (result);
			
			sh.forEach(function (row) {
				$('#contoh').DataTable().row.add([
					row.shipment,
					row.description,
					row.status,
					row.origin,
					row.now_at,
					row.destination,
					row.collie,
					row.weight
				]);
			});
			
			$('#contoh').DataTable().draw();
		});
	});
	
	$("#bDelivered").click(function(e){
		$('#contoh').DataTable().rows().remove().draw();
		
		$.post( "data/dashboard_detail", {
			"start":  $("#historyDate1").val(),
			"end":  $("#historyDate2").val(),
			"status": "Delivered"
		})
		.done(function( result ) {
			var sh = JSON.parse (result);
			
			sh.forEach(function (row) {
				$('#contoh').DataTable().row.add([
					row.shipment,
					row.description,
					row.status,
					row.origin,
					row.now_at,
					row.destination,
					row.collie,
					row.weight
				]);
			});
			
			$('#contoh').DataTable().draw();
		});
	});
	
	function resetAll() {
		var d = new Date();
		d.setDate(d.getDate() - 30);
		$("#historyDate1").datepicker('setDate', d);
		$("#historyDate1").datepicker("option", "maxDate", new Date());
		$("#historyDate2").datepicker('setDate', new Date());
		$("#historyDate2").datepicker("option", "minDate", d);
		
		$('#contoh').DataTable().rows().remove().draw();
		
		getHeader();
	}
	
	function getHeader() {
		$.post( "data/dashboard_header", {
			"start":  $("#historyDate1").val(),
			"end":  $("#historyDate2").val()
		})
		.done(function( result ) {
			var sh = JSON.parse (result);
			
			$("#tSent").html(sh.sent);
			$("#tIntransit").html(sh.intransit);
			$("#tDelivered").html(sh.delivered);
		});
	}
	
	resetAll();
});
