<?php
/* Smarty version 4.1.1, created on 2022-06-18 19:43:49
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\mgt\main_notice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62adac650fc840_83538591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c94fa7217cabe143cf26f5d797d609c6fe27ff9' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\mgt\\main_notice.tpl',
      1 => 1655415878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62adac650fc840_83538591 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '97938976262adac6509aa12_46072830';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3 class="sub_title">실시간 현황</h3>
<hr class="sub_hr">
<table>
	<tr>
		<td style="width:450px;">
			<div class="chart_title">입출고 현황</div>
			<hr class="chart_hr">
			<div class="chart_range_date">기간: <?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
 ~ <?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
</div>
			<br>
			<div id='chart1'></div>
		</td>
		<td style="width:450px;">
			<div class="chart_title">장비 가동 현황</div>
			<hr class="chart_hr">
			<div class="chart_range_date">기간: <?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
 ~ <?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
</div>
			<br>
			<div id='chart2'></div>
		</td>
	</tr>
</table>

<!-- 차트 -->
<?php echo '<script'; ?>
 type="text/javascript">
	var generate1 = function () { 
		return c3.generate({
			bindto: '#chart1',
			data: {
			columns: [
				['입고', <?php echo $_smarty_tpl->tpl_vars['sum_of_input']->value;?>
],
				['출고', <?php echo $_smarty_tpl->tpl_vars['sum_of_output']->value;?>
]
			],
			type: 'bar'
			},
			bar: {
			space: 0.25
			}
		}); 
	},
	chart1 = generate1();
	
	var generate2 = function () { 
		return c3.generate({
			bindto: '#chart2',
			data: {
			columns: [
				['로봇팔1', 30, 200, 100],
				['로봇팔2', 0, 0, 0]
			],
			type: 'bar'
			},
			bar: {
			space: 0.25
			}
		}); 
	},
	chart2 = generate2();
	
<?php echo '</script'; ?>
>
				
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
