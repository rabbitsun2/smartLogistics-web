<?php
/* Smarty version 4.1.1, created on 2022-07-09 20:02:09
  from 'C:\wampp\apache2\htdocs\smartLogistics\view\main\mgt\main_notice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c960311ec440_00426756',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d6c6c331c5aa1c6899cdecf8d46663cf3615ab2' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\smartLogistics\\view\\main\\mgt\\main_notice.tpl',
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
function content_62c960311ec440_00426756 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '41107509662c960311ded57_28352452';
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
