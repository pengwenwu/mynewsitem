<?php
require_once 'conn.php';
if(isset($_POST["ac"]) && $_POST["ac"]=="login"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql="select * from login WHERE username='$username' and  password='$password'";
    $result=mysqli_query($link,$sql);
    $records=mysqli_num_rows($result);
    if($records==1){
        $url='manage.php';
        $message=urlencode('用户登录成功！');
        header("location:success.php?url=$url&message=$message");
    }else{
        $message=urlencode('用户名或密码不正确！');
        header("location:error.php?message=$message");
    }
    
}else{
    $message=urlencode('非法登陆！');
    header("location:error.php?message=$message");
}