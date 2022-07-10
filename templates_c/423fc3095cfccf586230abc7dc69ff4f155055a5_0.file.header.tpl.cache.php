<?php
/* Smarty version 4.1.1, created on 2022-07-10 16:49:30
  from 'C:\wampp\apache2\htdocs\smartLogistics\view\main\mgt\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62ca848aa13dd2_19105184',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '423fc3095cfccf586230abc7dc69ff4f155055a5' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\smartLogistics\\view\\main\\mgt\\header.tpl',
      1 => 1657439363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62ca848aa13dd2_19105184 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '142858211662ca848aa0c738_60940456';
?>
<html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../css/style_main.css">
	<link rel="stylesheet" href="../../library/c3/c3.css">
	<?php echo '<script'; ?>
 src="../../library/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../../library/c3/c3.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../../library/d3/d3.v5.min.js"><?php echo '</script'; ?>
>
	
	<link rel="stylesheet" href="../../library/jquery-ui-1.13.1.custom/jquery-ui.css">
  	<?php echo '<script'; ?>
 src="../../library/jquery/jquery-3.6.0.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../../library/jquery-ui-1.13.1.custom/jquery-ui.js"><?php echo '</script'; ?>
>
</head>
<body>
	<table class="smart_main_tbl">
		<!-- 상단 -->
		<tr>
			<td style="width:20%">
				<!-- 로고 -->
				<table style="width:100%;">
					<tr>
						<td style="width:30%; text-align:center;">
							<img src="../../images/logo.png" width="40%" height="40%" alt="로고">
						</td>
						<td>
							<div class="txt_Logo">스마트 물류 관리 시스템</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<div class="txt_Mode">[운영 / 개발]</div>
						</td>
					</tr>
				</table>
			</td>
			<td style="text-align:right">
				<?php echo $_smarty_tpl->tpl_vars['session_auth_name']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['session_usrname']->value;?>
님 <a href="../../index.php/employee/logout">로그아웃</a>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="menu_bar">
				<ul>
					<li>
						<a href="main">메인</a>
					</li>
					<li>
						<a href="config">설정</a>
					</li>
				</ul>
			</td>
		</tr>
		<!-- 본문 -->
		<tr>
			<td class="sub_menu">
				<ul>
					<li>
						<div class="sub_title">1. 물류</div>
						<ul>
							<li>
								<div class="sub_m1">
									<a href="logistics?func=input">입고</a>
								</div>
							</li>
							<li>
								<div class="sub_m1">
									<a href="logistics?func=output">출고</a>
								</div>
							</li>
						</ul>
					</li>
					<li>
						<div class="sub_title">2. 프로젝트/제품</div>
						<ul>
							<li>
								<div class="sub_m1">
									<a href="project?func=list">프로젝트 현황</a>
								</div>
							</li>
							<li>
								<div class="sub_m1">
									<a href="project?func=register">프로젝트 등록</a>
								</div>
							</li>
							<li>
								<div class="sub_m1">
									<a href="product?func=list">제품 현황</a>
								</div>
							</li>
							<li>
								<div class="sub_m1">
									<a href="product?func=register">제품 등록</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</td>
			
			<td class="main" style="border:1px solid #e2e2e2;vertical-align:top;"><?php }
}
