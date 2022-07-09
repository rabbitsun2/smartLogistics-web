<?php
/* Smarty version 4.1.1, created on 2022-07-03 15:39:54
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\mgt\project_register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c139ba4a7949_67781792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '600db5c6770c64b04e654a608aed831488650453' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\mgt\\project_register.tpl',
      1 => 1656830298,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62c139ba4a7949_67781792 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '128571362262c139ba49e978_95067452';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h3 class="sub_title">프로젝트 등록</h3>
<hr class="sub_hr">
<form action="project?func=register" method="POST" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $_smarty_tpl->tpl_vars['MAX_FILE_SIZE']->value;?>
" />
<input type="hidden" name="func" value="input">
<input type="hidden" name="srtype" value="submit">
<table class="project_register_tbl">
    <tr>
        <td style="width:30%;background:#e2e2e2;">프로젝트명</td>
        <td>
            <input type="text" name="project_name" style="width:90%;">
        </td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">설명</td>
        <td>
            <textarea name="description" style="width:90%;"></textarea>
        </td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">시작일자</td>
        <td><input type="datetime-local" name="startdate" style="width:90%;"></td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">종료일자</td>
        <td><input type="datetime-local" name="enddate" style="width:90%;"></td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">파일1</td>
        <td><input type="file" name="usrupload[]" style="width:90%;" multiple="multiple"></td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">파일2</td>
        <td><input type="file" name="usrupload[]" style="width:90%;" multiple="multiple"></td>
    </tr>
    <tr>
        <td colspan="2">
            <input class="ui-button ui-widget ui-corner-all btn_submit" type="submit" 
					value="등록" style="width:90%;">
        </td>
    </tr>
</table>
</form>
				
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
