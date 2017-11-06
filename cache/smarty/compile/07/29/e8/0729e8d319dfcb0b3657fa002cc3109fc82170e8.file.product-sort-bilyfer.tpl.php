<?php /* Smarty version Smarty-3.1.19, created on 2017-11-06 11:26:54
         compiled from "/var/www/html/ps16/modules/bilyferfilterbyattribute/views/templates/hook/product-sort-bilyfer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136927836559f6dbca5df6e3-76322834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0729e8d319dfcb0b3657fa002cc3109fc82170e8' => 
    array (
      0 => '/var/www/html/ps16/modules/bilyferfilterbyattribute/views/templates/hook/product-sort-bilyfer.tpl',
      1 => 1509964012,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136927836559f6dbca5df6e3-76322834',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59f6dbca5fcc24_20513927',
  'variables' => 
  array (
    'request' => 0,
    'category' => 0,
    'link' => 0,
    'manufacturer' => 0,
    'supplier' => 0,
    'paginationId' => 0,
    'ordernation' => 0,
    'attribute_groups' => 0,
    'grupo_atributo' => 0,
    'single_atributo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f6dbca5fcc24_20513927')) {function content_59f6dbca5fcc24_20513927($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['request']->value)) {?>
	<!-- Sort products -->
    <?php if (isset($_GET['id_category'])&&$_GET['id_category']) {?>
        <?php $_smarty_tpl->tpl_vars['request'] = new Smarty_variable($_smarty_tpl->tpl_vars['link']->value->getPaginationLink('category',$_smarty_tpl->tpl_vars['category']->value,false,true), null, 0);?>	<?php } elseif (isset($_GET['id_manufacturer'])&&$_GET['id_manufacturer']) {?>
        <?php $_smarty_tpl->tpl_vars['request'] = new Smarty_variable($_smarty_tpl->tpl_vars['link']->value->getPaginationLink('manufacturer',$_smarty_tpl->tpl_vars['manufacturer']->value,false,true), null, 0);?>
    <?php } elseif (isset($_GET['id_supplier'])&&$_GET['id_supplier']) {?>
        <?php $_smarty_tpl->tpl_vars['request'] = new Smarty_variable($_smarty_tpl->tpl_vars['link']->value->getPaginationLink('supplier',$_smarty_tpl->tpl_vars['supplier']->value,false,true), null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['request'] = new Smarty_variable($_smarty_tpl->tpl_vars['link']->value->getPaginationLink(false,false,false,true), null, 0);?>
    <?php }?>
<?php }?>

<form method="post" id="productsSortFormByAttribute<?php if (isset($_smarty_tpl->tpl_vars['paginationId']->value)) {?>_<?php echo $_smarty_tpl->tpl_vars['paginationId']->value;?>
<?php }?>" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['request']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="productsSortFormByAttribute">

	<input name='hidden_selectProductSort' id='hidden_selectProductSort' type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ordernation']->value;?>
" />
	<script>

        $(window).load(function(){
			var product_sort_selector = $('#selectProductSort<?php if (isset($_smarty_tpl->tpl_vars['paginationId']->value)) {?>_<?php echo $_smarty_tpl->tpl_vars['paginationId']->value;?>
<?php }?>');
            product_sort_selector.on('change', function(){
				$('#hidden_selectProductSort').val($('#selectProductSort<?php if (isset($_smarty_tpl->tpl_vars['paginationId']->value)) {?>_<?php echo $_smarty_tpl->tpl_vars['paginationId']->value;?>
<?php }?>').val());
			});
            $('#hidden_selectProductSort').val($('#selectProductSort<?php if (isset($_smarty_tpl->tpl_vars['paginationId']->value)) {?>_<?php echo $_smarty_tpl->tpl_vars['paginationId']->value;?>
<?php }?>').val());
            // alert('n and p');


			var serialized_data = $('#productsSortFormByAttribute<?php if (isset($_smarty_tpl->tpl_vars['paginationId']->value)) {?>_<?php echo $_smarty_tpl->tpl_vars['paginationId']->value;?>
<?php }?>').serialize();




            $(document).off('change', '.selectProductSort<?php if (isset($_smarty_tpl->tpl_vars['paginationId']->value)) {?>_<?php echo $_smarty_tpl->tpl_vars['paginationId']->value;?>
<?php }?>').on('change', '.selectProductSort', function(e) {
                $('.selectProductSort<?php if (isset($_smarty_tpl->tpl_vars['paginationId']->value)) {?>_<?php echo $_smarty_tpl->tpl_vars['paginationId']->value;?>
<?php }?>').val($(this).val());

                if($('#layered_form').length > 0)
                    reloadContent('&forceSlide&'+serialized_data);
            });

            $(document).off('change', 'select[name="n"]').on('change', 'select[name="n"]', function(e)
            {
                $('select[name=n]').val($(this).val());
                reloadContent('&forceSlide&'+serialized_data);
            });


			// $sort_form = $("productsSortForm<?php if (isset($_smarty_tpl->tpl_vars['paginationId']->value)) {?>_<?php echo $_smarty_tpl->tpl_vars['paginationId']->value;?>
<?php }?>");

            $("#submit_button_bilyfer_filter_by_attribute").on('click', function() {
                reloadContent('&forceSlide&'+serialized_data);
            });

            $(".bilyfer_filtering_selector").on('change', function() {
                serialized_data = $('#productsSortFormByAttribute<?php if (isset($_smarty_tpl->tpl_vars['paginationId']->value)) {?>_<?php echo $_smarty_tpl->tpl_vars['paginationId']->value;?>
<?php }?>').serialize();
            });
		});

	</script>
    
	<?php  $_smarty_tpl->tpl_vars['grupo_atributo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['grupo_atributo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['grupo_atributo']->key => $_smarty_tpl->tpl_vars['grupo_atributo']->value) {
$_smarty_tpl->tpl_vars['grupo_atributo']->_loop = true;
?>
        
		<select id="filterByAttributeGroup_<?php echo $_smarty_tpl->tpl_vars['grupo_atributo']->value['id_attribute_group'];?>
" class="bilyfer_filtering_selector selectProduct.Sort for.m-control" name="filterByAttributeGroup[<?php echo $_smarty_tpl->tpl_vars['grupo_atributo']->value['id_attribute_group'];?>
]">
			<option value=""><?php echo $_smarty_tpl->tpl_vars['grupo_atributo']->value['name'];?>
</option>
			<?php  $_smarty_tpl->tpl_vars['single_atributo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['single_atributo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['grupo_atributo']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['single_atributo']->key => $_smarty_tpl->tpl_vars['single_atributo']->value) {
$_smarty_tpl->tpl_vars['single_atributo']->_loop = true;
?>
                
				<option value="<?php echo $_smarty_tpl->tpl_vars['single_atributo']->value['id_attribute'];?>
" ><?php echo $_smarty_tpl->tpl_vars['single_atributo']->value['name'];?>
</option>

            <?php } ?>

		</select>
	
	<?php } ?>
	<button id="submit_button_bilyfer_filter_by_attribute" type="button"><?php echo smartyTranslate(array('s'=>'Filter','mod'=>'bilyferfilterbyattribute'),$_smarty_tpl);?>
</button>

</form>

<?php }} ?>
