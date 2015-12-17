<?php
    error_reporting(0);
    $conn = mysql_connect("localhost","root","") or die("die");
    mysql_select_db('db_database18',$conn);
    mysql_query("set names gbk");
    $txt_title = $_POST['txt_title'];
    $txt_content = $_POST['txt_content'];
    $time = date("Y-m-d H:i:s");
    $sql = "insert into tb_affiche(title,content,createtime) values('$txt_title','$txt_content','$time')";
    $query = mysql_query($sql,$conn);
    mysql_free_result($query);
    mysql_close($conn);
    
?>
