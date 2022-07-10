<?php
/* Smarty version 4.1.1, created on 2022-07-10 21:37:35
  from 'C:\wampp\apache2\htdocs\smartLogistics\view\main\mgt\product_register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62cac80f4c1e36_90357555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da5dddcc1fe9fa7db6efa48637a7e34e5051b932' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\smartLogistics\\view\\main\\mgt\\product_register.tpl',
      1 => 1657456610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62cac80f4c1e36_90357555 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '164315581162cac80f465651_47187214';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
    var openWin;
    function openChild(){

        var popupWidth = 950;
        var popupHeight = 500;

        var popupX = (window.screen.width / 2) - (popupWidth / 2);
        // 만들 팝업창 width 크기의 1/2 만큼 보정값으로 빼주었음

        var popupY= (window.screen.height / 2) - (popupHeight / 2);
        // 만들 팝업창 height 크기의 1/2 만큼 보정값으로 빼주었음

        // window.name = "부모창 이름";
        window.name = "parentForm";
        // window.open("open할 window", "자식창 이름", "팝업창 옵션");
        openWin = window.open("product?func=input&search=project",
            "childForm", "width=" + popupWidth + ", height=" + popupHeight + 
            "left="+ popupX + ", top=" + popupY + ", resizable = no, scrollbars = no");
    }
<?php echo '</script'; ?>
>

<h3 class="sub_title">제품 등록</h3>
<hr class="sub_hr">
<form action="product?func=register" method="POST" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $_smarty_tpl->tpl_vars['MAX_FILE_SIZE']->value;?>
" />
<input type="hidden" name="func" value="input">
<input type="hidden" name="srtype" value="submit">
<table class="product_register_tbl">
    <tr>
        <td style="width:30%;background:#e2e2e2;">프로젝트 번호</td>
        <td style="width:50%;">
            <input type="text" id="pInput_project_id" name="project_id" style="width:90%;" readonly>
        </td>  
        <td>
            <input class="ui-button ui-widget ui-corner-all" type="button" 
                value="찾기" onclick="openChild()">
        </td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">프로젝트 명</td>
        <td colspan="2">
            <input type="text" id="pInput_project_name" name="project_name" style="width:90%;" readonly>
        </td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">제품명</td>
        <td colspan="2">
            <input type="text" name="product_name" style="width:90%;">
        </td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">설명</td>
        <td colspan="2">
            <textarea name="description" rows="5" cols="35"></textarea>
        </td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">파일1</td>
        <td colspan="2">
            <input type="file" name="usrupload[]" style="width:90%;" multiple="multiple">
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <input class="ui-button ui-widget ui-corner-all btn_submit" type="submit" 
					value="등록" style="width:90%;">
        </td>
    </tr>
</table>
</form>
				
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
