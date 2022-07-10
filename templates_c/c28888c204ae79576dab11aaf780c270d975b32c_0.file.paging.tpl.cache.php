<?php
/* Smarty version 4.1.1, created on 2022-07-09 20:03:40
  from 'C:\wampp\apache2\htdocs\smartLogistics\view\main\core\paging.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c9608c39e7f8_37017284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c28888c204ae79576dab11aaf780c270d975b32c' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\smartLogistics\\view\\main\\core\\paging.tpl',
      1 => 1655101474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c9608c39e7f8_37017284 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '110644390462c9608c398bb2_53760601';
?>
<div class="paginate">
    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['pagingObj']->value['firstPageNo'];
echo $_smarty_tpl->tpl_vars['fn']->value;?>
" class="first">처음 페이지</a>
    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['pagingObj']->value['prevPageNo'];
echo $_smarty_tpl->tpl_vars['fn']->value;?>
" class="prev">이전 페이지</a>
    <span>
        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pagingObj']->value['endPageNo']+1 - ($_smarty_tpl->tpl_vars['pagingObj']->value['startPageNo']) : $_smarty_tpl->tpl_vars['pagingObj']->value['startPageNo']-($_smarty_tpl->tpl_vars['pagingObj']->value['endPageNo'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['pagingObj']->value['startPageNo'], $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
            <?php if ($_smarty_tpl->tpl_vars['i']->value === $_smarty_tpl->tpl_vars['pagingObj']->value['pageNo']) {?>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;
echo $_smarty_tpl->tpl_vars['fn']->value;?>
" class="choice"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
            <?php } else { ?>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;
echo $_smarty_tpl->tpl_vars['fn']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
            <?php }?>
        <?php }
}
?>
    </span>
    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['pagingObj']->value['nextPageNo'];
echo $_smarty_tpl->tpl_vars['fn']->value;?>
" class="next">다음 페이지</a>
    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['pagingObj']->value['finalPageNo'];
echo $_smarty_tpl->tpl_vars['fn']->value;?>
" class="last">마지막 페이지</a>
</div><?php }
}
