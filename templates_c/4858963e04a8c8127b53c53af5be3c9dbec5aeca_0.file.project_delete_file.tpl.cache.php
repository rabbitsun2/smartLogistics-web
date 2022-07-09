<?php
/* Smarty version 4.1.1, created on 2022-07-03 16:39:29
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\mgt\project_delete_file.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c147b10b95a5_73622907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4858963e04a8c8127b53c53af5be3c9dbec5aeca' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\mgt\\project_delete_file.tpl',
      1 => 1656833964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62c147b10b95a5_73622907 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '42343160462c147b10ac328_90358622';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h3 class="sub_title">프로젝트 파일 삭제</h3>
<hr class="sub_hr">

<?php echo '<script'; ?>
 type="text/javascript">
    
    function goHistoryBack(id){
        location.replace('project?func=modify&id=' + id );
    }
<?php echo '</script'; ?>
>

<form action="project?func=modify" method="POST" enctype="multipart/form-data">

<?php
$__section_usr_item1_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['project_file_item']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_usr_item1_0_total = $__section_usr_item1_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_usr_item1'] = new Smarty_Variable(array());
if ($__section_usr_item1_0_total !== 0) {
for ($__section_usr_item1_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index'] = 0; $__section_usr_item1_0_iteration <= $__section_usr_item1_0_total; $__section_usr_item1_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index']++){
?>
<input type="hidden" name="project_id" value="<?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index'] : null)]['project_id'];?>
">
<input type="hidden" name="uuid" value="<?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index'] : null)]['uuid'];?>
">
<input type="hidden" name="func" value="file_delete">
<input type="hidden" name="srtype" value="submit">
<table class="project_delete_file_tbl">
    <tr>
        <td style="width:30%;background:#e2e2e2;"><?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index'] : null)]['original_name'];?>
</td>
    </tr>
    <tr>
        <td>
            <span>정말로 삭제하시겠습니까?</span>
        </td>
    </tr>
    <tr>
        <td>
            <input class="ui-button ui-widget ui-corner-all btn_submit" type="submit" 
					value="삭제" style="width:45%;">
            <a class="ui-button ui-widget ui-corner-all btn_submit"
                 onclick="goHistoryBack('<?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item1']->value['index'] : null)]['project_id'];?>
')"
                 style="width:40%;">이전</a>
        </td>
    </tr>
</table>
<?php
}
}
?>
</form>

				
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
