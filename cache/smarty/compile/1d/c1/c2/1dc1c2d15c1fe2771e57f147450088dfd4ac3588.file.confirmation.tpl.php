<?php /* Smarty version Smarty-3.1.19, created on 2017-04-18 12:40:34
         compiled from "/var/www/html/ps16/modules/spindok/views/templates/front/confirmation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159564835858f5ed22aefeb9-26455654%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dc1c2d15c1fe2771e57f147450088dfd4ac3588' => 
    array (
      0 => '/var/www/html/ps16/modules/spindok/views/templates/front/confirmation.tpl',
      1 => 1492511959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159564835858f5ed22aefeb9-26455654',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_reference' => 0,
    'product_ordering' => 0,
    'product_name' => 0,
    'product' => 0,
    'merchant_id' => 0,
    'order' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58f5ed22c60196_73622370',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f5ed22c60196_73622370')) {function content_58f5ed22c60196_73622370($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var/www/html/ps16/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/ps16/tools/smarty/plugins/modifier.date_format.php';
?>


    <!-- AFFILIRED CONFIRMATION CODE, PLEASE DON'T REMOVE -->
    <script type="text/javascript">
   
        
        
        var orderRef = '<?php echo $_smarty_tpl->tpl_vars['order_reference']->value;?>
#<?php echo $_smarty_tpl->tpl_vars['product_ordering']->value;?>
'+' '+'<?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>
'; /* You MUST keep the blank space */
        var payoutCodes = '';
        var offlineCode = '';
        
        var uid = '<?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
';
        var htname = '';
        
        var merchantID = <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['merchant_id']->value, 'nofilter');?>
;
        var pixel = 0;
        
        var orderValue = <?php echo number_format($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_excl'],2,'.','');?>
; /* Commissionable Amount */
        
        var lockingDate = '<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value->date_add,"%Y-%m-%d");?>
'; /* yyyy-mm-dd (separated by hypen) */
        
        <?php if (is_array($_smarty_tpl->tpl_vars['currency']->value)) {?> 
            var currencyCode ='<?php echo $_smarty_tpl->tpl_vars['currency']->value['iso_code'];?>
';
        <?php } else { ?> 
            var currencyCode ='<?php echo $_smarty_tpl->tpl_vars['currency']->value->iso_code;?>
';
        <?php }?>
        
    </script>
    <!-- <script type="text/javascript" src="//scripts.affilired.com/v2/confirmation.php?merid=4520&uid=PRODUCT_UID"> -->
    <script type="text/javascript" src="//scripts.affilired.com/v2/confirmation.php?merid=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['merchant_id']->value, 'nofilter');?>
&uid=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
">
    </script>
    <script type="text/javascript">
        recV3 (orderValue , orderRef, merchantID, uid , htname, pixel, payoutCodes, offlineCode,lockingDate,currencyCode)
    </script>
    <!-- END AFFILIRED CONFIRMATION CODE -->
<?php }} ?>
