<?php
/* Smarty version 4.1.1, created on 2022-07-02 19:53:13
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\core\emp_delete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c02399a5ca01_21422898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a38610973c79127f6f70a629c7079ed61e08329' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\core\\emp_delete.tpl',
      1 => 1656759190,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62c02399a5ca01_21422898 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '82793760962c02399a507c2_35003286';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h3 class="sub_title">계정/사용자 삭제</h3>
<hr class="sub_hr">
<?php
$__section_usr_auth_item_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['emp_item']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_usr_auth_item_0_total = $__section_usr_auth_item_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item'] = new Smarty_Variable(array());
if ($__section_usr_auth_item_0_total !== 0) {
for ($__section_usr_auth_item_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index'] = 0; $__section_usr_auth_item_0_iteration <= $__section_usr_auth_item_0_total; $__section_usr_auth_item_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index']++){
?>
<form action="employee?func=delete" method="POST">
<input type="hidden" name="idx" value="<?php echo $_smarty_tpl->tpl_vars['emp_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index'] : null)]['emp_no'];?>
">
<input type="hidden" name="func" value="delete">
<input type="hidden" name="srtype" value="submit">
<table class="emp_delete_tbl">
    <tr>
        <td style="width:40%;background:#e2e2e2;">사원번호</td>
        <td>
            <?php echo $_smarty_tpl->tpl_vars['emp_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index'] : null)]['emp_no'];?>

        </td>
    </tr>
    <tr>
        <td style="width:40%;background:#e2e2e2;">권한</td>
        <td>
            <?php echo $_smarty_tpl->tpl_vars['emp_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index'] : null)]['auth_name'];?>

        </td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">성명</td>
        <td><?php echo $_smarty_tpl->tpl_vars['emp_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index'] : null)]['usrname'];?>
</td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">비밀번호</td>
        <td><input type="password" name="passwd" style="width:90%;"></td>
    </tr>
    <tr>
        <td colspan="2">
            <input class="ui-button ui-widget ui-corner-all btn_submit" type="submit" 
					value="삭제" style="width:90%;">
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
