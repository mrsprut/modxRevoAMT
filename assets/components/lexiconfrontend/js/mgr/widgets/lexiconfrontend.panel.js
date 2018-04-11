lexiconFrontend.panel.Home = function(config) {
    config = config || {};
    
    Ext.applyIf(config,{
        id: 'lexiconfrontend-panel-home'
		,cls: 'container'
        ,itemId: 'panel-home'
        ,bodyStyle: ''
        ,defaults: { autoHeight: true, collapsible: false }
        ,items: [{
            html: '<h2>'+_('lf_title')+'</h2>'
            ,border: false
            ,id: 'lexiconfrontend-home-header'
            ,itemId: 'home-header'
            ,cls: 'modx-page-header container'
        },MODx.getPageStructure([{
            title: _('lf_title_tab')
            ,layout: 'form'
            ,items: [{
                html: _('lf_description')
				,bodyCssClass: 'panel-desc'
                ,border: false
            },{
                xtype: 'lexiconfrontend-grid-home'
                ,itemId: 'grid-home'
				,cls: 'main-wrapper'
                ,title: ''
                ,preventRender: true
            }]
        }])]
    });
    lexiconFrontend.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(lexiconFrontend.panel.Home,MODx.FormPanel);
Ext.reg('lexiconfrontend-panel-home',lexiconFrontend.panel.Home);
