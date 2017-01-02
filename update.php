<?php
require_once 'conn.php';
if(isset($_POST['ac']) && $_POST['ac'] =='update'){
    $id       = $_POST['id'];
    $title    = $_POST['title'];
    $cate     = $_POST['cate'];
    $author   = $_POST['author'];
    $source   = $_POST['source'];
    $orderby  = $_POST['orderby'];
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $content  = $_POST['content'];
    $addate   =time();
    $sql = "UPDATE news SET cate=$cate,title='$title',author='$author'";
    $sql.= ",source='$source',keywords='$keywords',description='$description',orderby=$orderby,";
    $sql.= "content='$content',addate=now() WHERE id=$id";

    if(mysqli_query($link,$sql))
    {
        $url = "manage.php";
        $message = urlencode("新闻id={$id}修改成功！");
        header("location:success.php?url=$url&message=$message");
    }
}else{
    $id=$_GET['id'];
    $sql="select * from news WHERE id=$id";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改新闻</title>
    <script charset="utf-8" src="js/editor/lang/zh_CN.js"></script>
    <script charset="UTF-8" src="js/editor/kindeditor-min.js"></script>
    <script>
        //加入在线编辑器
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="content"]', {
                allowFileManager : true
            });
        });
    </script>
</head>
<body>
<form name="form1" method="post">
    <table width="1000" border="1" bordercolor="#eee" rules="all" cellpadding="5" align="center">
        <tr>
            <th style="background-color: #c3c3c3" colspan="2"><h1>新闻修改</h1></th>
        </tr>
        <tr>
            <td align="right" width="120">新闻标题：</td>
            <td><input type="text" name="title" style="width: 400px" value="<?php echo $row["title"]?>"></td>
        </tr>
        <tr>
            <td align="right">新闻类型：</td>
            <td>
                <select name="cate">
                    <option value="1"<?php if($row["cate"]==1){echo " selected='selected'";}?> >公司新闻</option>
                    <option value="2"<?php if($row["cate"]==2){echo " selected='selected'";}?> >行业新闻</option>
                    <option value="3"<?php if($row["cate"]==3){echo " selected='selected'";}?>>疾病预防</option>
                    <option value="4"<?php if($row["cate"]==4){echo " selected='selected'";}?> >帮助中心</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">作者：</td>
            <td>
                <input type="text" name="author" width="100" value="<?php echo $row["author"]?>">
                来源：<input type="text" name="source" width="100" value="<?php echo $row["source"]?>">
                排序：<input type="text" name="orderby" style="width: 50px" value="<?php echo $row["orderby"]?>">
            </td>
        </tr>
        <tr>
            <td align="right">关键字：</td>
            <td><input type="text" name="keywords" value="<?php echo $row["keywords"]?>"></td>
        </tr>
        <tr>
            <td align="right">网页描述：</td>
            <td><input type="text" name="description" value="<?php echo $row["description"]?>"></td>
        </tr>
        <tr>
            <td>新闻内容：</td>
            <td><textarea name="content" style="width: 100%;height: 300px;visibility: hidden" ><?php echo $row["content"]?></textarea></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" value="修改">&nbsp;
                <input type="button" value="返回" onclick="javascript:history.go(-1)">
                <input type="hidden" name="ac" value="update">
                <input type="hidden" name="id" value="<?php echo $id?>">
            </td>
        </tr>
    </table>
</form>
</body>
</html>