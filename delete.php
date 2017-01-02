<?php
/**
 * Created by PhpStorm.
 * User: sony
 * Date: 2016/4/26
 * Time: 13:39
 */
require_once 'conn.php';
$id=intval($_GET['id']);
$sql="delete from news WHERE id=$id";
$result=mysqli_query($link,$sql);
if($result){
    $url='manage.php';
    $message=urlencode("id={$id}的记录删除成功！");
    header("location:success.php?url=$url&message=$message");
}