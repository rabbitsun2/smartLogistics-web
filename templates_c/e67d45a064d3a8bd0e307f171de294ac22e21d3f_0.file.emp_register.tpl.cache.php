<?php
/* Smarty version 4.1.1, created on 2022-07-09 20:03:19
  from 'C:\wampp\apache2\htdocs\smartLogistics\view\main\core\emp_register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c960770ab9a9_76229724',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e67d45a064d3a8bd0e307f171de294ac22e21d3f' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\smartLogistics\\view\\main\\core\\emp_register.tpl',
      1 => 1655553016,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62c960770ab9a9_76229724 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '93267358362c960770a0152_25764900';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h3 class="sub_title">계정/사용자 등록</h3>
<hr class="sub_hr">
<form action="employee?func=register" method="POST">
<input type="hidden" name="func" value="input">
<input type="hidden" name="srtype" value="submit">
<table class="emp_register_tbl">
    <tr>
        <td style="width:30%;background:#e2e2e2;">권한</td>
        <td>
            <select name="emp_auth" style="width:90%;">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['emp_auth_list']->value, 'emp_item');
$_smarty_tpl->tpl_vars['emp_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['emp_item']->value) {
$_smarty_tpl->tpl_vars['emp_item']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['emp_item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['emp_item']->value['auth_name'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">성명</td>
        <td><input type="text" name="usrname" style="width:90%;"></td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">비밀번호</td>
        <td><input type="password" name="passwd1" style="width:90%;"></td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">비밀번호 확인</td>
        <td><input type="password" name="passwd2" style="width:90%;"></td>
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
