<?php
/* Smarty version 4.1.1, created on 2022-06-16 15:13:57
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\core\item_status_page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62aaca25eb8cf9_17366616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55bfb279772056ee716a1c407fc616d4a9cc8d98' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\core\\item_status_page.tpl',
      1 => 1655360015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:paging.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62aaca25eb8cf9_17366616 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '91611415162aaca25e94d05_81858612';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
				<h3 class="sub_title">제품 / 물품 현황</h3>
				<hr class="sub_hr">

<table class="item_status_tbl">
	<thead>
		<tr>
			<th style="width:10%">
				제품번호
			</th>
			<th style="width:15%">
				제품명
			</th>
			<th style="width:35%">
				설명
			</th>
			<th>
				사진
			</th>
			<th>
				등록일자
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productList']->value, 'u_item');
$_smarty_tpl->tpl_vars['u_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u_item']->value) {
$_smarty_tpl->tpl_vars['u_item']->do_else = false;
?>
		<tr>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['u_item']->value['product_no'];?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['u_item']->value['product_name'];?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['u_item']->value['description'];?>

			</td>
			<td>
				<img src="../../pjt/images/<?php echo $_smarty_tpl->tpl_vars['u_item']->value['product_no'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['u_item']->value['description'];?>
" style="width:120px;height:120px;">
			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['u_item']->value['regidate'];?>

			</td>
		</tr>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</tbody>
</table>

<div style="text-align:center;">
<!-- 페이징 영역 -->
<?php $_smarty_tpl->_subTemplateRender("file:paging.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
