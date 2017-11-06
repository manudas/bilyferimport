<?php /* Smarty version Smarty-3.1.19, created on 2017-04-18 12:31:32
         compiled from "/var/www/html/ps16/admin960yac2gi/themes/default/template/controllers/modules/warning_module.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89567272258f5eb04eef2d8-02365500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7b027be44318387c4aa12108ebe63747d3bd54e' => 
    array (
      0 => '/var/www/html/ps16/admin960yac2gi/themes/default/template/controllers/modules/warning_module.tpl',
      1 => 1482157020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89567272258f5eb04eef2d8-02365500',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_link' => 0,
    'text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58f5eb04f1b683_15556652',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f5eb04f1b683_15556652')) {function content_58f5eb04f1b683_15556652($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['module_link']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</a><?php }} ?>
