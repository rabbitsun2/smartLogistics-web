<?php
/* Smarty version 4.1.1, created on 2022-06-25 20:10:42
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\mgt\input_search_result.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62b6ed3240a8a9_48093896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4cb490c23fd95d188c8097e1b6b03647ee99db4b' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\mgt\\input_search_result.tpl',
      1 => 1655360168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:paging.tpl' => 1,
  ),
),false)) {
function content_62b6ed3240a8a9_48093896 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '37069687562b6ed323f7315_89372485';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>검색 결과 - 품목 코드 찾기</title>
	
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

    <?php echo '<script'; ?>
 type="text/javascript">
        function setParentText(num){
            opener.document.getElementById("pInput_productCode").value = document.getElementById("cProduct_no_" + num).value
            opener.document.getElementById("pInput_productName").value = document.getElementById("cProduct_name_" + num).value
        }
    <?php echo '</script'; ?>
>

</head>
<body>
    
    <h3 class="sub_title">품목 검색</h3>
    <hr class="sub_hr">
    <br>
    <a href="javascript:history.back()">이전으로</a>
    <table class="ck_input_result_tbl">
        <tr>
            <td style="width:10%" class="head">
                품목코드
            </td>
            <td style="width:20%" class="head">
                품목명
            </td>
            <td style="width:15%" class="head">
                설명
            </td>
            <td class="head">
                사진
            </td>
            <td style="width:10%" class="head">
                등록일자
            </td>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productList']->value, 'productitem');
$_smarty_tpl->tpl_vars['productitem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['productitem']->value) {
$_smarty_tpl->tpl_vars['productitem']->do_else = false;
?>
        <tr>
            <td>
                <input type="hidden" id="cProduct_no_<?php echo $_smarty_tpl->tpl_vars['productitem']->value['product_no'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['productitem']->value['product_no'];?>
">
                <?php echo $_smarty_tpl->tpl_vars['productitem']->value['product_no'];?>

            </td>
            <td>
                <input type="hidden" id="cProduct_name_<?php echo $_smarty_tpl->tpl_vars['productitem']->value['product_no'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['productitem']->value['product_name'];?>
">
                <a href="#" onclick="setParentText(<?php echo $_smarty_tpl->tpl_vars['productitem']->value['product_no'];?>
)"><?php echo $_smarty_tpl->tpl_vars['productitem']->value['product_name'];?>
</a>
            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['productitem']->value['description'];?>

            </td>
            <td>
                <img src="../../pjt/images/<?php echo $_smarty_tpl->tpl_vars['productitem']->value['product_no'];?>
.png" style="width:120px; height:120px;" alt="<?php echo $_smarty_tpl->tpl_vars['productitem']->value['description'];?>
">
            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['productitem']->value['regidate'];?>

            </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
    
    <!-- 페이징 영역 -->
    <div style="text-align:center;">
    <?php $_smarty_tpl->_subTemplateRender("file:paging.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <br>
    
    <input type="button" value="창닫기" onclick="window.close()">
    </div>

    <!--
    <br><br>
        <input type="text" id="cInput">
            <input type="button" value="전달하기" onclick="setParentText()">
    <br><br>
    -->


</body>
</html><?php }
}
