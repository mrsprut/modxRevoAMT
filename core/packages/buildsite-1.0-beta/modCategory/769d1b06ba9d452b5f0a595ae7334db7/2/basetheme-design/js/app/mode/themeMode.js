appMakeBeCool.gateway.addClass('ThemeMode', function(properties, $, $window, $document) {
	//PRIVATE VARIABLES
	var _themeMode = this,
	_defaults = {
        // classes ans styles
        classMode: 'theme-mode'
    },
	_properties = $.extend(_defaults, properties),
	_globals = {
		siteObj: null,
		preloaded: false
    },

	//PRIVATE METHODS
	_init = function() {
        appMakeBeCool.gateway.classes.SiteMode.apply(_themeMode, [_properties])
        if(!_globals.preloaded) {
            return _themeMode.init();
        }
        _config();
        _extendClasses();
        _instantiateClasses();
        _setup();
        _setBinds();
        _setCustomMethods();
        _themeMode.trigger(_themeMode.globals.classType+'_Complete');
    },

    _config = function() {
        _globals.siteObj = _themeMode.getSiteObj();
    },

    _extendClasses = function() {
        _globals.siteObj.utils.extend(_globals.siteObj.classes.PicView, _globals.siteObj.base.Class);
        //_globals.siteObj.utils.extend(_globals.siteObj.classes.WindowResize, _globals.siteObj.base.Class);
        _globals.siteObj.utils.extend(_globals.siteObj.classes.ScrollReveal, _globals.siteObj.base.Class);
        _globals.siteObj.utils.extend(_globals.siteObj.classes.Tooltip, _globals.siteObj.base.Class);
        
        _globals.siteObj.utils.extend(_globals.siteObj.classes.SliderEffect, _globals.siteObj.base.Class);
        _globals.siteObj.utils.extend(_globals.siteObj.classes.Menu, _globals.siteObj.base.Class);
    },

    _instantiateClasses = function() {
        //_globals.siteObj.createClassInstance('images', _globals.siteObj.classes.Images, {classId: 'Images'});
        //_globals.siteObj.createClassInstance('windowHeight', _globals.siteObj.classes.WindowHeight, {classId: 'WindowHeight'});
        _globals.siteObj.createClassInstance('picView', _globals.siteObj.classes.PicView, {classId: 'PicView'});
        //_globals.siteObj.createClassInstance('windowResize', _globals.siteObj.classes.WindowResize, {classId: 'WindowResize'});
        _globals.siteObj.createClassInstance('scrollReveal', _globals.siteObj.classes.ScrollReveal, {classId: 'ScrollReveal'});
        _globals.siteObj.createClassInstance('tooltip', _globals.siteObj.classes.Tooltip, {classId: 'Tooltip'});
        
        _globals.siteObj.createClassInstance('sliderEffect', _globals.siteObj.classes.SliderEffect, {classId: 'SliderEffect'});
        _globals.siteObj.createClassInstance('menu', _globals.siteObj.classes.Menu, {classId: 'Menu'});
    },

    _setup = function() {
        $('body').addClass(_properties.classMode);
    },

    _setBinds = function() {
        _binds().setCompleteBind();
        //_binds().setImage_CompleteBind();
        //_binds().setFullHeightSlider_BigSliderBind();
        //_binds().setScrollAtOnce_ToggleBind();
    },
	
	_binds = function() {
        return {
            setCompleteBind: function() {
                _themeMode.bind($window, _themeMode.globals.classType+'_Complete', function(e, data){
                    //_themeMode.trigger('LoaderMain_Init', data);
                    //_themeMode.trigger('Images_Init', data);
                    _themeMode.trigger('PicView_Init', data);
                    //_themeMode.trigger('WindowResize_Init', data);
                    _themeMode.trigger('ScrollReveal_Init', data);
                    _themeMode.trigger('Tooltip_Init', data);
                    _themeMode.trigger('SliderEffect_Init', data);
                    _themeMode.trigger('Menu_Init', data);
                });
            }/*,
            setImage_CompleteBind: function(){
                _themeMode.bind($window, 'Images_ImagesComplete', function(e, data){
                    _themeMode.trigger('FullHeightSlider_Init', data);
                    _themeMode.trigger('LoaderMain_End', data);
                    _themeMode.trigger('TopEventsSlider_Init', data);
                    _themeMode.trigger('TicketsEventsSlider_Init', data);
                    _themeMode.trigger('GallerySlider_Init', data);
                    _themeMode.trigger('EventAnimate_Init', data);
                    _themeMode.trigger('BlogAnimate_Init', data);
                    _themeMode.trigger('Partners_Init', data);
                    _themeMode.trigger('MenuToTop_Init', data);
                    _themeMode.trigger('FormContacts_Init', data);
                    _themeMode.trigger('FormSubscribe_Init', data);
                    _themeMode.trigger('GalleryPage_Init', data);
                    _themeMode.trigger('Sharrre_Init', data);
                    _themeMode.trigger('EventsTickets_Init', data);
                    _themeMode.trigger('DropDownClick_Init', data);
                });
            },
            setFullHeightSlider_BigSliderBind: function(){
                _themeMode.bind($window, 'FullHeightSlider_BigSlider', function(e, data){
                    _themeMode.trigger('ScrollAtOnce_Init', data);
                });
            },
            setScrollAtOnce_ToggleBind: function(){
                _themeMode.bind($window, 'ScrollAtOnce_Toggle', function(e, data){
                    _themeMode.trigger('FullHeightSlider_Action', data);
                });
            }*/
        }
    },
	
	_setCustomMethods = function() {
        _themeMode.globals.customResurrect = function() {};
        _themeMode.globals.customDestroy = function() {};
    };
	
	//PUBLIC METHODS
    _themeMode.addMethod('init', function() {
        _themeMode.bind($window, 'siteConfigComplete', function() {
            _globals.preloaded = true;
            _init();
        });
    });

    //GO!
    _init();
});