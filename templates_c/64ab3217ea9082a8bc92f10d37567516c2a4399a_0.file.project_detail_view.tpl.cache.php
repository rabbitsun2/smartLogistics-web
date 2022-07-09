<?php
/* Smarty version 4.1.1, created on 2022-07-03 17:15:22
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\mgt\project_detail_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c1501aad7147_97613115',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64ab3217ea9082a8bc92f10d37567516c2a4399a' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\mgt\\project_detail_view.tpl',
      1 => 1656836118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c1501aad7147_97613115 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '177350984062c1501aace1f5_55110291';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>프로젝트 상세</title>
	
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
	<link rel="stylesheet" href="../../css/style_main.css">

</head>
<body>

    <h3 class="project_list_detail_sub_title">프로젝트 상세</h3>
    <hr class="project_list_detail_sub_hr">
    <br>
        <table class="project_list_detail_view_tbl">
            <tr>
                <td colspan="3" text-align: center; background-color:#e2e2e2; ">
                    프로젝트번호/프로젝트명
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <?php
$__section_usr_item_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['project_item']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_usr_item_0_total = $__section_usr_item_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_usr_item'] = new Smarty_Variable(array());
if ($__section_usr_item_0_total !== 0) {
for ($__section_usr_item_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_usr_item']->value['index'] = 0; $__section_usr_item_0_iteration <= $__section_usr_item_0_total; $__section_usr_item_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_usr_item']->value['index']++){
?>
                        <?php echo $_smarty_tpl->tpl_vars['project_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item']->value['index'] : null)]['project_id'];?>
 / <?php echo $_smarty_tpl->tpl_vars['project_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item']->value['index'] : null)]['project_name'];?>

                    <?php
}
}
?>
                </td>
            </tr>

            <?php
$__section_usr_item2_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['project_file_item']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_usr_item2_1_total = $__section_usr_item2_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_usr_item2'] = new Smarty_Variable(array());
if ($__section_usr_item2_1_total !== 0) {
for ($__section_usr_item2_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index'] = 0; $__section_usr_item2_1_iteration <= $__section_usr_item2_1_total; $__section_usr_item2_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index']++){
?>
            <tr>
                <td style="width:15%;background-color:#e2e2e2;">
                    파일
                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index'] : null)]['original_name'];?>
 / <?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index'] : null)]['file_size'];?>
 
                </td>
                <td>
                    <a href="project?func=download&uuid=<?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index'] : null)]['uuid'];?>
">다운로드</a>
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table style="width:70%;">
                        <tr>
                            <td>
                                아이피주소
                            </td>
                            <td>
                                등록일자
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index'] : null)]['ip'];?>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['project_file_item']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_usr_item2']->value['index'] : null)]['regidate'];?>
 
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php
}
}
?>
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
