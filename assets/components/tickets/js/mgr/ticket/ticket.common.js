Tickets.panel.Ticket = function(config) {
	config = config || {};
	Ext.applyIf(config,{});
	Tickets.panel.Ticket.superclass.constructor.call(this,config);
};

Ext.extend(Tickets.panel.Ticket,MODx.panel.Resource,{
	getFields: function(config) {
		var it = [];
		it.push({
			title: _('ticket')
			,id: 'modx-resource-settings'
			,cls: 'modx-resource-tab'
			,layout: 'form'
			,labelAlign: 'top'
			,labelSeparator: ''
			,bodyCssClass: 'tab-panel-wrapper main-wrapper'
			,autoHeight: true
			,defaults: {
				border: false
				,msgTarget: 'under'
				,width: 400
			}
			,items: this.getMainFields(config)
		});
		if (config.mode == 'update') {
			it.push({
				title: _('comments')
				,id: 'modx-tickets-comments'
				,cls: 'modx-resource-tab'
				,layout: 'form'
				,labelAlign: 'top'
				,labelSeparator: ''
				,bodyCssClass: 'tab-panel-wrapper main-wrapper'
				,autoHeight: true
				,items: this.getComments(config)
			});
		}
		if (config.show_tvs && MODx.config.tvs_below_content != 1) {
			it.push(this.getTemplateVariablesPanel(config));
		}
		if (MODx.perm.resourcegroup_resource_list == 1) {
			it.push(this.getAccessPermissionsTab(config));
		}
		var its = [];
		its.push(this.getPageHeader(config),{
			id:'modx-resource-tabs'
			,xtype: 'modx-tabs'
			,forceLayout: true
			,deferredRender: false
			,collapsible: true
			,itemId: 'tabs'
			,stateful: true
			,stateId: 'tickets-ticket-'+config.mode +'-tabpanel'
			,stateEvents: ['tabchange']
			,getState:function() {return { activeTab:this.items.indexOf(this.getActiveTab())};}
			,items: it
		});

		if (MODx.config.tvs_below_content == 1) {
			var tvs = this.getTemplateVariablesPanel(config);
			tvs.style = 'margin-top: 10px';
			its.push(tvs);
		}
		return its;
	}

	,getMainLeftFields: function(config) {
		config = config || {record:{}};
		var mlf = [{
			xtype: 'textfield'
			,fieldLabel: _('resource_pagetitle')+'<span class="required">*</span>'
			,description: '<b>[[*pagetitle]]</b><br />'+_('resource_pagetitle_help')
			,name: 'pagetitle'
			,id: 'modx-resource-pagetitle'
			,maxLength: 255
			,anchor: '100%'
			,allowBlank: false
			,enableKeyEvents: true
			,listeners: {
				'keyup': {scope:this,fn:function(f,e) {
					var title = Ext.util.Format.stripTags(f.getValue());
					Ext.getCmp('modx-resource-header').getEl().update('<h2>'+title+'</h2>');
				}}
			}
		}];

		mlf.push({
			xtype: 'textfield'
			,fieldLabel: _('resource_longtitle')
			,description: '<b>[[*longtitle]]</b><br />'+_('resource_longtitle_help')
			,name: 'longtitle'
			,id: 'modx-resource-longtitle'
			,anchor: '100%'
			,value: config.record.longtitle || ''
		});

		mlf.push({
			xtype: 'textarea'
			,fieldLabel: _('resource_description')
			,description: '<b>[[*description]]</b><br />'+_('resource_description_help')
			,name: 'description'
			,id: 'modx-resource-description'
			,anchor: '100%'
			,value: config.record.description || ''
		});

		mlf.push({
			xtype: 'textarea'
			,fieldLabel: _('resource_summary')
			,description: '<b>[[*introtext]]</b><br />'+_('resource_summary_help')
			,name: 'introtext'
			,id: 'modx-resource-introtext'
			,anchor: '100%'
			,value: config.record.introtext || ''
		});

		var ct = this.getContentField(config);
		if (ct) {
			mlf.push(ct);
		}
		return mlf;
	}

	,getContentField: function(config) {
		return {
			id: 'modx-resource-content'
			,border: false
			,layout: 'form'
			,items: [{
				id: 'modx-content-above'
				,border: false
			},{
				xtype: 'textarea'
				,fieldLabel: _('content')
				,name: 'ta'
				,id: 'ta'
				,anchor: '100%'
				,height: 500
				,grow: false
				,value: (config.record.content || config.record.ta) || ''
			},{
				id: 'modx-content-below'
				,border: false
			}]
		};
	}


	,getMainRightFields: function(config) {
		config = config || {};
		return [{
			xtype: 'fieldset'
			,title: _('ticket_publishing_information')
			,id: 'tickets-box-publishing-information'
			,defaults: {
				msgTarget: 'under'
			}
			,items: [
				/*{
					xtype: 'tickets-combo-publish-status'
					,fieldLabel: _('ticket_status')
					,name: 'published'
					,id: 'modx-resource-published'
					,hiddenName: 'published'
					,inputValue: 0
					,value: 0
				 },*/
				{
					xtype: 'xdatetime'
					,fieldLabel: _('resource_publishedon')
					,description: '<b>[[*publishedon]]</b><br />'+_('resource_publishedon_help')
					,name: 'publishedon'
					,id: 'modx-resource-publishedon'
					,allowBlank: true
					,dateFormat: MODx.config.manager_date_format
					,timeFormat: MODx.config.manager_time_format
					,dateWidth: 120
					,timeWidth: 120
					,value: config.record.publishedon
				},{
					xtype: MODx.config.publish_document ? 'xdatetime' : 'hidden'
					,fieldLabel: _('resource_publishdate')
					,description: '<b>[[*pub_date]]</b><br />'+_('resource_publishdate_help')
					,name: 'pub_date'
					,id: 'modx-resource-pub-date'
					,allowBlank: true
					,dateFormat: MODx.config.manager_date_format
					,timeFormat: MODx.config.manager_time_format
					,dateWidth: 120
					,timeWidth: 120
					,value: config.record.pub_date
				},{
					xtype: MODx.config.publish_document ? 'xdatetime' : 'hidden'
					,fieldLabel: _('resource_unpublishdate')
					,description: '<b>[[*unpub_date]]</b><br />'+_('resource_unpublishdate_help')
					,name: 'unpub_date'
					,id: 'modx-resource-unpub-date'
					,allowBlank: true
					,dateFormat: MODx.config.manager_date_format
					,timeFormat: MODx.config.manager_time_format
					,dateWidth: 120
					,timeWidth: 120
					,value: config.record.unpub_date
				},{
					xtype: 'modx-combo-template'
					,fieldLabel: _('resource_template')
					,description: '<b>[[*template]]</b><br />'+_('resource_template_help')
					,name: 'template'
					,id: 'modx-resource-template'
					,anchor: '90%'
					,editable: false
					,baseParams: {
						action: MODx.modx23 ? 'element/template/getlist' : 'getList'
						,combo: '1'
					}
					,value: config.record.template
					,listeners: {select: {fn: this.templateWarning,scope: this}}
				},{
					xtype: MODx.config.publish_document ? 'tickets-combo-user' : 'hidden'
					,fieldLabel: _('resource_createdby')
					,description: '<b>[[*createdby]]</b><br />'+_('resource_createdby_help')
					,name: 'created_by'
					,hiddenName: 'createdby'
					,id: 'modx-resource-createdby'
					,allowBlank: true
					,baseParams: {
						action: MODx.modx23 ? 'security/user/getlist' : 'getList'
						,combo: '1'
						,limit: 0
					}
					,anchor: '90%'
					,value: config.record.createdby || MODx.user.id
				},{
					xtype: MODx.config.publish_document ? 'tickets-combo-section' : 'hidden'
					,id: 'tickets-combo-section'
					,fieldLabel: _('resource_parent')
					,description: '<b>[[*parent]]</b><br />'+_('resource_parent_help')
					,value: config.record.parent
					,url: Tickets.config.connector_url
					,listeners: {
						'select': {
							fn:function(data) {
								Ext.getCmp('modx-resource-parent-hidden').setValue(data.value);
							}
						}
					}
					,anchor: '90%'
				},{
					xtype: 'textfield'
					,id: 'modx-resource-alias'
					,fieldLabel: _('resource_alias')
					,description: '<b>[[*alias]]</b><br />'+_('resource_alias_help')
					,name: 'alias'
					,anchor: '90%'
					,value: config.record.alias || ''
				}
				,{xtype: 'hidden', name: 'menutitle', value: config.record.menutitle, id: 'modx-resource-menutitle'}
				,{xtype: 'hidden', name: 'link_attributes', id: 'modx-resource-link-attributes'}
				,{xtype: 'hidden', name: 'content_type', id: 'modx-resource-content-type', value: config.record.content_type || (MODx.config.default_content_type || 1)}
				,{xtype: 'hidden', name: 'class_key', id: 'modx-resource-class-key', value: 'Ticket'}
			]
		},{
			html: '<hr />'
			,border: false
		},{
			xtype: 'fieldset'
			,title: _('ticket_ticket_options')
			,id: 'tickets-box-options'
			,anchor: '100%'
			,defaults: {
				labelSeparator: ''
				,labelAlign: 'right'
				,layout: 'form'
				,msgTarget: 'under'
			}
			,items: this.getCheckboxes(config)
		}]
	}

	,getCheckboxes: function(config) {
		var items = [];
		var tmp = {
			searchable: {}
			,disable_jevix: {name: 'properties[disable_jevix]',boxLabel: _('ticket_disable_jevix'),description: _('ticket_disable_jevix_help'), checked: config.record.properties['disable_jevix']}
			,cacheable: {}
			,process_tags: {name: 'properties[process_tags]',boxLabel: _('ticket_process_tags'),description: _('ticket_process_tags_help'), checked: config.record.properties['process_tags']}
			,published: {}
			,private: {name: 'privateweb',boxLabel: _('ticket_private'),description: _('ticket_private_help')}
			,richtext: {}
			,hidemenu: {boxLabel: _('resource_hide_from_menus'),description: '<b>[[*hidemenu]]</b><br/>' + _('resource_hide_from_menus_help')}
			//,isfolder: {boxLabel: _('resource_folder'),description: _('resource_folder_help')}
			//,syncsite: {disabled:true}
			,uri_override: {xtype:'xcheckbox', id: 'modx-resource-uri-override'}
			,show_in_tree: {boxLabel: _('ticket_show_in_tree'), description: '<b>[[*show_in_tree]]</b><br/>' + _('ticket_show_in_tree_help')}
		};

		for (var i in tmp) {
			if (tmp.hasOwnProperty(i)) {
				items.push(Ext.apply({
						xtype: 'xcheckbox'
						,name: i
						,boxLabel: _('resource_' + i)
						,description: '<b>[[*' + i + ']]</b><br/>' + _('resource_' + i + '_help')
						,id: 'modx-ticket-' + i
						,inputValue: 1
						,checked: config.record[i]
					}
					,tmp[i]
				));
			}
		}

		var fields = [{
			xtype: 'checkboxgroup'
			,columns: 2
			,items: items
		}];
		fields.push({
			xtype:'textfield'
			,name: 'uri'
			,id: 'modx-resource-uri'
			,fieldLabel: _('resource_uri')
			,description: '<b>[[*uri]]</b><br />'+_('resource_uri_help')
			,value:config.record.uri || ''
			,hidden: !config.record.uri_override
			,anchor: '100%'
		});

		return fields;
	}

	,getComments: function(config) {
		return [{
			xtype: 'tickets-tab-comments'
			,record: config.record
			,parents: config.record.id
			,layout: 'form'
		}];
	}
});
Ext.reg('modx-panel-ticket',Tickets.panel.Ticket);