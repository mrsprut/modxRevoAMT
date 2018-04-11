appMakeBeCool.gateway.addClass('Menu', function(properties, $, $window, $document) {
    //PRIVATE VARIABLES
    var _menu = this,
    _defaults = {
        // elements
        menu: '#touch',
        nav: '#nav'
        // prop
        // data
        // classes ans styles
    },
    _properties = $.extend(_defaults, properties),
    _globals = {
        // elements
        menu: null,
        nav: null,
        // prop
        preloaded: false
    },

    //PRIVATE METHODS
    _init = function() {
        appMakeBeCool.gateway.base.Class.apply(_menu, [_properties]);
        if(!_globals.preloaded) {
            return _menu.init();
        }
        _menu.globals.customCreate = function() {
            _config();
            _setup();
            _setBinds();
            _setCustomMethods();
        };
        _menu.create();
    },

    _config = function() {
        _globals.menu = $(_properties.menu);
        _globals.nav = $(_properties.nav);
    },

    _setup = function() {
        _menuF();
    },
    
    _menuF = function(){
        _globals.menu.click(function(){
            _globals.nav.toggleClass('active');
        });
    },

    _setBinds = function() {},

    _binds = function() {
        return {};
    },

    _triggers = function(){
        return {};
    },

    _setCustomMethods = function() {
        _menu.globals.customResurrect = function() {};
        _menu.globals.customDestroy = function() {};
    };

    //PUBLIC METHODS
    _menu.addMethod('init', function() {
        _menu.bind($window, _menu.globals.classType+'_Init', function(e, data, el) {
            _globals.preloaded = true;
            _init();
        });
    });

    //GO!
    _init();
});