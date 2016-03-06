<?php
  $db_username = "VagrantPi";
  $db_password = "21Ub2sWipZNXJUM5";
  $db_table = "elearn";
  $db_link = @mysql_connect("localhost",$db_username,$db_password);
  if (!$db_link)  die("資料連結失敗！");
  if (!@mysql_select_db($db_table)) die("資料庫選擇失敗！");
  mysql_query("SET NAMES 'utf8'");
?>
