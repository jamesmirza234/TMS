$(function ($) {
    "use strict";
	
	$("#cb_new").click(function(e){
		e.preventDefault();
		
		$("#main_id").val("0");
		$("#main_nama").val("");
		
		$("#main_modal").modal("show");
	});
	
	$("#cb_edit").click(function(e){
		e.preventDefault();
		
		var row = $("#main_datagrid").datagrid("getSelected");
		
		if (row) {
			$("#main_id").val(row.id);
			$("#main_nama").val(row.nama);
		
			$("#main_modal").modal("show");
		}
		else {
			alert ('Please select item');
		}
	});
	
	$("#cb_save").click(function(e){
		e.preventDefault();
		
		$.post("save.php?data=status", {
			id   : $("#main_id").val(),
			nama : $("#main_nama").val()
		}, function (result) {
			$("#main_datagrid").datagrid("reload");
			
			alert (result);
			
			$("#main_modal").modal("hide");
		});
	});
});
