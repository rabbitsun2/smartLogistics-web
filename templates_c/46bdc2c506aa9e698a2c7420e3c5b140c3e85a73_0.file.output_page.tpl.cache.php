<?php
/* Smarty version 4.1.1, created on 2022-06-16 15:14:03
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\core\output_page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62aaca2b59ff12_93610644',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46bdc2c506aa9e698a2c7420e3c5b140c3e85a73' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\core\\output_page.tpl',
      1 => 1655360025,
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
function content_62aaca2b59ff12_93610644 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '203776060262aaca2b586549_42435405';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
				<h3 class="sub_title">생산/출고</h3>
				<hr class="sub_hr">
<!-- 검색 영역 -->
<!--
<table class="output_search_tbl">
	<tr>
		<td style="width:10%">
			품목명
		</td>
		<td style="width:70%">
			<input type="text" name="keyword" class="smart_input_search">
		</td>
		<td style="width:20%">
			<input type="submit" class="ui-button ui-widget ui-corner-all btn_submit" type="submit"
				value="검색" style="width: 100%;">
		</td>
	</tr>
</table>
-->

<!-- 결과 -->
<table class="output_result_tbl">
	<thead>
		<tr>
			<th style="width:10%">
				번호
			</th>
			<th style="width:15%">
				품목번호
			</th>
			<th style="width:35%">
				품목명
			</th>
			<th>
				사진
			</th>
			<th>
				입고일자
			</th>
			<th>
				현재수량
			</th>
			<th style="width:10%">
				비고
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['warehouseLogList']->value, 'w_item');
$_smarty_tpl->tpl_vars['w_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['w_item']->value) {
$_smarty_tpl->tpl_vars['w_item']->do_else = false;
?>
		<tr>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['w_item']->value['id'];?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['w_item']->value['w_id'];?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['w_item']->value['product_name'];?>

			</td>
			<td>
				<img src="../../pjt/images/<?php echo $_smarty_tpl->tpl_vars['w_item']->value['product_no'];?>
.png" style="width:120px; height:120px" alt="<?php echo $_smarty_tpl->tpl_vars['w_item']->value['product_description'];?>
">
			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['w_item']->value['create_date'];?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['w_item']->value['current_cnt'];?>

			</td>
			<td>
				<a href="factory?func=output&status=release&id=<?php echo $_smarty_tpl->tpl_vars['w_item']->value['id'];?>
">출고</a>
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
