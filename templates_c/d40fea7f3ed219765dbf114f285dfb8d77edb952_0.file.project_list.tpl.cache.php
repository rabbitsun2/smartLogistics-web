<?php
/* Smarty version 4.1.1, created on 2022-07-03 17:23:00
  from 'C:\wampp\apache2\htdocs\SmartLogistics\view\main\mgt\project_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c151e4084fd9_28397548',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd40fea7f3ed219765dbf114f285dfb8d77edb952' => 
    array (
      0 => 'C:\\wampp\\apache2\\htdocs\\SmartLogistics\\view\\main\\mgt\\project_list.tpl',
      1 => 1656836577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:paging.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62c151e4084fd9_28397548 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '61805297062c151e4079ee3_41779832';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php echo '<script'; ?>
 type="text/javascript">
	  	var openWin;
		function openChild(id){

			var popupWidth = 680;
			var popupHeight = 350;

			var popupX = (window.screen.width / 2) - (popupWidth / 2);
			// 만들 팝업창 width 크기의 1/2 만큼 보정값으로 빼주었음

			var popupY= (window.screen.height / 2) - (popupHeight / 2);
			// 만들 팝업창 height 크기의 1/2 만큼 보정값으로 빼주었음

	    	// window.name = "부모창 이름";
			window.name = "parentForm";
			// window.open("open할 window", "자식창 이름", "팝업창 옵션");
			openWin = window.open("project?func=list&id=" + id + "&option=detail_view" ,
		        "childForm", "width=" + popupWidth + ", height=" + popupHeight + 
				"left="+ popupX + ", top=" + popupY + ", resizable = no, scrollbars = no");
		}

		function goModify(id){
			location.replace('project?func=modify&id=' + id );
		}

	<?php echo '</script'; ?>
>

				<h3 class="sub_title">프로젝트(제품) / 프로젝트 현황</h3>
				<hr class="sub_hr">

<table class="item_status_tbl">
	<thead>
		<tr>
			<th style="width:10%">
				프로젝트번호
			</th>
			<th colspan="3" style="width:60%">
				프로젝트명
			</th>
			<th>
				비고
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
$__section_pjt_list_item_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['projectList']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_pjt_list_item_0_total = $__section_pjt_list_item_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item'] = new Smarty_Variable(array());
if ($__section_pjt_list_item_0_total !== 0) {
for ($__section_pjt_list_item_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index'] = 0; $__section_pjt_list_item_0_iteration <= $__section_pjt_list_item_0_total; $__section_pjt_list_item_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index']++){
?>
		<tr>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['projectList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index'] : null)]['project_id'];?>

			</td>
			<td colspan="3">
				<?php echo $_smarty_tpl->tpl_vars['projectList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index'] : null)]['project_name'];?>

			</td>
			<td>
				<input class="ui-button ui-widget ui-corner-all" type="button" 
								value="상세" onclick="openChild('<?php echo $_smarty_tpl->tpl_vars['projectList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index'] : null)]['project_id'];?>
')">
				<input class="ui-button ui-widget ui-corner-all" type="button" 
								value="수정" onclick="goModify('<?php echo $_smarty_tpl->tpl_vars['projectList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index'] : null)]['project_id'];?>
')">
				<input class="ui-button ui-widget ui-corner-all" type="button" 
								value="삭제" onclick="goDelete('<?php echo $_smarty_tpl->tpl_vars['projectList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index'] : null)]['project_id'];?>
')">
			</td>
		</tr>
		<tr>
			<td colspan="5" style="background-color:#e2e2e2;">
				<span style="font-weight:bold">설명</span>
			</td>
		</tr>
		<tr>
			<td colspan="5">
				<?php echo $_smarty_tpl->tpl_vars['projectList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index'] : null)]['description'];?>

			</td>
		</tr>
		<tr>
			<td colspan="5">
				
				<!-- 프로젝트 상세 내용-->
				<table class="project_item_detail_tbl">
					<thead>
						<tr>
							<th>
								시작일자
							</td>
							<th>
								종료일자
							</td>
							<th>
								등록일자
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $_smarty_tpl->tpl_vars['projectList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index'] : null)]['startdate'];?>

							</td>
							<td>
								<?php echo $_smarty_tpl->tpl_vars['projectList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index'] : null)]['enddate'];?>

							</td>
							<td>
								<?php echo $_smarty_tpl->tpl_vars['projectList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pjt_list_item']->value['index'] : null)]['regidate'];?>

							</td>
						</tr>
					</thead>
				</table>
				
			</td>
		</tr>
		
		<?php
}
}
?>
	</tbody>
</table>

<div style="text-align:center;">
<!-- 페이징 영역 -->
<?php $_smarty_tpl->_subTemplateRender("file:paging.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
