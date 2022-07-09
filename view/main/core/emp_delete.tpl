{include file="header.tpl"}
<h3 class="sub_title">계정/사용자 삭제</h3>
<hr class="sub_hr">
{section name=usr_auth_item loop=$emp_item}
<form action="employee?func=delete" method="POST">
<input type="hidden" name="idx" value="{$emp_item[usr_auth_item].emp_no}">
<input type="hidden" name="func" value="delete">
<input type="hidden" name="srtype" value="submit">
<table class="emp_delete_tbl">
    <tr>
        <td style="width:40%;background:#e2e2e2;">사원번호</td>
        <td>
            {$emp_item[usr_auth_item].emp_no}
        </td>
    </tr>
    <tr>
        <td style="width:40%;background:#e2e2e2;">권한</td>
        <td>
            {$emp_item[usr_auth_item].auth_name}
        </td>
    </tr>
    <tr>
        <td style="background:#e2e2e2;">성명</td>
        <td>{$emp_item[usr_auth_item].usrname}</td>
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
    {/section}
</form>
				
{include file="footer.tpl"}