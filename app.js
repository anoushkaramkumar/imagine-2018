var ua = navigator.userAgent.toLowerCase(); 
if (ua.indexOf('chrome') == -1 && /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream && ua.indexOf('safari') != -1 && !(/CriOS/i.test(navigator.userAgent))) { 
  	$('body, html').addClass('safari');
}

function addEmail() {
	var email = document.getElementById('email').value;

	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (re.test(email)) {
		$.ajax({
	        url: 'index.php',
	        type: 'GET',
	        data: 'email=' + email,

	        success: function(result) {
	           	$('#email').hide();
	           	$('.error').hide();
	           	$('.btn-success').hide();
			    $('.success').show();
	        }
	    });
	} else {
		$('.error').show();
	}  
}

$('html').mousemove(function(e){		
	var wx = $(window).width();
	var wy = $(window).height();
	
	var x = e.pageX - this.offsetLeft;
	var y = e.pageY - this.offsetTop;
	
	var newx = x - wx/2;
	var newy = y - wy/2;
		
	$('#wrapper div').each(function(){
		var speed = $(this).attr('data-speed');
		if($(this).attr('data-revert')) speed *= -1;
		TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
		
	});
	
});

window.sr = ScrollReveal();

sr.reveal('.cometbg', { 
	duration: 3000,
	delay: 0,
	rotate: { x: 30, y: 30, z: 30 },
	scale: 0.7,
	}
);

particlesJS.load('particles-js', '/assets/particlesjs-config.json', function() {
  console.log('callback - particles.js config loaded');
});

$(".owl-carousel").owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});

// document.querySelector("#myCard").classList.toggle("flip")