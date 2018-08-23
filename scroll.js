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


$(window).scroll(function(){
    function elementScrolled(elem)
    {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemTop = $(elem).offset().top + 30;
        return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
    }
     
    // This is where we use the function to detect if ".box2" is scrolled into view, and when it is add the class ".animated" to the <p> child element
    if(elementScrolled('#home')) {
        $('.cd-stretchy-nav a.active').removeClass('active');
		$('.cd-stretchy-nav ul a[href="#home"]').addClass('active');
    } else if (elementScrolled('#about')) {
        $('.cd-stretchy-nav a.active').removeClass('active');
		$('.cd-stretchy-nav ul a[href="#about"]').addClass('active');
    } else if (elementScrolled('#event-info')) {
        $('.cd-stretchy-nav a.active').removeClass('active');
		$('.cd-stretchy-nav ul a[href="#event-info"]').addClass('active');
    }  else if (elementScrolled('#workshops')) {
        $('.cd-stretchy-nav a.active').removeClass('active');
		$('.cd-stretchy-nav ul a[href="#workshops"]').addClass('active');
    } else if (elementScrolled('#schedule')) {
        $('.cd-stretchy-nav a.active').removeClass('active');
		$('.cd-stretchy-nav ul a[href="#schedule"]').addClass('active');
    } else if (elementScrolled('#speakers')) {
        $('.cd-stretchy-nav a.active').removeClass('active');
		$('.cd-stretchy-nav ul a[href="#speakers"]').addClass('active');
    } else if (elementScrolled('#faq')) {
        $('.cd-stretchy-nav a.active').removeClass('active');
		$('.cd-stretchy-nav ul a[href="#faq"]').addClass('active');
    }else if (elementScrolled('#sponsors')) {
        $('.cd-stretchy-nav a.active').removeClass('active');
		$('.cd-stretchy-nav ul a[href="#sponsors"]').addClass('active');
    } 
});