
$(document).ready(function() {
    
    //js for bottom btn to scroll top
    $('#totop').on('click', function () { 
        $('body, html').animate({
            scrollTop: 0
        }, 1000);
    });

    //scroll to top //
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.totop').fadeIn();
        } 
        else {
            $('.totop').fadeOut();
        }
    });

    $('.totop').click(function(){
        $('html, body').animate({scrollTop : 0},1000);
        return false;
    });
    //scroll to top  ends //

    //sticky header js
    $(window).scroll(function() {    
		var scroll = $(window).scrollTop();
		if (scroll > 50) {
		    $("#header").addClass("sticky-header");
		} else {
		    $("#header").removeClass("sticky-header");
        }
    });

    //run animation in desktop view only
    if($(window).width() >= 1024){
        ros.init();
    }
    //header bg color based on home page js
    if(document.URL.indexOf("index.php") >= 0){ 
        $('header .navbar-default').css('background','transparent');
        console.log('index pahe')
    }

    
// Smooth scrool 
// Select all links with hashes
    $('.navbar-nav a[href*="#"],.ticket_link a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
        // On-page links
        if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
        ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
            scrollTop: target.offset().top
            }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
                return false;
            } else {
                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
            };
            });
        }
        }
    });

});