$(function ($) {
    "use strict";
	
	$.ajaxSetup( { type: "post" } );
	
	$('#contoh').dataTable({ "scrollY": "320px", "scrollCollapse": true, "paging": false });
	
	$("#shipmentDate").datepicker({dateFormat: 'yy-mm-dd'});
	
	$("#shipmentCustomer").autocomplete({
		source: "autocomplete/customer",
		minLength: 0,
		select: function( event, ui ) {
		}
	});
	
	$("#shipmentOrigin").autocomplete({
		source: "autocomplete/contact",
		type: "post",
		minLength: 0,
		select: function( event, ui ) {
			$('#shipmentOriginCompany').val(ui.item ? ui.item.company : '');
			$('#shipmentOriginAddress').val(ui.item ? ui.item.address : '');
			$('#shipmentOriginCity').val(ui.item ? ui.item.city : '');
			$('#shipmentOriginProvince').val(ui.item ? ui.item.province : '');
			$('#shipmentOriginCountry').val(ui.item ? ui.item.country : '');
			$('#shipmentOriginZip').val(ui.item ? ui.item.zip : '');
			$('#shipmentOriginContact').val(ui.item ? ui.item.contact : '');
			$('#shipmentOriginPhone').val(ui.item ? ui.item.phone : '');
			$('#shipmentOriginEmail').val(ui.item ? ui.item.email : '');
		}
	});
	
	$("#shipmentDestination").autocomplete({
		source: "autocomplete/contact",
		minLength: 0,
		select: function( event, ui ) {
			$('#shipmentDestinationCompany').val(ui.item ? ui.item.company : '');
			$('#shipmentDestinationAddress').val(ui.item ? ui.item.address : '');
			$('#shipmentDestinationCity').val(ui.item ? ui.item.city : '');
			$('#shipmentDestinationProvince').val(ui.item ? ui.item.province : '');
			$('#shipmentDestinationCountry').val(ui.item ? ui.item.country : '');
			$('#shipmentDestinationZip').val(ui.item ? ui.item.zip : '');
			$('#shipmentDestinationContact').val(ui.item ? ui.item.contact : '');
			$('#shipmentDestinationPhone').val(ui.item ? ui.item.phone : '');
			$('#shipmentDestinationEmail').val(ui.item ? ui.item.email : '');
		}
	});
	
	$("#shipmentService").autocomplete({
		source: "autocomplete/services",
		minLength: 0,
		select: function( event, ui ) {
		}
	});
	
	$("#shipmentItem").autocomplete({
		source: "autocomplete/items",
		minLength: 0,
		select: function( event, ui ) {
			var panjang = ui.item ? ui.item.length : 0;
			var lebar = ui.item ? ui.item.width : 0;
			var tinggi = ui.item ? ui.item.height : 0;
			var berat = ui.item ? ui.item.weight : 0;
			
			var v = panjang * lebar * tinggi;
			var vw = Math.ceil(v / 6000);
			var cw = vw > berat ? vw : berat;
		
			$('#shipmentItemLength').val(panjang);
			$('#shipmentItemWidth').val(lebar);
			$('#shipmentItemHeight').val(tinggi);
			$('#shipmentItemWeight').val(berat);
			$('#shipmentItemVolumeWeight').val(vw);
			$('#shipmentItemChargeable').val(cw);
			$('#shipmentItemVolume').val(v);
		}
	});
	
	$("#bAddItems").click(function(e){
		for (var i=0; i<$('#shipmentItemQuantity').val(); i++) {
			$('#contoh').DataTable().row.add([
				$('#shipmentItem').val(),
				$('#shipmentItemLength').val(),
				$('#shipmentItemWidth').val(),
				$('#shipmentItemHeight').val(),
				$('#shipmentItemWeight').val(),
				$('#shipmentItemVolumeWeight').val(),
				$('#shipmentItemChargeable').val(),
				$('#shipmentItemVolume').val()
			]);
		}
		
		$('#contoh').DataTable().draw();
	});
	
	$("#bSave").click(function(e){
		var origin = {
			"name": $("#shipmentOrigin").val(),
			"company": $("#shipmentOriginCompany").val(),
			"address": $("#shipmentOriginAddress").val(),
			"city": $("#shipmentOriginCity").val(),
			"province": $("#shipmentOriginProvince").val(),
			"country": $("#shipmentOriginCountry").val(),
			"zip": $("#shipmentOriginZip").val(),
			"contact": $("#shipmentOriginContact").val(),
			"phone": $("#shipmentOriginPhone").val(),
			"email": $("#shipmentOriginEmail").val()
		};
		
		var destination = {
			"name": $("#shipmentDestination").val(),
			"company": $("#shipmentDestinationCompany").val(),
			"address": $("#shipmentDestinationAddress").val(),
			"city": $("#shipmentDestinationCity").val(),
			"province": $("#shipmentDestinationProvince").val(),
			"country": $("#shipmentDestinationCountry").val(),
			"zip": $("#shipmentDestinationZip").val(),
			"contact": $("#shipmentDestinationContact").val(),
			"phone": $("#shipmentDestinationPhone").val(),
			"email": $("#shipmentDestinationEmail").val()
		};
		
		var items = $('#contoh').DataTable().rows().data();
		var itemData = [];
		
		for(var i=0; i<items.length; i++ ) {
			var item = $('#contoh').DataTable().row(i).data();
			
			itemData.push({
				"name": item[0],
				"l": item[1],
				"w": item[2],
				"h": item[3],
				"aw": item[4]
			});
		}
		
		$.post( "save/create_shipement", {
			"pickup":  $("#shipmentDate").val(),
			"customer":  $("#shipmentCustomer").val(),
			"description":  $("#shipmentDescription").val(),
			"origin":  JSON.stringify(origin),
			"destination":  JSON.stringify(destination),
			"service":  $("#shipmentService").val(),
			"items":  JSON.stringify(itemData),
			"note":  $("#shipmentNote").val()
		})
		.done(function( result ) {
			alert (result);
			
			resetAll();
		});
	});
	
	function resetAll() {
		$("#shipmentDate").datepicker('setDate', new Date());
		$("#shipmentDescription").val("");
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
		$("#shipmentItem").val("");
		$("#shipmentItemQuantity").val("1");
		$("#shipmentItemLength").val("0");
		$("#shipmentItemWidth").val("0");
		$("#shipmentItemHeight").val("0");
		$("#shipmentItemWeight").val("0");
		$("#shipmentItemVolumeWeight").val("0");
		$("#shipmentItemChargeable").val("0");
		$("#shipmentItemVolume").val("0");
		$("#shipmentNote").val("");
		
		$('#contoh').DataTable().rows().remove().draw();
		
		$("#shipmentCustomer").focus();
	}
	
	resetAll();
});
