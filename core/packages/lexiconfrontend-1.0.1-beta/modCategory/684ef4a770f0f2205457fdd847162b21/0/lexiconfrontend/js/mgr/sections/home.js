lexiconFrontend.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'lexiconfrontend-panel-home'
            ,renderTo: 'lexiconfrontend-panel-home-div'
        }]
    });
    lexiconFrontend.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(lexiconFrontend.page.Home,MODx.Component);
Ext.reg('lexiconfrontend-page-home',lexiconFrontend.page.Home);