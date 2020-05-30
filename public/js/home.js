$(document).ready(function() {
	$(window).bind('scroll', function(event) {
		var pos = window.scrollY;
		if(pos > 80){
			$('#header').addClass('hienpost');
		}
		else{
			$('#header').removeClass('hienpost');
		}
	});
});
