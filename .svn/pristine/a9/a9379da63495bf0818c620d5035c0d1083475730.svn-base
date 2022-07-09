{include file="header.tpl"}
<h3 class="sub_title">계정/사용자 관리</h3>
<hr class="sub_hr">

<!-- 결과 -->
<table class="output_result_tbl">
	<thead>
		<tr>
			<th style="width:7%">
				번호
			</th>
			<th style="width:10%">
				사원번호
			</th>
			<th style="width:10%">
				권한명
			</th>
			<th>
				사용자명
			</th>
			<th style="width:20%">
				등록일자
			</th>
			<th style="width:20%">
				수정일자
			</th>
			<th style="width:20%">
				비고
			</th>
		</tr>
	</thead>
	<tbody>
        {assign var=counter value=1}
		{foreach $employeeList as $item}
		<tr>
			<td>
				{$counter++}
			</td>
			<td>
				{$item.emp_no}
			</td>
			<td>
				{$item.auth_name}
			</td>
			<td>
				{$item.usrname}
			</td>
			<td>
				{$item.regidate}
			</td>
			<td>
				{$item.modify_date}
			</td>
			<td>
				<a href="employee?func=modify&idx={$item.emp_no}">수정</a>, 
                <a href="employee?func=delete&idx={$item.emp_no}">삭제</a>
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>

<div style="text-align:center;">
<!-- 페이징 영역 -->
{include file="paging.tpl"}
</div>
				
{include file="footer.tpl"}