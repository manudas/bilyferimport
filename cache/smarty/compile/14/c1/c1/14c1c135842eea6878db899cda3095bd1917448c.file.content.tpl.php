<?php /* Smarty version Smarty-3.1.19, created on 2017-02-22 14:23:54
         compiled from "/var/www/html/ps16/admin915neuy6k/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121399604958ad90ea964b85-04275856%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14c1c135842eea6878db899cda3095bd1917448c' => 
    array (
      0 => '/var/www/html/ps16/admin915neuy6k/themes/default/template/content.tpl',
      1 => 1482157020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121399604958ad90ea964b85-04275856',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58ad90ea986703_75659478',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ad90ea986703_75659478')) {function content_58ad90ea986703_75659478($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
