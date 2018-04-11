MODx.combo.lexiconFrontendTopic = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        name: 'topic'
        ,hiddenName: 'topic'
        ,forceSelection: true
        ,typeAhead: false
        ,editable: false
        ,allowBlank: false
        ,listWidth: 300
        ,url: lexiconFrontend.config.connector_url
        ,fields: ['name']
        ,displayField: 'name'
        ,valueField: 'name'
        ,baseParams: {
            action: 'mgr/topic/getList'
            ,'language': MODx.config.manager_language || 'en'
        }
        ,pageSize: 20
    });
    MODx.combo.lexiconFrontendTopic.superclass.constructor.call(this,config);
};
Ext.extend(MODx.combo.lexiconFrontendTopic,MODx.combo.ComboBox,{
    setNamespace: function(ns,t) {
   
        this.store.baseParams['namespace'] = ns;
        this.store.load({
            callback: function() {
                if (t) { this.setValue(t); }
            }
            ,scope: this
        });
    }
    ,setLanguage: function(ns,t) {
        this.store.baseParams['language'] = ns;
        this.store.load({
            callback: function() {
                if (t) { this.setValue(t); }
            }
            ,scope: this
        });
    }
});
Ext.reg('modx-combo-lexiconfrontend-topic',MODx.combo.lexiconFrontendTopic);

MODx.combo.lexiconFrontendLanguage = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        name: 'language'
        ,hiddenName: 'language'
        ,displayField: 'name'
        ,valueField: 'name'
        ,fields: ['name']
        ,forceSelection: true
        ,typeAhead: false
        ,editable: false
        ,allowBlank: false
        ,pageSize: 20
        ,url: MODx.config.connectors_url+'system/language.php'
        ,baseParams: {
            action: 'getList'
            ,'namespace': 'lexiconfrontend'
        }
    });
    MODx.combo.lexiconFrontendLanguage.superclass.constructor.call(this,config);
};
Ext.extend(MODx.combo.lexiconFrontendLanguage,MODx.combo.ComboBox);
Ext.reg('modx-combo-lexiconfrontend-language',MODx.combo.lexiconFrontendLanguage);