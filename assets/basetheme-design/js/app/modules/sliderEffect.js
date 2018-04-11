appMakeBeCool.gateway.addClass('SliderEffect', function(properties, $, $window, $document) {
    //PRIVATE VARIABLES
    var _sliderEffect = this,
    _defaults = {
        // elements
        window: window,
        htmlBody: 'html, body',
        header: '#header',
        production: '#production',
        picture: '#picture',
        contentHeading: '#content-heading',
        moreBtn: '#more-btn'
        // prop
        // data
        // classes ans styles
    },
    _properties = $.extend(_defaults, properties),
    _globals = {
        // elements
        window: null,
        htmlBody: null,
        header: null,
        production: null,
        picture: null,
        contentHeading: null,
        moreBtn: null,
        // prop
        preloaded: false
    },

    //PRIVATE METHODS
    _init = function() {
        appMakeBeCool.gateway.base.Class.apply(_sliderEffect, [_properties]);
        if(!_globals.preloaded) {
            return _sliderEffect.init();
        }
        _sliderEffect.globals.customCreate = function() {
            _config();
            _setup();
            _setBinds();
            _setCustomMethods();
        };
        _sliderEffect.create();
    },

    _config = function() {
        _globals.window = $(_properties.window);
        _globals.htmlBody = $(_properties.htmlBody);
        _globals.header = $(_properties.header);
        _globals.production = $(_properties.production);
        _globals.picture = $(_properties.picture);
        _globals.contentHeading = $(_properties.contentHeading);
        _globals.moreBtn = $(_properties.moreBtn);
    },

    _setup = function() {
        //_mainSlidingF();
        _setHeadingHeightF();
        _sliderEffectF();
        _globals.window.resize(function() {
            //_mainSlidingF();
            _setHeadingHeightF();
            _sliderEffectF();
        });
    },
    
    //Set slide height Desctop
    _setDesctopSlideHeightF = function(){
        _globals.header.height(_globals.window.height());
        _globals.picture.height(_globals.window.height());
    },
    
    //Set slide height Mobile
    _setMobileSlideHeightF = function(){
        _globals.header.height(_globals.window.height());
        _globals.picture.height(_globals.window.height() / 2);
    },
    
    _sliderEffectF = function(){
        if (_globals.window.width() > 1280) {

            if (_globals.window.scrollTop() <= _globals.window.height()) {
                _globals.htmlBody.stop().animate({
                    scrollTop: 0
                }, 400);
            } else {
                _globals.header.stop().animate({
                    'top': -_globals.window.height()
                }, 1000);
                _globals.production.addClass('active');
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
                _globals.header.stop().animate({
                    'top': -_globals.window.height()
                }, 1000);
                _globals.production.addClass('active');
                setTimeout(function() {
                    _globals.htmlBody.stop().animate({
                        scrollTop: _globals.window.height() / 2
                    }, 700);
                }, 600);

            }

            //Up animations
            function slideUp() {
                setTimeout(function() {
                    _globals.header.stop().animate({
                        'top': 0
                    }, 1000);
                }, 500);
                _globals.production.removeClass('active');
                _globals.htmlBody.stop().animate({
                    scrollTop: 0
                }, 700);
            }

            //Go sliding on btn click
            _globals.moreBtn.click(function() {
                slideDown();
            });

            //Needed functions
            _setDesctopSlideHeightF();

            //Scroll event bind
            _globals.window.bind('DOMMouseScroll mousewheel', function(event) {
                var scrollDir = detectScrollDir(event);
                if (_globals.window.scrollTop() < _globals.window.height() / 2 - 10 && scrollDir === 'Down') {
                    slideDown();
                    return false;
                } else if (_globals.window.scrollTop() < _globals.window.height() / 2 && scrollDir === 'Up') {
                    slideUp();
                    return false;
                }
            });

            //Set resize bind
            _globals.window.resize(function() {
                _setDesctopSlideHeightF();
            });
        } else if (_globals.window.width() <= 1280) {

            //Go sliding on btn click
            _globals.moreBtn.click(function() {
                _globals.htmlBody.animate({
                    scrollTop: _globals.window.height()
                }, 700);
            });

            //Needed functions
            _setMobileSlideHeightF();
        }
    },
    
    /*
    _mainSlidingF = function(){
        _globals.header.height(_globals.window.height());
        _globals.picture.css('padding', 0);
        _globals.picture.height(_globals.window.height()/2);
    },
    */
    _setHeadingHeightF = function(){
        _globals.contentHeading.height(_globals.window.height()/2);
    },

    _setBinds = function() {},

    _binds = function() {
        return {};
    },

    _triggers = function(){
        return {};
    },

    _setCustomMethods = function() {
        _sliderEffect.globals.customResurrect = function() {};
        _sliderEffect.globals.customDestroy = function() {};
    };

    //PUBLIC METHODS
    _sliderEffect.addMethod('init', function() {
        _sliderEffect.bind($window, _sliderEffect.globals.classType+'_Init', function(e, data, el) {
            _globals.preloaded = true;
            _init();
        });
    });

    //GO!
    _init();
});