$(document).ready(function(){
	$("div.img-copyright").hide();
	
	$("div.image-src").hover(
		function(){
			$("div.img-copyright").finish();
			$("div.img-copyright").fadeIn(1000);
		},
		function(){
			$("div.img-copyright").finish();
			$("div.img-copyright").fadeOut(1000);
		}
	);
});