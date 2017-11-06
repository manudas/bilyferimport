<?php /*%%SmartyHeaderCode:134180920759428f29f10bb3-79659652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6eb338c29d9c8ad6b3733882071ec6c4f2abd97d' => 
    array (
      0 => '/var/www/html/ps16/themes/default-bootstrap/modules/blockspecials/blockspecials.tpl',
      1 => 1482157024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134180920759428f29f10bb3-79659652',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a008197196867_16707405',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a008197196867_16707405')) {function content_5a008197196867_16707405($_smarty_tpl) {?>
<!-- MODULE Block specials -->
<div id="special_block_right" class="block">
	<p class="title_block">
        <a href="http://localhost/ps16/index.php?controller=prices-drop" title="Specials">
            Specials
        </a>
    </p>
	<div class="block_content products-block">
    		<ul>
        	<li class="clearfix">
            	<a class="products-block-image" href="http://localhost/ps16/index.php?id_product=20&amp;controller=product&amp;id_lang=3">
                    <img 
                    class="replace-2x img-responsive" 
                    src="http://localhost/ps16/img/p/gb-default-small_default.jpg" 
                    alt="" 
                    title="Vestido de verano estampado" />
                </a>
                <div class="product-content">
                	<h5>
                        <a class="product-name" href="http://localhost/ps16/index.php?id_product=20&amp;controller=product&amp;id_lang=3" title="Vestido de verano estampado">
                            Vestido de verano estampado
                        </a>
                    </h5>
                                        	<p class="product-description">
                            Vestido sin mangas de gasa hasta la...
                        </p>
                                        <div class="price-box">
                    	                        	<span class="price special-price">
                                                                    0,00 €                            </span>
                                                                                                                                 <span class="price-percent-reduction">-15%</span>
                                                                                         <span class="old-price">
                                                                                                </span>
                            
                                            </div>
                </div>
            </li>
		</ul>
		<div>
			<a 
            class="btn btn-default button button-small" 
            href="http://localhost/ps16/index.php?controller=prices-drop" 
            title="All specials">
                <span>All specials<i class="icon-chevron-right right"></i></span>
            </a>
		</div>
    	</div>
</div>
<!-- /MODULE Block specials -->
<?php }} ?>
