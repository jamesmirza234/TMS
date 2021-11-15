(function(){
	var ImageToBase64;
	var source;
	
	ImageToBase64 = function (source) {
		this.source = source;
	}
	
	ImageToBase64.prototype.toDataURL = function() {
		var img = document.getElementById(this.source);
		
		var canvas = document.createElement("canvas");
		
		canvas.width = img.width;
		canvas.height = img.height;

		if (!canvas.getContext)
			throw new Error("Canvas not supported.");

		var ctx = canvas.getContext("2d");
		ctx.drawImage(img, 0, 0);
		
		return canvas.toDataURL("image/jpeg");			
	};
	
	window.ImageToBase64 = ImageToBase64;
})();