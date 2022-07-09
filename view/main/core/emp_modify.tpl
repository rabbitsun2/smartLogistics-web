{include file="header.tpl"}
<h3 class="sub_title">계정/사용자 수정</h3>
<hr class="sub_hr">
<form action="employee?func=modify" method="POST">
{section name=usr_auth_item loop=$emp_item}
<input type="hidden" name="idx" value="{$emp_item[usr_auth_item].emp_no}">
{/section}
<input type="hidden" name="func" value="modify">
<input type="hidden" name="srtype" value="submit">
<table class="emp_modify_tbl">
    <tr>
        <td style="width:40%;background:#e2e2e2;">권한</td>
        <td>
            <select name="emp_auth" style="width:90%;">
            {section name=usr_auth_item loop=$emp_item}
                <option value="{$emp_item[usr_auth_item].emp_auth}">{$emp_item[usr_auth_item].auth_name}</option>
            {/section}
            {section name=emp_auth loop=$emp_auth_list}
                <option value="{$emp_auth_list[emp_auth].id}">{$emp_auth_list[emp_auth].auth_name}</option>
            {/section}
            </select>
        </td>
    </tr>
    
    {section name=usr_auth_item loop=$emp_item}
    <tr>
        <td style="background:#e2e2e2;">성명</td>
        <td><input type="text" name="usrname" style="width:90%;" value="{$emp_item[usr_auth_item].usrname}"></td>
    </tr>
    {/section}
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
				
{include file="footer.tpl"}