<?php
/* Smarty version 4.1.1, created on 2022-07-10 21:21:50
  from 'C:\wampp\apache2\htdocs\smartLogistics\view\main\mgt\product_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62cac45e09a081_84336807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5af51aa89d8e5e14f925f26c511c113b89500220' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\smartLogistics\\view\\main\\mgt\\product_list.tpl',
      1 => 1657455702,
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
function content_62cac45e09a081_84336807 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '23501984662cac45e090b85_19418774';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<?php echo '<script'; ?>
 type="text/javascript">
	  	var openWin;

		function openChild(id){

			var popupWidth = 680;
			var popupHeight = 350;

			var popupX = (window.screen.width / 2) - (popupWidth / 2);
			// 만들 팝업창 width 크기의 1/2 만큼 보정값으로 빼주었음

			var popupY= (window.screen.height / 2) - (popupHeight / 2);
			// 만들 팝업창 height 크기의 1/2 만큼 보정값으로 빼주었음

	    	// window.name = "부모창 이름";
			window.name = "parentForm";
			// window.open("open할 window", "자식창 이름", "팝업창 옵션");
			openWin = window.open("product?func=list&id=" + id + "&option=detail_view" ,
		        "childForm", "width=" + popupWidth + ", height=" + popupHeight + 
				"left="+ popupX + ", top=" + popupY + ", resizable = no, scrollbars = no");
		}

	<?php echo '</script'; ?>
>
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
				기능
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
				<a href="#" onclick="openChild(<?php echo $_smarty_tpl->tpl_vars['u_item']->value['product_no'];?>
)">상세보기</a>
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
