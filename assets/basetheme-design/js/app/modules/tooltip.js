appMakeBeCool.gateway.addClass('Tooltip', function(properties, $, $window, $document) {
    //PRIVATE VARIABLES
    var _tooltip = this,
    _defaults = {
        // elements
        tooltip: '.tooltip'
        // prop
        // data
        // classes ans styles
    },
    _properties = $.extend(_defaults, properties),
    _globals = {
        // elements
        tooltip: null,
        // prop
        preloaded: false
    },

    //PRIVATE METHODS
    _init = function() {
        appMakeBeCool.gateway.base.Class.apply(_tooltip, [_properties]);
        if(!_globals.preloaded) {
            return _tooltip.init();
        }
        _tooltip.globals.customCreate = function() {
            _config();
            _setup();
            _setBinds();
            _setCustomMethods();
        };
        _tooltip.create();
    },

    _config = function() {
        _globals.tooltip = $(_properties.tooltip);
    },

    _setup = function() {
        if (_globals.tooltip.length) {
            _globals.tooltip.tooltipster({
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
    },

    _setBinds = function() {},

    _binds = function() {
        return {};
    },

    _triggers = function(){
        return {};
    },

    _setCustomMethods = function() {
        _tooltip.globals.customResurrect = function() {};
        _tooltip.globals.customDestroy = function() {};
    };

    //PUBLIC METHODS
    _tooltip.addMethod('init', function() {
        _tooltip.bind($window, _tooltip.globals.classType+'_Init', function(e, data, el) {
            _globals.preloaded = true;
            _init();
        });
    });

    //GO!
    _init();
});