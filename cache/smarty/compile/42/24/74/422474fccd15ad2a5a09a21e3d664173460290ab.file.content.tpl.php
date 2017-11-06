<?php /* Smarty version Smarty-3.1.19, created on 2017-04-18 13:31:39
         compiled from "/var/www/html/ps16/admin960yac2gi/themes/default/template/controllers/shop/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93204925958f5f91b255418-06395306%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '422474fccd15ad2a5a09a21e3d664173460290ab' => 
    array (
      0 => '/var/www/html/ps16/admin960yac2gi/themes/default/template/controllers/shop/content.tpl',
      1 => 1482157020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93204925958f5f91b255418-06395306',
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
  'unifunc' => 'content_58f5f91b2740d4_74613771',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f5f91b2740d4_74613771')) {function content_58f5f91b2740d4_74613771($_smarty_tpl) {?>

<div class="row">
	<div class="col-lg-4">
		<?php echo $_smarty_tpl->tpl_vars['shops_tree']->value;?>

	</div>
	<div class="col-lg-8"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</div>
</div><?php }} ?>
