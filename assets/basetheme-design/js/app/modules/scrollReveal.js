appMakeBeCool.gateway.addClass('ScrollReveal', function(properties, $, $window, $document) {
    //PRIVATE VARIABLES
    var _scrollReveal = this,
    _defaults = {
        // elements
        window: window
        // prop
        // data
        // classes ans styles
    },
    _properties = $.extend(_defaults, properties),
    _globals = {
        // elements
        window: null,
        // prop
        preloaded: false
    },

    //PRIVATE METHODS
    _init = function() {
        appMakeBeCool.gateway.base.Class.apply(_scrollReveal, [_properties]);
        if(!_globals.preloaded) {
            return _scrollReveal.init();
        }
        _scrollReveal.globals.customCreate = function() {
            _config();
            _setup();
            _setBinds();
            _setCustomMethods();
        };
        _scrollReveal.create();
    },

    _config = function() {
        _globals.window = $(_properties.window);
    },

    _setup = function() {
        //Section effects
        if (_globals.window.width() > 1280) {
            _globals.window.sr = new scrollReveal({
                vFactor: 0.1,
                mobile: true,
                scale: {
                    direction: 'up',
                    power: '0%'
                }
            });
        }
    },

    _setBinds = function() {},

    _binds = function() {
        return {};
    },

    _triggers = function(){
        return {};
    },

    _setCustomMethods = function() {
        _scrollReveal.globals.customResurrect = function() {};
        _scrollReveal.globals.customDestroy = function() {};
    };

    //PUBLIC METHODS
    _scrollReveal.addMethod('init', function() {
        _scrollReveal.bind($window, _scrollReveal.globals.classType+'_Init', function(e, data, el) {
            _globals.preloaded = true;
            _init();
        });
    });

    //GO!
    _init();
});