<?php /* Smarty version Smarty-3.0.4, created on 2018-04-11 11:02:15
         compiled from "C:/OSPanel/domains/localhost/manager/templates/default/element/tv/renders/input/date.tpl" */ ?>
<?php /*%%SmartyHeaderCode:307745acdc10796fa11-91986591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53986912a20eaaa7b3be481f614b913b28a5a33e' => 
    array (
      0 => 'C:/OSPanel/domains/localhost/manager/templates/default/element/tv/renders/input/date.tpl',
      1 => 1422433746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '307745acdc10796fa11-91986591',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<input id="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" type="hidden" class="datefield"
	value="<?php echo $_smarty_tpl->getVariable('tv')->value->value;?>
" name="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
"
	onblur="MODx.fireResourceFormChange();"/>

<script type="text/javascript">
// <![CDATA[

Ext.onReady(function() {
    var fld = MODx.load({
    
        xtype: 'xdatetime'
        ,applyTo: 'tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,name: 'tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,dateFormat: MODx.config.manager_date_format
        ,timeFormat: MODx.config.manager_time_format
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['disabledDates']) ? $_smarty_tpl->getVariable('params')->value['disabledDates'] : null)){?>,disabledDates: <?php echo (isset($_smarty_tpl->getVariable('params')->value['disabledDates']) ? $_smarty_tpl->getVariable('params')->value['disabledDates'] : null);?>
<?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['disabledDays']) ? $_smarty_tpl->getVariable('params')->value['disabledDays'] : null)){?>,disabledDays: <?php echo (isset($_smarty_tpl->getVariable('params')->value['disabledDays']) ? $_smarty_tpl->getVariable('params')->value['disabledDays'] : null);?>
<?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['minDateValue']) ? $_smarty_tpl->getVariable('params')->value['minDateValue'] : null)){?>,minDateValue: '<?php echo (isset($_smarty_tpl->getVariable('params')->value['minDateValue']) ? $_smarty_tpl->getVariable('params')->value['minDateValue'] : null);?>
'<?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['maxDateValue']) ? $_smarty_tpl->getVariable('params')->value['maxDateValue'] : null)){?>,maxDateValue: '<?php echo (isset($_smarty_tpl->getVariable('params')->value['maxDateValue']) ? $_smarty_tpl->getVariable('params')->value['maxDateValue'] : null);?>
'<?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['startDay']) ? $_smarty_tpl->getVariable('params')->value['startDay'] : null)){?>,startDay: <?php echo (isset($_smarty_tpl->getVariable('params')->value['startDay']) ? $_smarty_tpl->getVariable('params')->value['startDay'] : null);?>
<?php }?>

        <?php if ((isset($_smarty_tpl->getVariable('params')->value['minTimeValue']) ? $_smarty_tpl->getVariable('params')->value['minTimeValue'] : null)){?>,minTimeValue: '<?php echo (isset($_smarty_tpl->getVariable('params')->value['minTimeValue']) ? $_smarty_tpl->getVariable('params')->value['minTimeValue'] : null);?>
'<?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['maxTimeValue']) ? $_smarty_tpl->getVariable('params')->value['maxTimeValue'] : null)){?>,maxTimeValue: '<?php echo (isset($_smarty_tpl->getVariable('params')->value['maxTimeValue']) ? $_smarty_tpl->getVariable('params')->value['maxTimeValue'] : null);?>
'<?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['timeIncrement']) ? $_smarty_tpl->getVariable('params')->value['timeIncrement'] : null)){?>,timeIncrement: <?php echo (isset($_smarty_tpl->getVariable('params')->value['timeIncrement']) ? $_smarty_tpl->getVariable('params')->value['timeIncrement'] : null);?>
<?php }?>
        ,dateWidth: 198
        ,timeWidth: 198
        ,allowBlank: <?php if ((isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)==1||(isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)=='true'){?>true<?php }else{ ?>false<?php }?>
        ,value: '<?php echo $_smarty_tpl->getVariable('tv')->value->value;?>
'
        ,msgTarget: 'under'
    
        ,listeners: { 'change': { fn:MODx.fireResourceFormChange, scope:this}}
    });
    Ext.getCmp('modx-panel-resource').getForm().add(fld);
});

// ]]>
</script>