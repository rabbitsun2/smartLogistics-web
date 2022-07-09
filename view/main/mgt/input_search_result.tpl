<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>검색 결과 - 품목 코드 찾기</title>
	
	<script src="../../library/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="../../library/jquery-ui-1.13.1.custom/jquery-ui.css">
  	<script src="../../library/jquery/jquery-3.6.0.js"></script>
	<script src="../../library/jquery-ui-1.13.1.custom/jquery-ui.js"></script>
	<link rel="stylesheet" href="../../css/style_inputSearch.css">

    <script type="text/javascript">
        function setParentText(num){
            opener.document.getElementById("pInput_productCode").value = document.getElementById("cProduct_no_" + num).value
            opener.document.getElementById("pInput_productName").value = document.getElementById("cProduct_name_" + num).value
        }
    </script>

</head>
<body>
    
    <h3 class="sub_title">품목 검색</h3>
    <hr class="sub_hr">
    <br>
    <a href="javascript:history.back()">이전으로</a>
    <table class="ck_input_result_tbl">
        <tr>
            <td style="width:10%" class="head">
                품목코드
            </td>
            <td style="width:20%" class="head">
                품목명
            </td>
            <td style="width:15%" class="head">
                설명
            </td>
            <td class="head">
                사진
            </td>
            <td style="width:10%" class="head">
                등록일자
            </td>
        </tr>
        {foreach $productList as $productitem}
        <tr>
            <td>
                <input type="hidden" id="cProduct_no_{$productitem.product_no}" value="{$productitem.product_no}">
                {$productitem.product_no}
            </td>
            <td>
                <input type="hidden" id="cProduct_name_{$productitem.product_no}" value="{$productitem.product_name}">
                <a href="#" onclick="setParentText({$productitem.product_no})">{$productitem.product_name}</a>
            </td>
            <td>
                {$productitem.description}
            </td>
            <td>
                <img src="../../pjt/images/{$productitem.product_no}.png" style="width:120px; height:120px;" alt="{$productitem.description}">
            </td>
            <td>
                {$productitem.regidate}
            </td>
        </tr>
        {/foreach}
    </table>
    
    <!-- 페이징 영역 -->
    <div style="text-align:center;">
    {include file="paging.tpl"}
    <br>
    
    <input type="button" value="창닫기" onclick="window.close()">
    </div>

    <!--
    <br><br>
        <input type="text" id="cInput">
            <input type="button" value="전달하기" onclick="setParentText()">
    <br><br>
    -->


</body>
</html>