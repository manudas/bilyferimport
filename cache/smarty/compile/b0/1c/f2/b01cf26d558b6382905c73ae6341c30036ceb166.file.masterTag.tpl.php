<?php /* Smarty version Smarty-3.1.19, created on 2017-08-21 11:51:53
         compiled from "/var/www/html/ps16/modules/spindok/views/templates/front/masterTag.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74613111858f5ed272cc119-29660517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b01cf26d558b6382905c73ae6341c30036ceb166' => 
    array (
      0 => '/var/www/html/ps16/modules/spindok/views/templates/front/masterTag.tpl',
      1 => 1503309041,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74613111858f5ed272cc119-29660517',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58f5ed27337ee9_02235204',
  'variables' => 
  array (
    'merchant_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f5ed27337ee9_02235204')) {function content_58f5ed27337ee9_02235204($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var/www/html/ps16/tools/smarty/plugins/modifier.escape.php';
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
