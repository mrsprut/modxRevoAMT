appMakeBeCool.gateway.addClass('WindowHeight', function(properties, $, $window, $document) {
    //PRIVATE VARIABLES
    var _windowHeight = this,
    _defaults = {
        // elements
        // prop
        // data
        // classes ans styles
    },
    _properties = $.extend(_defaults, properties),
    _globals = {
        // elements

        // prop
        preloaded: false
    },

    //PRIVATE METHODS
    _init = function() {
        appMakeBeCool.gateway.base.Class.apply(_windowHeight, [_properties]);
        if(!_globals.preloaded) {
            return _windowHeight.init();
        }
        _windowHeight.globals.customCreate = function() {
            _config();
            _setup();
            _setBinds();
            _setCustomMethods();
        };
        _windowHeight.create();
    },

    _config = function() {},

    _setup = function() {
        _windowHeightF();
    },
    
    _windowHeightF = function(){
        var _wh = document.documentElement;
        return self.innerHeight || (_wh && _wh.clientHeight) || document.body.clientHeight;
    },

    _setBinds = function() {},

    _binds = function() {
        return {};
    },

    _triggers = function(){
        return {};
    },

    _setCustomMethods = function() {
        _windowHeight.globals.customResurrect = function() {};
        _windowHeight.globals.customDestroy = function() {};
    };

    //PUBLIC METHODS
    _windowHeight.addMethod('init', function() {
        _windowHeight.bind($window, _windowHeight.globals.classType+'_Init', function(e, data, el) {
            _globals.preloaded = true;
            _init();
        });
    });

    //GO!
    _init();
});