// Trigger class name on load
window.onload = function() {
  document.body.className += ' loaded'
};

$(document).ready(function () {
	var $nav = $('#navigation'),
    	posTop = $nav.position().top;
	$(window).scroll(function () {
		var y = $(this).scrollTop();
    	if (y > posTop) {
    		$nav.addClass('fixed');
    	}
    	else {
    		$nav.removeClass('fixed');
    	}
	});
});

