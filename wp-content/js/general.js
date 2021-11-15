$(function ($) {
    "use strict";
	
	$("#bChangePasswd").click(function(e){
		e.preventDefault();
		
		$("#password0").val("");
		$("#password1").val("");
		$("#password2").val("");
		
		$("#modChangePasswd").modal("show");
	});
	
	$("#bSubmitPassword").click(function(e){
		e.preventDefault();
		
		$.post("save/change_password", {
			password0: $("#password0").val(),
			password1: $("#password1").val(),
			password2: $("#password2").val()
		}, function (result) {
			var n = noty({
				text        : result,
				type        : 'information',
				dismissQueue: true,
				killer      : true,
				timeout     : 3000,
				layout      : 'bottomRight',
				theme       : 'defaultTheme'
			});
			
			$("#modChangePasswd").modal("hide");
		});
	});
});
