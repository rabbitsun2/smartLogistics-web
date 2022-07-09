<?php
/* Smarty version 4.1.1, created on 2022-06-16 15:06:04
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\core\output_release.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62aac84c2591b7_90724196',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c9a3c3972c0af8bf695b39f234b16f2390ba9b3' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\core\\output_release.tpl',
      1 => 1655359561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62aac84c2591b7_90724196 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '162410902362aac84c23b037_95072354';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
				<h3 class="sub_title">생산/출고 - 출고 작업</h3>
				<hr class="sub_hr">
<!-- 검색 영역 -->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['warehouse_rows']->value, 'w_item');
$_smarty_tpl->tpl_vars['w_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['w_item']->value) {
$_smarty_tpl->tpl_vars['w_item']->do_else = false;
?>
<form action="factory?func=output&status=w_ok&id=<?php echo $_smarty_tpl->tpl_vars['w_item']->value['id'];?>
" method="POST">
<input type="hidden" name="w_log_id" value="<?php echo $_smarty_tpl->tpl_vars['w_item']->value['id'];?>
">
<input type="hidden" name="prev_w_id" value="<?php echo $_smarty_tpl->tpl_vars['w_item']->value['prev_w_id'];?>
">
<table class="output_release_tbl">
	<tr>
		<td style="width:20%; background:#e6e6e6">
			품목코드
		</td>
		<td>
			<input type="text" name="w_id" readonly class="smart_input_release" value="<?php echo $_smarty_tpl->tpl_vars['w_item']->value['w_id'];?>
">
		</td>
	</tr>
	<tr>
		<td style="width:20%; background:#e6e6e6">
			품목명
		</td>
		<td>
			<input type="text" name="product_name" readonly class="smart_input_release" value="<?php echo $_smarty_tpl->tpl_vars['w_item']->value['product_name'];?>
">
		</td>
	</tr>
	<tr>
		<td style="width:20%; background:#e6e6e6;">
			현재 수량
		</td>
		<td>
			<input type="number" name="prev_cnt" class="smart_input_release" readonly value="<?php echo $_smarty_tpl->tpl_vars['w_item']->value['current_cnt'];?>
">
		</td>
	</tr>
	<tr>
		<td style="width:20%; background:#e6e6e6; ">
			출고 수량
		</td>
		<td>
			<input type="number" name="release_cnt" class="smart_input_release" min="0" max="<?php echo $_smarty_tpl->tpl_vars['w_item']->value['current_cnt'];?>
">
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input class="ui-button ui-widget ui-corner-all btn_submit" type="submit" 
					value="출고" style="width:70%;">
		</td>
	</tr>
</table>
</form>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
