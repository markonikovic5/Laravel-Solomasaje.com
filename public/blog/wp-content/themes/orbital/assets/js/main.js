(function() {
	var pre = document.getElementsByTagName('pre'),
	pl = pre.length;
	for (var i = 0; i < pl; i++) {
		pre[i].innerHTML = '<span class="line-number"></span>' + pre[i].innerHTML;
		var num = pre[i].innerHTML.split(/\n/).length;
		for (var j = 0; j < num; j++) {
			var line_num = pre[i].getElementsByTagName('span')[0];
			line_num.innerHTML += '<span>' + (j + 1) + '</span>';
		}
	}
})();

jQuery(document).ready(function($) {

	moveNavigation();

	$(window).on('resize', function() {
		(!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300): window.requestAnimationFrame(moveNavigation);
	});

	$('.site-trigger, .site-overlay').on('click', function(event) {
		event.preventDefault();
		$('.site-navbar, .site-overlay').toggleClass('active');

	});

	function moveNavigation() {
		var navbar = $('.site-navbar');
		var screenSize = checkWindowWidth();
		if (screenSize) {

			navbar.detach();
			navbar.insertBefore('.site-trigger');
			$('.site-navbar, .site-overlay').removeClass('active');
		} else {

			navbar.detach();
			navbar.insertAfter('.site-main');
			$('.site-navbar, .site-overlay').removeClass('active');
		}
	}

	function checkWindowWidth() {
		var mq = $(window).width();
		return (mq < 1024) ? false : true;
	}

	//SMOOTH SCROLL

	$('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {

		if (
			location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
			location.hostname == this.hostname
			) {

			var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

		if (target.length) {

			event.preventDefault();
			$('html, body').animate({
				scrollTop: target.offset().top
			}, 1000, function() {

				var $target = $(target);
				$target.focus();
				if ($target.is(":focus")) {
					return false;
				} else {
					$target.attr('tabindex', '-1');
					$target.focus();
				};
			});
		}
	}
});

});