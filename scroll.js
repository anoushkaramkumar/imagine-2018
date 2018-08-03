$(document).ready(function() {
		if(window.location.href.indexOf("#") > -1) {
			var ind = window.location.href.indexOf("#");
			var section = window.location.href.substring(ind);
	       	$('.cd-stretchy-nav a.active').removeClass('active');
	       	var s = '.cd-stretchy-nav a[href="'+section+'"]';
			$(s).addClass('active');
	    }

		$('.cd-stretchy-nav ul a[href^="#"]').bind('click', function(e) {
				var target = $(this).attr("href"); // Set the target as variable

				e.preventDefault(); // prevent hard jump, the default behavior
				// perform animated scrolling by getting top-position of target-element and set it as scroll target
				$('html, body').stop().animate({
						scrollTop: $(target).offset().top
				}, 600, function() {
						location.hash = target; //attach the hash (#jumptarget) to the pageurl
				});

				$('.cd-stretchy-nav a.active').removeClass('active');
				$(this).addClass('active');

				return false;
		});
});
