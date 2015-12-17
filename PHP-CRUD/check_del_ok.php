<?php
$conn=mysql_connect("localhost","root","") or die("数据库服务器连接错误".mysql_error());
mysql_select_db("db_database18",$conn) or die("数据库访问错误".mysql_error());
mysql_query("set names gb2312");
$id=$_GET[id];
$sql=mysql_query("delete from tb_affiche where id='$id' ");
if($sql){
	echo "<script>alert('公告信息删除成功！');window.location.href='delete_affiche.php';</script>";
}else{
	echo "<script>alert('公告信息删除失败！');history.back();window.location.href='delete_affiche.php?id=$id';</script>";
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

