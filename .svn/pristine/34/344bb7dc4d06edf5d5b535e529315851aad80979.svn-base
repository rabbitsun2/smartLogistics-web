<?php
/* Smarty version 4.1.1, created on 2022-06-16 09:24:13
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\core\input_page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62aa782d680ba7_43157892',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8dacb6270b2c56e7839e9b6f8c6d37deb0c790c' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\core\\input_page.tpl',
      1 => 1655338466,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62aa782d680ba7_43157892 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '126673903362aa782d66fe85_53582015';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php echo '<script'; ?>
 type="text/javascript">
	  var openWin;
		function openChild(){
	    // window.name = "부모창 이름";
			window.name = "parentForm";
			// window.open("open할 window", "자식창 이름", "팝업창 옵션");
			openWin = window.open("factory?func=input&search=product",
		        "childForm", "width=570, height=350, resizable = no, scrollbars = no");
	}
	<?php echo '</script'; ?>
>

				<h3 class="sub_title">생산/입고</h3>
				<hr class="sub_hr">
				<br>
				<form action="factory?func=input" method="POST">
				<input type="hidden" name="func" value="input">
				<input type="hidden" name="srtype" value="submit">
				<div class="input_center">
				<table class="input_page_tbl">
					<tr>
						<td style="width:15%; text-align:center; background:#e2e2e2;">
							품목명
						</td>
						<td style="width:70%;">
							<input type="text" id="pInput_productName" name="productName" style="width:90%;" readonly>
						</td>
						<td>
							<input class="ui-button ui-widget ui-corner-all" type="button" 
								value="찾기" onclick="openChild()">
						</td>
					</tr>
					<tr>
						<td style="text-align:center;background:#e2e2e2;">
							품목코드
						</td>
						<td colspan="2">
							<input type="text" id="pInput_productCode" name="productCode" style="width:90%;" readonly>
						</td>
					</tr>
					<tr>
						<td style="text-align:center; background:#e2e2e2;">
							수량
						</td>
						<td colspan="2">
							<input type="number" name="productNum" style="width:90%;" min="0" max="100">
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<input class="ui-button ui-widget ui-corner-all btn_submit" type="submit" 
					value="입고" style="width:90%;">
						</td>
					</tr>
				</table>
				</div>
				</form>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
