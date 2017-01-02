<?php
/**
 * Created by PhpStorm.
 * User: sony
 * Date: 2016/4/24
 * Time: 10:27
 */
$link = mysqli_connect('bdm245672579.my3w.com','bdm245672579','PWWpww932589183','bdm245672579_db');
if(mysqli_connect_errno()){
    die('数据库连接失败');
}
mysqli_query($link,'SET NAMES utf8');//查询内容乱码
