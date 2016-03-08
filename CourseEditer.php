<?php
  if(isset($_POST["editer"]))
    $_SESSION["course"] = $_POST["editer"];
    echo $_SESSION["course"];
?>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<body> 
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<div align="center"> 
  <h2><strong>課程編輯</strong>
  <input class="w3-btn w3-teal" type="submit" name="button" value="繼承資料" >
  </h2>
  <form method="post" action="">
    <textarea name="editer" class="ckeditor" id="content" cols="50" rows="20"></textarea> 
    <br>
    <a class="w3-btn w3-teal" href="CourseList.php">Save</a>
  </form>
</div>
</body>
