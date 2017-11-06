<?php /* Smarty version Smarty-3.1.19, created on 2017-02-22 14:30:50
         compiled from "/var/www/html/ps16/modules/affilired/views/templates/front/masterTag.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121284061758ad928a36cc43-69631218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be81e21e6e80d4b4aad45d2168f1f9286b9c9bcb' => 
    array (
      0 => '/var/www/html/ps16/modules/affilired/views/templates/front/masterTag.tpl',
      1 => 1487595555,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121284061758ad928a36cc43-69631218',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'merchant_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58ad928a3a9e55_88373674',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ad928a3a9e55_88373674')) {function content_58ad928a3a9e55_88373674($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var/www/html/ps16/tools/smarty/plugins/modifier.escape.php';
?>

    <!-- AFFILIRED MASTER TAG, PLEASE DON'T REMOVE -->
    <script type="text/javascript">
        (function() {
            var sc = document.createElement('script'); sc.type = 'text/javascript'; sc.async = true;
            sc.src = '//customs.affilired.com/track/?merchant=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['merchant_id']->value, 'nofilter');?>
';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sc, s);
        })();
    </script>
    <!-- END AFFILIRED MASTER TAG -->
<?php }} ?>
