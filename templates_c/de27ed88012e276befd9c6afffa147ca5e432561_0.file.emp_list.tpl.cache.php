<?php
/* Smarty version 4.1.1, created on 2022-07-09 20:03:40
  from 'C:\wampp\apache2\htdocs\smartLogistics\view\main\core\emp_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c9608c3263d1_44856737',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de27ed88012e276befd9c6afffa147ca5e432561' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\smartLogistics\\view\\main\\core\\emp_list.tpl',
      1 => 1656758335,
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
function content_62c9608c3263d1_44856737 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '179053552862c9608c314405_19039497';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h3 class="sub_title">계정/사용자 관리</h3>
<hr class="sub_hr">

<!-- 결과 -->
<table class="output_result_tbl">
	<thead>
		<tr>
			<th style="width:7%">
				번호
			</th>
			<th style="width:10%">
				사원번호
			</th>
			<th style="width:10%">
				권한명
			</th>
			<th>
				사용자명
			</th>
			<th style="width:20%">
				등록일자
			</th>
			<th style="width:20%">
				수정일자
			</th>
			<th style="width:20%">
				비고
			</th>
		</tr>
	</thead>
	<tbody>
        <?php $_smarty_tpl->_assignInScope('counter', 1);?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['employeeList']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
		<tr>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['counter']->value++;?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['emp_no'];?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['auth_name'];?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['usrname'];?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['regidate'];?>

			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['modify_date'];?>

			</td>
			<td>
				<a href="employee?func=modify&idx=<?php echo $_smarty_tpl->tpl_vars['item']->value['emp_no'];?>
">수정</a>, 
                <a href="employee?func=delete&idx=<?php echo $_smarty_tpl->tpl_vars['item']->value['emp_no'];?>
">삭제</a>
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
