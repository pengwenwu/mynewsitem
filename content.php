<?php
require_once 'conn.php';
$id=intval($_GET['id']);
$sql="update news set hits=hits+1 WHERE id=$id";
mysqli_query($link,$sql);
$sql1="select * from news WHERE id=$id";
$result=mysqli_query($link,$sql1);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>新闻内容</title>
    <script type="text/javascript">

    </script>
</head>
<body>
<table width="1000" border="0" bordercolor="#eee" rules="all" cellpadding="5" align="center">
    <tr>
        <th><h1><?php echo $row['title']?></h1></th>
    </tr>
    <tr align="center">
        <td>
            作者：<?php echo $row['author']?>&nbsp;&nbsp;&nbsp;&nbsp;
            来源：<?php echo $row['source']?>&nbsp;&nbsp;&nbsp;&nbsp;
            点击率：<?php echo $row['hits']?>&nbsp;&nbsp;&nbsp;&nbsp;
            发布时间：<?php echo $row['addate']?>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="关闭窗口" onclick="javascript:window.opener=null;window.open('','_self','').close();">
        </td>
    </tr>
    <tr>
        <td><?php echo $row['content']?></td>
    </tr>
</table>
</body>
</html>