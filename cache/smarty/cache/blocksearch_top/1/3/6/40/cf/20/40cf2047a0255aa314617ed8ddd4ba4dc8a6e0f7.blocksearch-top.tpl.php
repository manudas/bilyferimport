<?php /*%%SmartyHeaderCode:5052249058ad90c92e5d90-93839835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40cf2047a0255aa314617ed8ddd4ba4dc8a6e0f7' => 
    array (
      0 => '/var/www/html/ps16/themes/default-bootstrap/modules/blocksearch/blocksearch-top.tpl',
      1 => 1482157024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5052249058ad90c92e5d90-93839835',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a008196ec5763_56749932',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a008196ec5763_56749932')) {function content_5a008196ec5763_56749932($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class="col-sm-4 clearfix">
	<form id="searchbox" method="get" action="//localhost/ps16/index.php?controller=search" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Search" value="" />
		<button type="submit" name="submit_search" class="btn btn-default button-search">
			<span>Search</span>
		</button>
	</form>
</div>
<!-- /Block search module TOP --><?php }} ?>
