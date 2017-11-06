<?php /* Smarty version Smarty-3.1.19, created on 2017-06-09 09:53:40
         compiled from "/var/www/html/ps16/modules/feeder/feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201708255593a54049651c0-17022861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1a2a7a6dc6a6719ca21a536af0a69e6f48ec639' => 
    array (
      0 => '/var/www/html/ps16/modules/feeder/feederHeader.tpl',
      1 => 1496994163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201708255593a54049651c0-17022861',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'feedUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_593a54049e4583_83830507',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593a54049e4583_83830507')) {function content_593a54049e4583_83830507($_smarty_tpl) {?>

<link rel="alternate" type="application/rss+xml" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>
