<!DOCTYPE html>
<html>
 <head>
<meta charset="utf-8">
     <title>用户登录</title>
     <script type="text/javascript">
         function checkForm() {
             if(document.form1.username.value.length == 0){
                 window.alert('用户名不能为空');
                 return false;
             }else if(document.form1.username.value.length>12 || document.form1.username.value.length<5){
                 window.alert('用户名长度必须介于5-12位字符');
                 return false;
             }else if(document.form1.password.value.length == 0){
                 window.alert('密码不能为空');
                 return false;
             }else{
                 return true;
             }
         }
     </script>
     <style type="text/css">
         body{margin: 0px;background-color: #CFCFCF;}
         table{margin-top: 170px;background-color: white;}
     </style>

 </head>
 <body>
<form name="form1" method="post" action="login_check.php" onsubmit="return checkForm()">
    <table width="300" border="1" bordercolor="#eee" align="center" rules="all" cellpadding="5">
        <tr>
            <th colspan="2">用户登录</th>
        </tr>
        <tr>
            <td align="right">用户名：</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td align="right">密码：</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;<input type="submit" value="提交">&nbsp;
                <input type="reset" value="重置">
                <input type="hidden" name="ac" value="login">
            </td>
        </tr>
    </table>
</form>
 </body>
</html>