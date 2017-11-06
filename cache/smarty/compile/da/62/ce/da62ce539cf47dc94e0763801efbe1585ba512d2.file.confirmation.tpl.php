<?php /* Smarty version Smarty-3.1.19, created on 2017-02-22 14:32:14
         compiled from "/var/www/html/ps16/modules/affilired/views/templates/front/confirmation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91491797358ad92de6901a3-87506771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da62ce539cf47dc94e0763801efbe1585ba512d2' => 
    array (
      0 => '/var/www/html/ps16/modules/affilired/views/templates/front/confirmation.tpl',
      1 => 1487691526,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91491797358ad92de6901a3-87506771',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'product_ordering' => 0,
    'merchant_id' => 0,
    'order' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58ad92de770608_22533871',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ad92de770608_22533871')) {function content_58ad92de770608_22533871($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var/www/html/ps16/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/ps16/tools/smarty/plugins/modifier.date_format.php';
?>


    <!-- AFFILIRED CONFIRMATION CODE, PLEASE DON'T REMOVE -->
    <script type="text/javascript">
   
        // var orderRef = 'SALE_REFERENCE'+' '+'PRODUCT_NAME'; /* You MUST keep the blank space */
        var orderRef = '<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order'];?>
#<?php echo $_smarty_tpl->tpl_vars['product_ordering']->value;?>
'+' '+'<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
'; /* You MUST keep the blank space */
        var payoutCodes = '';
        var offlineCode = '';
        // var uid = 'PRODUCT_UID';
        var uid = '<?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
';
        var htname = '';
        // var merchantID = 4520;
        var merchantID = <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['merchant_id']->value, 'nofilter');?>
;
        var pixel = 0;
        // var orderValue = AMOUNT; /* Commissionable Amount */
        var orderValue = <?php echo number_format($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_excl'],2,'.','');?>
; /* Commissionable Amount */
        // var lockingDate = 'LOCKING_DATE'; /* yyyy-mm-dd (separated by hypen) */
        var lockingDate = '<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value->date_add,"%Y-%m-%d");?>
'; /* yyyy-mm-dd (separated by hypen) */
        // var currencyCode ='EUR';
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
