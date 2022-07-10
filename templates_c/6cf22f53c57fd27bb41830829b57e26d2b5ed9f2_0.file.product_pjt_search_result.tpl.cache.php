<?php
/* Smarty version 4.1.1, created on 2022-07-10 18:05:51
  from 'C:\wampp\apache2\htdocs\smartLogistics\view\main\mgt\product_pjt_search_result.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62ca966fc43b86_46267414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6cf22f53c57fd27bb41830829b57e26d2b5ed9f2' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\smartLogistics\\view\\main\\mgt\\product_pjt_search_result.tpl',
      1 => 1657443941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:paging.tpl' => 1,
  ),
),false)) {
function content_62ca966fc43b86_46267414 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '18639009162ca966fc35d43_73713060';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>검색 결과 - 프로젝트 코드 찾기</title>
	
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
	<link rel="stylesheet" href="../../css/style_product_pjtSearch.css">

    <?php echo '<script'; ?>
 type="text/javascript">
        function setParentText(num){
            //alert( '참' );
            //alert( document.getElementById("cProject_name_" + num).value );
            opener.document.getElementById("pInput_project_no").value = document.getElementById("cProject_no_" + num).value;
            opener.document.getElementById("pInput_project_name").value = document.getElementById("cProject_name_" + num).value;
            
        }
    <?php echo '</script'; ?>
>

</head>
<body>
    
    <h3 class="sub_title">프로젝트 검색</h3>
    <hr class="sub_hr">
    <br>
    <a href="javascript:history.back()">이전으로</a>
    <table class="ck_input_result_tbl">
        <tr>
            <td style="width:15%" class="head">
                프로젝트 번호
            </td>
            <td class="head">
                프로젝트명
            </td>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['projectList']->value, 'projectitem');
$_smarty_tpl->tpl_vars['projectitem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['projectitem']->value) {
$_smarty_tpl->tpl_vars['projectitem']->do_else = false;
?>
        <tr>
            <td>
                <input type="hidden" id="cProject_no_<?php echo $_smarty_tpl->tpl_vars['projectitem']->value['project_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['projectitem']->value['project_id'];?>
">
                <?php echo $_smarty_tpl->tpl_vars['projectitem']->value['project_id'];?>

            </td>
            <td>
                <input type="hidden" id="cProject_name_<?php echo $_smarty_tpl->tpl_vars['projectitem']->value['project_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['projectitem']->value['project_name'];?>
">
                <a href="#" onclick="setParentText(<?php echo $_smarty_tpl->tpl_vars['projectitem']->value['project_id'];?>
)"><?php echo $_smarty_tpl->tpl_vars['projectitem']->value['project_name'];?>
</a>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table class="ck_input_result_detail_tbl">
                    <tr>
                        <td style="background-color:#e2e2e2;">
                             시작일자
                        </td>
                        <td style="background-color:#e2e2e2;">
                             종료일자
                        </td>
                        <td style="background-color:#e2e2e2;">
                             등록일자
                        </td>
                    </tr>
                    <tr>
                        <td>
                             <?php echo $_smarty_tpl->tpl_vars['projectitem']->value['startdate'];?>

                        </td>
                        <td>
                             <?php echo $_smarty_tpl->tpl_vars['projectitem']->value['enddate'];?>

                        </td>
                        <td>
                             <?php echo $_smarty_tpl->tpl_vars['projectitem']->value['regidate'];?>

                        </td>
                    </tr>
                </table>
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
