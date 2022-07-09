<?php
/* Smarty version 4.1.1, created on 2022-07-02 19:16:00
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\core\emp_modify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c01ae0c35e93_55656399',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee7afb4497ebe1f2d4c31cb16e6deb9293efaab6' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\core\\emp_modify.tpl',
      1 => 1656756950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62c01ae0c35e93_55656399 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '21759608762c01ae0c27c48_43289029';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h3 class="sub_title">계정/사용자 수정</h3>
<hr class="sub_hr">
<form action="employee?func=modify" method="POST">
<?php
$__section_usr_auth_item_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['emp_item']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_usr_auth_item_0_total = $__section_usr_auth_item_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item'] = new Smarty_Variable(array());
if ($__section_usr_auth_item_0_total !== 0) {
for ($__section_usr_auth_item_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index'] = 0; $__section_usr_auth_item_0_iteration <= $__section_usr_auth_item_0_total; $__section_usr_auth_item_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index']++){
?>
<input type="hidden" name="idx" value="<?php echo $_smarty_tpl->tpl_vars['emp_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index'] : null)]['emp_no'];?>
">
<?php
}
}
?>
<input type="hidden" name="func" value="modify">
<input type="hidden" name="srtype" value="submit">
<table class="emp_modify_tbl">
    <tr>
        <td style="width:40%;background:#e2e2e2;">권한</td>
        <td>
            <select name="emp_auth" style="width:90%;">
            <?php
$__section_usr_auth_item_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['emp_item']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_usr_auth_item_1_total = $__section_usr_auth_item_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item'] = new Smarty_Variable(array());
if ($__section_usr_auth_item_1_total !== 0) {
for ($__section_usr_auth_item_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index'] = 0; $__section_usr_auth_item_1_iteration <= $__section_usr_auth_item_1_total; $__section_usr_auth_item_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index']++){
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['emp_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index'] : null)]['emp_auth'];?>
"><?php echo $_smarty_tpl->tpl_vars['emp_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index'] : null)]['auth_name'];?>
</option>
            <?php
}
}
?>
            <?php
$__section_emp_auth_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['emp_auth_list']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_emp_auth_2_total = $__section_emp_auth_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_emp_auth'] = new Smarty_Variable(array());
if ($__section_emp_auth_2_total !== 0) {
for ($__section_emp_auth_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_emp_auth']->value['index'] = 0; $__section_emp_auth_2_iteration <= $__section_emp_auth_2_total; $__section_emp_auth_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_emp_auth']->value['index']++){
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['emp_auth_list']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_emp_auth']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_emp_auth']->value['index'] : null)]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['emp_auth_list']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_emp_auth']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_emp_auth']->value['index'] : null)]['auth_name'];?>
</option>
            <?php
}
}
?>
            </select>
        </td>
    </tr>
    
    <?php
$__section_usr_auth_item_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['emp_item']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_usr_auth_item_3_total = $__section_usr_auth_item_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item'] = new Smarty_Variable(array());
if ($__section_usr_auth_item_3_total !== 0) {
for ($__section_usr_auth_item_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index'] = 0; $__section_usr_auth_item_3_iteration <= $__section_usr_auth_item_3_total; $__section_usr_auth_item_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index']++){
?>
    <tr>
        <td style="background:#e2e2e2;">성명</td>
        <td><input type="text" name="usrname" style="width:90%;" value="<?php echo $_smarty_tpl->tpl_vars['emp_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_auth_item']->value['index'] : null)]['usrname'];?>
"></td>
    </tr>
    <?php
}
}
?>
    <tr>
        <td style="background:#e2e2e2;">비밀번호</td>
        <td><input type="password" name="passwd" style="width:90%;"></td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">신규 비밀번호</td>
        <td><input type="password" name="passwd1" style="width:90%;"></td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">신규 비밀번호 확인</td>
        <td><input type="password" name="passwd2" style="width:90%;"></td>
    </tr>
    <tr>
        <td colspan="2">
            <input class="ui-button ui-widget ui-corner-all btn_submit" type="submit" 
					value="수정" style="width:90%;">
        </td>
    </tr>
</table>
</form>
				
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
