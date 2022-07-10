<?php
/* Smarty version 4.1.1, created on 2022-07-10 17:09:57
  from 'C:\wampp\apache2\htdocs\smartLogistics\view\main\mgt\input_search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62ca8955a939c6_34541161',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7391477620c4d16aa799864e287ebcb0af574fdd' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\smartLogistics\\view\\main\\mgt\\input_search.tpl',
      1 => 1657362120,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62ca8955a939c6_34541161 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '64327834662ca8955a7f360_09754101';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>품목 코드 찾기</title>
	
	<?php echo '<script'; ?>
 src="../../library/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="../../library/jquery-ui-1.13.1.custom/jquery-ui.css">
  	<?php echo '<script'; ?>
 src="../../library/jquery/jquery-3.6.0.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../../library/jquery-ui-1.13.1.custom/jquery-ui.js"><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="../../css/style_inputSearch.css">

</head>
<body>

    <h3 class="sub_title">품목 검색</h3>
    <hr class="sub_hr">
    <br>
    <form action="logistics" method="GET">
        <input type="hidden" name="func" value="input">
        <input type="hidden" name="search" value="product">

        <table class="ck_input_table">
            <tr>
                <td style="width: 15%; text-align: center; ">
                    검색어
                </td>
                <td style="width:70%; text-align: center;">
                    <input type="text" name="keyword" value="" style="width: 80%;">
                </td>
                <td>
                    <input type="submit" class="ui-button ui-widget ui-corner-all btn_submit" type="submit"
                        value="검색">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="button" class="ui-button ui-widget ui-corner-all btn_submit"
                     value="창닫기" onclick="window.close()" style="width:100%;">
                </td>
            </tr>
        </table>
        
    </form>
</body>
</html><?php }
}
