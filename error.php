<?php
$message=urldecode($_GET["message"]);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>操作成功</title>
<style type="text/css">
*{margin:0px;padding:0px;}
.box{
    width:450px;
	border:1px solid #f0f0f0;
	background:#FFFFCC;
	margin:100px auto;
	padding:20px;
	font-size:14px;
	line-height:180%;
	color:#444;
}
h2{margin-bottom:10px;}
#time{color:#FF0000;}
.color2{color:#0099FF;}
a.a1:link,a.a1:visited{color:#0099FF;text-decoration:none;}
a.a1:hover{color:#FF0000;text-decoration:underline;}
</style>
</head>

<body>
<div class="box">
	<h2 align="center">操作失败</h2>
	<p><b>提示：<?php echo $message;?></b></p>
<p>系统将在 <span id="time">3</span> 秒钟后自动跳转，如果不想等待，请点击 <a class="a1" href="javascript:history.go(-1);">这里</a> 跳转。</p>
</div>
</body>
</html>
<script language="javascript">
    function playSec(num)
    {
        var time = document.getElementById("time");
        time.innerHTML = num;
        if(--num >0)
        {
            setTimeout("playSec("+num+")",1000);
        }else
        {
            history.go(-1);
        }
    }
    playSec(3);
</script>