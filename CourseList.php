<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<?php
  session_start();
  
  require_once("connectDB.php");
  $DB_find = "SELECT * FROM `cource_list` ORDER BY `cource_id` ASC";
  $find = mysql_query($DB_find);
  
//  while($row_RecBoard=mysql_fetch_array($find)){   
    //echo $row_RecBoard['cource_id']. $row_RecBoard['cource_name'] . $row_RecBoard['cource_time'] . $row_RecBoard['cource_info'] . '<br>';
  //}
?>
<br>
<table class="w3-table w3-striped w3-bordered w3-card-4" >
<thead>
<tr class="w3-blue">
  <th>課程編號</th>
  <th>課程名稱</th>
  <th>開課時間</th>
  <th>內容</th>
  <th>編輯</th>
</tr>
</thead>
<?php
$CourseNum = 0;
while($row_RecBoard=mysql_fetch_array($find)){   ?>
<tr>
  <td><?php echo $row_RecBoard['cource_id'] ?></td>
  <td><?php echo $row_RecBoard['cource_name']  ?></td>
  <td><?php echo $row_RecBoard['cource_time']  ?></td>
  <td><?php echo $row_RecBoard['cource_info']  ?></td>
  <td> <a class="w3-btn w3-teal" style="font-weight:500;" href="CourseEditer.php<?php $_SESSION["CourseEditer"]=$CourseNum; ?>"> + </a> </td>
</tr>
<?php
  $CourseNum+=1;
} ?>
</table>
<br>
<div class="w3-section">
  <a class="w3-btn w3-teal" style="font-weight:900;" href="CourseEditer.php">開新課程</a>
</div>


