<html>
<head>
<title>公告信息管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<script language="javascript">
function check(form){
	if(form.txt_keyword.value==""){
		alert("请输入查询关键字!");form.txt_keyword.focus();return false;
	}
form.submit();
}
</script>
<table width="828" height="522" border="0" align="center" cellpadding="0" cellspacing="0" id="__01">
	<tr>
		<td background="images/image_01.gif">&nbsp;			</td>
		<td height="140" background="images/image_02.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td width="202" rowspan="3" valign="top" bgcolor="#F0F0F0"><table width="202" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><?php include("menu.php");?></td>
          </tr>
      </table></td>
		<td height="34" background="images/image_04.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td height="38" background="images/image_06.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td height="270" valign="top">
			<table width="626" height="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="257" align="center" valign="top" background="images/image_08.gif"><table width="600" height="271"  border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="22" align="center" valign="top" class="word_orange"><strong>编辑公告信息</strong></td>
                  </tr>
                  <tr>
                    <td height="249" align="center" valign="top">
                      <table width="400" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="30" align="center"><form name="form1" method="post" action="">
        查询关键字&nbsp;
        <input name="txt_keyword" type="text" id="txt_keyword" size="40">
&nbsp;
        <input type="submit" name="Submit" value="搜索" onClick="return check(form)">
                          </form></td>
                        </tr>
                      </table>
                      <table width="550" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#999999">
                      <tr align="center" bgcolor="#f0f0f0">
                        <td width="214">公告标题</td>
                        <td width="271">公告内容</td>
                        <td width="47">编辑</td>
                      </tr>
					<?php
					$conn=mysql_connect("localhost","root","") or die("数据库服务器连接错误".mysql_error());
					mysql_select_db("db_database18",$conn) or die("数据库访问错误".mysql_error());
					mysql_query("set names gb2312");
					$keyword=$_POST[txt_keyword];
					$sql=mysql_query("select * from tb_affiche where title like '%$keyword%' or content like '%$keyword%'");
					$row=mysql_fetch_object($sql);
					if(!$row){
					echo "<font color='red'>暂无公告信息!</font>";
					}
					do{
					?>
                      <tr bgcolor="#FFFFFF">
                        <td><?php echo $row->title;?></td>
                        <td><?php echo $row->content;?></td>
                        <td align="center"><a href="check_del_ok.php?id=<?php echo $row->id;?>"><img src="images/delete.gif" width="22" height="22" border="0"></a></td>
                      </tr>
					<?php
					}while($row=mysql_fetch_object($sql));
					mysql_free_result($sql);
					mysql_close($conn);
					?>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>			</td>
	</tr>
	<tr>
		<td bgcolor="#F0F0F0"></td>
		<td height="43" background="images/image_12.gif"></td>
	</tr>
</table>
</body>
</html>