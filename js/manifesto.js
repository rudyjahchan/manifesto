jQuery(function($) {

function scale_image_down() {
	$img = $(this);
		
	var width = $img.width();
	var height = $img.height();
	
	if (width > 498) {
		var new_width = 498;
		var new_height = (new_width * height) / width;
		
		$img.width(new_width);
		$img.height(new_height);
	}
}

$('.hentry img')
	.one("load",scale_image_down)
	.each(function(){
		if(this.complete || (jQuery.browser.msie && parseInt(jQuery.browser.version) == 6)) {
			$(this).trigger("load");
		}
	});

});