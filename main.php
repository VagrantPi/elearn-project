<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<style type="text/css">
  body {
    text-align: center;
  }
  </style>
<body>
<footer class="w3-container w3-teal">
<h1>hellow 
<?php 
  session_start(); 
  echo  $_SESSION["loginmenber"] ;
  
  if(!isset($_SESSION["loginmenber"]) || ($_SESSION["loginmenber"]==""))
    Header("location:index.php");
?>
</h1>
</footer>
<p>
<h2>  
<input class="w3-btn w3-teal" type=button onclick=window.open("<?php echo "http://192.168.1.18:3000/wetty/ssh/" . $_SESSION["loginmenber"]; ?>") value="開啟WebTTY">  
<h2><a href="index.php?logout=true">登出</a> </h2>
</body>
</html>
