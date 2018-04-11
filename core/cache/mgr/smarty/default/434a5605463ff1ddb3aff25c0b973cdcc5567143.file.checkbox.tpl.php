<?php /* Smarty version Smarty-3.0.4, created on 2018-04-11 11:02:15
         compiled from "C:/OSPanel/domains/localhost/manager/templates/default/element/tv/renders/input/checkbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213035acdc107ccef57-46269318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '434a5605463ff1ddb3aff25c0b973cdcc5567143' => 
    array (
      0 => 'C:/OSPanel/domains/localhost/manager/templates/default/element/tv/renders/input/checkbox.tpl',
      1 => 1422433746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213035acdc107ccef57-46269318',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'C:/OSPanel/domains/localhost/core/model/smarty/plugins\modifier.escape.php';
?><div id="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
-cb"></div>

<script type="text/javascript">
// <![CDATA[

Ext.onReady(function() {
    var fld = MODx.load({
    
        xtype: 'checkboxgroup'
        ,id: 'tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,vertical: true
        ,columns: <?php if ((isset($_smarty_tpl->getVariable('params')->value['columns']) ? $_smarty_tpl->getVariable('params')->value['columns'] : null)){?><?php echo (isset($_smarty_tpl->getVariable('params')->value['columns']) ? $_smarty_tpl->getVariable('params')->value['columns'] : null);?>
<?php }else{ ?>1<?php }?>
        ,renderTo: 'tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
-cb'
        ,name: 'tv-<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,width: '99%'
        ,allowBlank: <?php if ((isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)==1||(isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)=='true'){?>true<?php }else{ ?>false<?php }?>
        ,hideMode: 'offsets'
        ,msgTarget: 'under'

        ,items: [<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('opts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
if ($_smarty_tpl->tpl_vars['item']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['cbs']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
        {
            name: 'tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
[]'
            ,id: 'tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
-<?php echo (isset($_smarty_tpl->tpl_vars['k']->value) ? $_smarty_tpl->tpl_vars['k']->value : null);?>
'
            ,boxLabel: '<?php echo smarty_modifier_escape((isset($_smarty_tpl->tpl_vars['item']->value['text']) ? $_smarty_tpl->tpl_vars['item']->value['text'] : null),"javascript");?>
'
            ,checked: <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['checked']) ? $_smarty_tpl->tpl_vars['item']->value['checked'] : null)){?>true<?php }else{ ?>false<?php }?>
            ,inputValue: <?php echo (isset($_smarty_tpl->tpl_vars['item']->value['value']) ? $_smarty_tpl->tpl_vars['item']->value['value'] : null);?>

            ,value: <?php echo (isset($_smarty_tpl->tpl_vars['item']->value['value']) ? $_smarty_tpl->tpl_vars['item']->value['value'] : null);?>

        }<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['cbs']['last']){?>,<?php }?>
        <?php }} ?>]
    });
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('opts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
if ($_smarty_tpl->tpl_vars['item']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['cbs']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
    Ext.getCmp('tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
-<?php echo (isset($_smarty_tpl->tpl_vars['k']->value) ? $_smarty_tpl->tpl_vars['k']->value : null);?>
').on('check',MODx.fireResourceFormChange);
    <?php }} ?>

    Ext.get('tvdef<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
').dom.value = "<?php echo $_smarty_tpl->getVariable('cbdefaults')->value;?>
";
    Ext.getCmp('modx-panel-resource').getForm().add(fld);
});
// ]]>
</script>
