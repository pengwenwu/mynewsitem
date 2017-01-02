<?php
require_once 'conn.php';
$sql="select * from news";
$result=mysqli_query($link,$sql);
$records=mysqli_num_rows($result);
$pagesize=5;
$pages=ceil($records/$pagesize);
if(isset($_GET['page'])){
    $page=$_GET['page'];
    $startrow=($page-1)*$pagesize;
    $prepage=$page-1;
    $nextpage=$page+1;
    if($prepage<1){$prepage=1;}
    if($nextpage>$pages){$nextpage=$pages;}
}else{
    $page=1;
    $prepage=1;
    $nextpage=$page+1;
    $startrow=0;
}
$sql="select * from news limit $startrow,$pagesize";
$result=mysqli_query($link,$sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>新闻列表</title>
    <style type="text/css">
        *{font-family: '微软雅黑';}
        a:link,a:visited{color:#0000ff;text-decoration:none;}
        a:hover{color:red;text-decoration:underline;}
        a.a2{padding: 3px 10px;background-color: #eee;border: 1px solid #ccc;color: brown;}
        .current{padding: 3px 10px;font-weight: bold;}
    </style>
    <script type="text/javascript">
        function confirmDel(id) {
            if(window.confirm('确定要删除吗？')){ //加if是为了判断为true
                location.href='delete.php?id='+id;
            }
        }
    </script>
</head>
<body>
<table width="1000" border="1" bordercolor="#eee" rules="all" align="center" cellpadding="5">
    <tr>
        <td colspan="7"><input type="button" value="添加新闻" onclick="javascript:location.href='add.php'"></td>
    </tr>
    <tr>
        <th width="50">编号</th>
        <th width="400">新闻标题</th>
        <th width="100">作者</th>
        <th>来源</th>
        <th width="50">点击率</th>
        <th width="150">发布时间</th>
        <th width="100">操作选项</th>
    </tr>
    <?php
    while ($row=mysqli_fetch_assoc($result)) {
        ?>
        <tr align="center">
            <td><?php echo $row["id"] ?></td>
            <td align="left"><a href="content.php?id=<?php echo $row['id']?>" target="_blank"><?php echo $row["title"] ?></a> </td>
            <td><?php echo $row["author"] ?></td>
            <td><?php echo $row["source"] ?></td>
            <td><?php echo $row["hits"] ?></td>
            <td><?php echo $row['addate'] ?></td>
            <td><a href="update.php?id=<?php echo $row['id']?>">修改</a> | <a href="javascript:void(0)" onclick="confirmDel(<?php echo $row['id']?>)">删除</a> </td>
        </tr>
        <?php
    }
    ?>
    <tr align="center">
        <td colspan="7">
            <?php
            $startpage = $page-4;
            $endpage = $page+4;
            if($startpage<1){$startpage = 1;}
            if($endpage>$pages){$endpage = $pages;}
            echo "<a class='a2' href='?page=$prepage'><上一页</a>";
            for ($i = $startpage;$i<=$endpage;$i++){
                if($i == $page){
                    echo "<span class='current'>$i</span>";
                }else{
                    echo "  <a class='a2' href='?page=$i'>$i</a>";
                }
            }
            echo "<a class='a2' href='?page=$nextpage'>下一页></a>";
            ?>
        </td>
    </tr>
</table>
</body>
</html>
