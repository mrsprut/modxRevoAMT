var lexiconFrontend = function(config) {
	config = config || {};
	lexiconFrontend.superclass.constructor.call(this,config);
};
Ext.extend(lexiconFrontend,Ext.Component,{
	page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {},view: {}
});
Ext.reg('lexiconfrontend',lexiconFrontend);

lexiconFrontend = new lexiconFrontend();