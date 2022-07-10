{include file="header.tpl"}


	<script type="text/javascript">
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
			openWin = window.open("product?func=list&id=" + id + "&option=detail_view" ,
		        "childForm", "width=" + popupWidth + ", height=" + popupHeight + 
				"left="+ popupX + ", top=" + popupY + ", resizable = no, scrollbars = no");
		}

	</script>
				<h3 class="sub_title">프로젝트(제품) / 제품 현황</h3>
				<hr class="sub_hr">

<table class="item_status_tbl">
	<thead>
		<tr>
			<th style="width:10%">
				제품번호
			</th>
			<th style="width:15%">
				제품명
			</th>
			<th style="width:35%">
				설명
			</th>
			<th>
				기능
			</th>
			<th>
				등록일자
			</th>
		</tr>
	</thead>
	<tbody>
		{foreach $productList as $u_item}
		<tr>
			<td>
				{$u_item.product_no}
			</td>
			<td>
				{$u_item.product_name}
			</td>
			<td>
				{$u_item.description}
			</td>
			<td>
				<a href="#" onclick="openChild({$u_item.product_no})">상세보기</a>
			</td>
			<td>
				{$u_item.regidate}
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