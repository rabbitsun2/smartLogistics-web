<?php
/* Smarty version 4.1.1, created on 2022-07-03 17:17:23
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\mgt\project_modify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c1509301a543_81989937',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b11c6250387a3094cc583e0efd1bd79538af238' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\mgt\\project_modify.tpl',
      1 => 1656836239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62c1509301a543_81989937 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '26597536962c15092f3e406_56678660';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h3 class="sub_title">프로젝트 수정</h3>
<hr class="sub_hr">
<form action="project?func=modify" method="POST" enctype="multipart/form-data">

<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $_smarty_tpl->tpl_vars['MAX_FILE_SIZE']->value;?>
" />
<?php
$__section_usr_item1_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['project_item']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_usr_item1_0_total = $__section_usr_item1_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_usr_item1'] = new Smarty_Variable(array());
if ($__section_usr_item1_0_total !== 0) {
for ($__section_usr_item1_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index'] = 0; $__section_usr_item1_0_iteration <= $__section_usr_item1_0_total; $__section_usr_item1_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index']++){
?>
<input type="hidden" name="project_id" value="<?php echo $_smarty_tpl->tpl_vars['project_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index'] : null)]['project_id'];?>
">
<input type="hidden" name="func" value="modify">
<input type="hidden" name="srtype" value="submit">
<table class="project_modify_tbl">
    <tr>
        <td style="width:30%;background:#e2e2e2;">프로젝트명</td>
        <td>
            <input type="text" name="project_name" style="width:90%;" value="<?php echo $_smarty_tpl->tpl_vars['project_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index'] : null)]['project_name'];?>
">
        </td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">설명</td>
        <td>
            <textarea name="description" style="width:90%;"><?php echo $_smarty_tpl->tpl_vars['project_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index'] : null)]['description'];?>
</textarea>
        </td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">시작일자</td>
        <td><input type="datetime-local" name="startdate" style="width:90%;" value="<?php echo $_smarty_tpl->tpl_vars['project_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index'] : null)]['startdate'];?>
"></td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">종료일자</td>
        <td><input type="datetime-local" name="enddate" style="width:90%;" value="<?php echo $_smarty_tpl->tpl_vars['project_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index'] : null)]['enddate'];?>
"></td>
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
					value="수정" style="width:90%;">
        </td>
    </tr>
</table>
<?php
}
}
?>
</form>
<br>

<h3 class="sub_title">파일 목록</h3>
<hr class="sub_hr">

<table class="project_modify_tbl">
    <?php
$__section_usr_item2_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['project_file_item']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_usr_item2_1_total = $__section_usr_item2_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_usr_item2'] = new Smarty_Variable(array());
if ($__section_usr_item2_1_total !== 0) {
for ($__section_usr_item2_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index'] = 0; $__section_usr_item2_1_iteration <= $__section_usr_item2_1_total; $__section_usr_item2_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index']++){
?>
    <tr>
        <td style="width:10%; background:#e2e2e2;">파일</td>
        <td>
            <a href="project?func=download&uuid=<?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index'] : null)]['uuid'];?>
"><?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index'] : null)]['original_name'];?>
</a> / (<?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index'] : null)]['file_size'];?>
)
        </td>
        <td style="width:10%;">
            <a href="project?func=download&uuid=<?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index'] : null)]['uuid'];?>
&project_id=<?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index'] : null)]['project_id'];?>
&page=delete">삭제</a>
        </td>
    </tr>
    <?php
}
}
?>
</table>
				
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
