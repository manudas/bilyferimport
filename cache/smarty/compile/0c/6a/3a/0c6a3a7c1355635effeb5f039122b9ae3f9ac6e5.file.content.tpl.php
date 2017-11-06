<?php /* Smarty version Smarty-3.1.19, created on 2017-02-22 14:23:16
         compiled from "/var/www/html/ps16/admin915neuy6k/themes/default/template/controllers/shop/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52184569758ad90c4ac35d3-88576992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c6a3a7c1355635effeb5f039122b9ae3f9ac6e5' => 
    array (
      0 => '/var/www/html/ps16/admin915neuy6k/themes/default/template/controllers/shop/content.tpl',
      1 => 1482157020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52184569758ad90c4ac35d3-88576992',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shops_tree' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58ad90c4ad72f4_20348460',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ad90c4ad72f4_20348460')) {function content_58ad90c4ad72f4_20348460($_smarty_tpl) {?>

<div class="row">
	<div class="col-lg-4">
		<?php echo $_smarty_tpl->tpl_vars['shops_tree']->value;?>

	</div>
	<div class="col-lg-8"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</div>
</div><?php }} ?>
