<?php
/* Smarty version 4.1.1, created on 2022-06-18 19:38:02
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62adab0a7f4fa6_04511881',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb21a6c4543dc828f86d68f8b2b3fbe0c340ec30' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\index.tpl',
      1 => 1655360550,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62adab0a7f4fa6_04511881 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '129761697362adab0a77af65_66827258';
?>
<html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./library/jquery-ui-1.13.1.custom/jquery-ui.css">
  	<?php echo '<script'; ?>
 src="./library/jquery/jquery-3.6.0.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="./library/jquery-ui-1.13.1.custom/jquery-ui.js"><?php echo '</script'; ?>
>

</head>
<body>
	<form action="index.php/employee/login" method="POST">
	<table class="smart_tbl">
		<tr>
			<td colspan="3" style="text-align:center;">
				<div class="txt_logo">Smart Logistics</div>
			</td>
		</tr>
		<tr>
			<td>
				<img src="./images/logo.png" alt="로고">
			</td>
			<td colspan="2">
				<img src="./images/picture_smartlogistics.png" alt="그림">
			</td>
		</tr>
		<tr>
			<td>
				
			</td>
			<td class="login_td" style="text-align:center;">
				<span class="txt_span">사원번호</span>
			</td>
			<td class="login_td">
				<input type="text" name="emp_no" style="width:100%">
			</td>
		</tr>
		<tr>
			<td>
				
			</td>
			<td class="login_td" style="text-align:center;">
				<span class="txt_span">비밀번호</span>
			</td>
			<td class="login_td">
				<input type="password" name="passwd" style="width:100%">
			</td>
		</tr>
		<tr>
			<td>
				
			</td>
			<td class="login_td" colspan="2">
				<input class="ui-button ui-widget ui-corner-all btn_submit" type="submit" 
					value="로그인" style="width:100%;">
			</td>
		</tr>
		<tr>
			<td colspan="3">
				Copyright &copy; 2022. XOR파이 All Right Reserved.
			</td>
		</tr>
	</table>
	</form>
</body>
</html><?php }
}
