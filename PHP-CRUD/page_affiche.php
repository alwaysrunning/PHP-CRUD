<html>
<head>
<title>公告信息管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<table width="828" height="522" border="0" align="center" cellpadding="0" cellspacing="0" id="__01">
	<tr>
		<td background="images/image_01.gif">&nbsp;			</td>
		<td height="140" background="images/image_02.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td width="202" rowspan="3" valign="top"><table width="202" border="0" cellspacing="0" cellpadding="0">
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
                    <td height="22" align="center" valign="top" class="word_orange"><strong>公告信息<strong>分页显示</strong></strong></td>
                  </tr>
                  <tr>
                    <td height="249" align="center" valign="top">
					<table width="550" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#999999">
                      <tr align="center" bgcolor="#f0f0f0">
                        <td width="221">公告标题</td>
                        <td width="329">公告内容</td>
                      </tr>
                      <?php
                         $conn = mysql_connect("localhost","root","");
                         mysql_select_db('db_database18');
                         mysql_query("set names gbk");
                         if($_GET['page']==""){
                         	$_GET['page']=1;
                         }
                         if(is_numeric($_GET['page'])){
                         	$page_size = 4;
                         	$offset = ($_GET['page'] - 1)*$page_size;
                         }
                         $sql = "select count(*) as total from tb_affiche";
                         $query = mysql_query($sql,$conn);
                         $info = mysql_fetch_array($query);
                         $message_count = $info['total'];
                         $page_count = ceil($message_count/$page_size);
                         $search = "select * from tb_affiche order by id desc limit $offset, $page_size";
                         $result = mysql_query($search,$conn);
                         while($row = mysql_fetch_array($result)){
                         ?>	
                         	<tr align="center" bgcolor="#ffffff">
                               <td width="221"><?=$row['title'] ?></td>
                                <td width="329"><?=$row['content'] ?></td>
                            </tr>
                         <?php
                         //mysql_free_result($result);  
                         }
                      ?>
					
                     </table>
                      <br>
                      <table width="550" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <!--  翻页条 -->
							<td width="37%">&nbsp;&nbsp;页次：<?php echo $_GET[page];?>/<?php echo $page_count;?>页&nbsp;记录：<?php echo $message_count;?> 条&nbsp; </td>
							<td width="63%" align="right">
							<?php
							   if($_GET['page']!=1){
							     echo "<a href='page_affiche.php?page=1'>首页</a>&nbsp;";
							   	 echo "<a href='page_affiche.php?page=".($_GET['page']-1)."'>上一页</a>";
							   }
							   if($_GET['page']<$page_count){
     
							   	 echo "<a href=page_affiche.php?page=".($_GET['page']+1).">下一页</a>&nbsp;";
							   	 echo "<a href='page_affiche.php?page=2'>尾页</a>";
							   }
							?>
                        </tr>
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