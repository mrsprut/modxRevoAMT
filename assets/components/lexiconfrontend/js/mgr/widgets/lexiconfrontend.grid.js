lexiconFrontend.grid.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'lexiconfrontend-grid-home'
        ,url: lexiconFrontend.config.connector_url
        ,fields: ['name','value','namespace','topic','language','editedon','overridden']
        ,baseParams: {
            action: 'mgr/getlist'
            ,topic: ''
            ,language: MODx.config.manager_language || 'en'
        }
        ,width: '98%'
        ,paging: true
        ,autosave: true
        ,save_action: 'mgr/updatefromgrid'
        ,columns: [{
            header: _('name')
            ,dataIndex: 'name'
            ,width: 200
            ,sortable: true
            ,renderer: this._renderStatus
        },{
            header: _('value')
            ,dataIndex: 'value'
            ,width: 500
            ,sortable: false
            ,editor: {xtype: 'textarea'}
            ,renderer: this._renderStatus
        },{
            header: _('editedon')
            ,dataIndex: 'editedon'
            ,width: 125
        }]
        ,tbar: [
        {
            text: _('category')
        },{
            xtype: 'modx-combo-lexiconfrontend-topic'
            ,id: 'modx-lexiconfrontend-filter-topic'
            ,itemId: 'topic'
            ,value: 'default'
            ,pageSize: 20
            ,width: 120
            ,listeners: {
                'select': {fn:this.changeTopic,scope:this}
            }
        },{
            text: _('language')
        },{
            xtype: 'modx-combo-lexiconfrontend-language'
            ,name: 'language'
            ,id: 'modx-lexiconfrontend-filter-language'
            ,itemId: 'language'
            ,value: MODx.config.manager_language || 'en'
            ,width: 100
            ,listeners: {
                'select': {fn:this.changeLanguage,scope:this}
            }
        },'->',{
            xtype: 'textfield'
            ,name: 'name'
            ,id: 'modx-lexiconfrontend-filter-search'
            ,itemId: 'search'
            ,width: 120
            ,emptyText: _('search')+'...'
            ,listeners: {
                'change': {fn:this.filter.createDelegate(this,['search'],true),scope:this}
                ,'render': {fn: function(cmp) {
                    new Ext.KeyMap(cmp.getEl(), {
                        key: Ext.EventObject.ENTER
                        ,fn: this.blur
                        ,scope: cmp
                    });
                },scope:this}
            }
        },{
            xtype: 'button'
            ,id: 'modx-lexiconfrontend-filter-clear'
            ,itemId: 'clear'
            ,text: 'Очистить фильтр'
            ,listeners: {
                'click': {fn: this.clearFilter, scope: this}
            }
        }]
    });
    lexiconFrontend.grid.Home.superclass.constructor.call(this,config);
};
Ext.extend(lexiconFrontend.grid.Home,MODx.grid.Grid,{
    console: null
    
    ,_renderStatus: function(v,md,rec,ri) {
        
        switch (rec.data.overridden) {
            case 1:
            return '<span style="color: green;">'+v+'</span>';break;
            case 2:
            return '<span style="color: purple;">'+v+'</span>';
            default:
            return '<span>'+v+'</span>';
        }
    }
    ,filter: function(cb,r,i,name){
        if (!name) {return false;}
    	this.store.baseParams[name] = cb.getValue();
    	this.getBottomToolbar().changePage(1);
    	this.refresh();
        return true;
    }
    ,clearFilter: function() {
    	this.store.baseParams = {
            action: 'mgr/getList'
            ,'namespace': ''
            ,topic: 'default'
            ,language: MODx.config.manager_language || 'en'
        };
    	this.getBottomToolbar().changePage(1);
        var tb = this.getTopToolbar();
        
        var tcb = tb.getComponent('topic');
        tcb.store.load();
    	tcb.setValue('default');
        
    	var tcl = tb.getComponent('language');
        tcb.store.load();
        tcl.setValue('ru');
        
        tb.getComponent('search').setValue('');
    	this.refresh();
    }
    ,changeTopic: function(cb,nv,ov) {
        this.setFilterParams(cb.getValue(),MODx.config.manager_language || 'en');
    }
    ,changeLanguage: function(cb,nv,ov) {
        this.setFilterParams(null,cb.getValue());
    }
    ,setFilterParams: function(t,l) {
        var tb = this.getTopToolbar();
        
        if (!tb) {return false;}
        
        var tcb,tcl;
        if (t) {
            tcb = tb.getComponent('topic');
            if (tcb) {tcb.setValue(t);}
        }
        
        var s = this.getStore();
        if (s) {
            if (t) {s.baseParams['topic'] = t || 'default';}
            if (l) {s.baseParams['language'] = l || 'ru';}
            s.removeAll();
        }
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
    ,loadWindow2: function(btn,e,o) {
        var tb = this.getTopToolbar();
    	this.menu.record = {
            'namespace': tb.getComponent('namespace').getValue(),
            language: tb.getComponent('language').getValue()
        };
        if (o.xtype != 'modx-window-lexicon-import') {
            this.menu.record.topic = tb.getComponent('topic').getValue();
        }
    	this.loadWindow(btn, e, o);
    }
});
Ext.reg('lexiconfrontend-grid-home',lexiconFrontend.grid.Home);