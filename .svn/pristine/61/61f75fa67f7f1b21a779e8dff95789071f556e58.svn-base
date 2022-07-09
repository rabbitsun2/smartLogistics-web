{include file="header.tpl"}
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
            {foreach $emp_auth_list as $emp_item}
                <option value="{$emp_item.id}">{$emp_item.auth_name}</option>
            {/foreach}
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
				
{include file="footer.tpl"}