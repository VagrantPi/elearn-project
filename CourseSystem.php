<?php
  if(isset($_POST["editer"]))
    $_SESSION["course"] = $_POST["editer"];
    echo $_SESSION["course"];
?>

<body> 
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<div align="center"> 
  <h2><strong>課程編輯</strong></h2>
  <form method="post" action="">
    <textarea name="editer" class="ckeditor" id="content" cols="50" rows="20"></textarea> 
    <input class="w3-btn w3-teal" type="submit" name="button" value="Save" >
  </form>
</div>
</body>
