appMakeBeCool.gateway.addClass('PicView', function(properties, $, $window, $document) {
    //PRIVATE VARIABLES
    var _picView = this,
    _defaults = {
        // elements
        picViews: '.picView'
        // prop
        // data
        // classes ans styles
    },
    _properties = $.extend(_defaults, properties),
    _globals = {
        // elements
        picViews: null,
        // prop
        preloaded: false
    },

    //PRIVATE METHODS
    _init = function() {
        appMakeBeCool.gateway.base.Class.apply(_picView, [_properties]);
        if(!_globals.preloaded) {
            return _picView.init();
        }
        _picView.globals.customCreate = function() {
            _config();
            _setup();
            _setBinds();
            _setCustomMethods();
        };
        _picView.create();
    },

    _config = function() {
        _globals.picViews = $(_properties.picViews);
    },

    _setup = function() {
        _globals.picViews.slick({
            dots: true,
            arrows: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
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
        _picView.globals.customResurrect = function() {};
        _picView.globals.customDestroy = function() {};
    };

    //PUBLIC METHODS
    _picView.addMethod('init', function() {
        _picView.bind($window, _picView.globals.classType+'_Init', function(e, data, el) {
            _globals.preloaded = true;
            _init();
        });
    });

    //GO!
    _init();
});