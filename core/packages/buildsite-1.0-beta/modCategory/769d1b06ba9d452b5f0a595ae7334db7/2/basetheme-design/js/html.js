function windowHeight() {
    var wh = document.documentElement;
    return self.innerHeight || (wh && wh.clientHeight) || document.body.clientHeight;

}

$(document).ready(function() {
    var h = windowHeight();
    // $('#header').css('height', h + 'px');
    // $('.picture').css('height', h/2 + 'px');
    // $('.production').css('padding-top', h / 2 + 'px');

    $('.picView').slick({
        dots: true,
        arrows: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
    });



    //Custom
    var $window = $(window);
    var $htmlBody = $('html, body');
    var $header = $('#header');
    var $production = $('#production');
    var $contentHeading = $('#content-heading');
    var $picture = $('#picture');
    var $moreBtn = $('#more-btn');
    var $menu = $('#touch');
    var $nav = $('#nav');

    //Set slide height
    function setDesctopSlideHeight() {
        $header.height($window.height());
        $picture.height($window.height());
    }

    //Set slide height
    function setMobileSlideHeight() {
        $header.height($window.height());
        $picture.height($window.height() / 2);
    }

    //Slider effect
    function sliderEffect() {
        if ($window.width() > 1280) {

            if ($window.scrollTop() <= $window.height()) {
                $htmlBody.stop().animate({
                    scrollTop: 0
                }, 400);
            } else {
                $header.stop().animate({
                    'top': -$window.height()
                }, 1000);
                $production.addClass('active');
            }

            //Detect scroll directions
            function detectScrollDir(event) {
                if (event.originalEvent.detail > 0 || event.originalEvent.wheelDelta < 0) {
                    return 'Down';
                } else {
                    return 'Up';
                }
            }

            //Down animation
            function slideDown() {
                $header.stop().animate({
                    'top': -$window.height()
                }, 1000);
                $production.addClass('active');
                setTimeout(function() {
                    $htmlBody.stop().animate({
                        scrollTop: $window.height() / 2
                    }, 700);
                }, 600);

            }

            //Up animations
            function slideUp() {
                setTimeout(function() {
                    $header.stop().animate({
                        'top': 0
                    }, 1000);
                }, 500);
                $production.removeClass('active');
                $htmlBody.stop().animate({
                    scrollTop: 0
                }, 700);
            }

            //Go sliding on btn click
            $('#more-btn').click(function() {
                slideDown();
            });

            //Needed functions
            setDesctopSlideHeight();

            //Scroll event bind
            $window.bind('DOMMouseScroll mousewheel', function(event) {
                var scrollDir = detectScrollDir(event);
                if ($window.scrollTop() < $window.height() / 2 - 10 && scrollDir === 'Down') {
                    slideDown();
                    return false;
                } else if ($window.scrollTop() < $window.height() / 2 && scrollDir === 'Up') {
                    slideUp();
                    return false;
                }
            });

            //Set resize bind
            $window.resize(function() {
                setDesctopSlideHeight();
            });
        } else if ($window.width() <= 1280) {

            //Go sliding on btn click
            $moreBtn.click(function() {
                $htmlBody.animate({
                    scrollTop: $window.height()
                }, 700);
            });

            //Needed functions
            setMobileSlideHeight();
        }
    }


    //Section effects
    if ($window.width() > 1280) {
        window.sr = new scrollReveal({
            vFactor: 0.1,
            mobile: true,
            scale: {
                direction: 'up',
                power: '0%'
            }
        });
    }

    //Content heading height
    function setHeadingHeight() {
        $contentHeading.height($window.height() / 2);
    }

    //Tooltip plugin
    if ($('.tooltip').length) {
        $('.tooltip').tooltipster({
            animation: "fade",
            theme: ".tooltipster-default",
            touchDevices: true,
            trigger: "click",
            interactive: true,
            position: "top",
            maxWidth: 380,
            minWidth: 300,
            offsetY: 20
        });
    }


    function menu(){
        $menu.click(function(){
            $nav.toggleClass('active');
        });
    }

    //Needed functions
    setHeadingHeight();
    sliderEffect();
    menu();

    //Set resize bind
    $window.resize(function() {
        setHeadingHeight();
        sliderEffect();
    });
});
