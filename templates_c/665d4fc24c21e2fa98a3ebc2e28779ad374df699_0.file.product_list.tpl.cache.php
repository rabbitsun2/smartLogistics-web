<?php
/* Smarty version 4.1.1, created on 2022-07-03 08:16:55
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\mgt\product_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c0d1e701ccb2_47025357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '665d4fc24c21e2fa98a3ebc2e28779ad374df699' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\mgt\\product_list.tpl',
      1 => 1656064292,
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
function content_62c0d1e701ccb2_47025357 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '62284697462c0d1e6e408a2_03354314';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
				<h3 class="sub_title">프로젝트(제품) / 제품 현황</h3>
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
