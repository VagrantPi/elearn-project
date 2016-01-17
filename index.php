<?php
  session_start();
  if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
    unset($_SESSION["loginmenber"]);
    Header("location:index.php");
  }
  
  if(isset($_SESSION["loginmenber"]) && ($_SESSION["loginmenber"]!="")) {
    Header("location:main.php");
  } 
  if(isset($_POST["username"]) && isset($_POST["passwd"])) {
    $yes = "Authenticated\n";
    $command = './chkpasswd ' . $_POST["username"] . ' ' . ($_POST["passwd"]);
    $check = shell_exec ($command);
    if ($check == $yes) {
      $_SESSION["loginmenber"] = $_POST["username"];
      if(isset($_POST["rememberme"]) && $_POST["rememberme"]=="true" ) {
      } else {
        if(isset($_COOKIE["remId"])) {
        }
      }
      Header("location:main.php");
    }
    else {
      Header("location:index.php?errMsg=1");
    }
  }
?>

<html>
  <title>Loging.........</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
 
  <style type="text/css">
  body {
    text-align: center;
  }   
  .error {
    color:red;
  }
 </style>
  <form name="form" method="post" action="">
  <body>
  <h2>
  <footer class="w3-container w3-teal">
    <h1>Lon In</h1>
    <h4><p>please input your id(s+學號) and password</p></h4>
  </footer>
  <p class="error">
  <?php
    if(isset($_GET["errMsg"]) && ($_GET["errMsg"] == "1"))
      echo "帳號或密碼錯誤！";
  ?></p>
  帳號：<input type="text" name="username" value="<?php if(isset($_COOKIE["remId"])) {echo $_COOKIE["remId"];} ?>" > <p>
  密碼：<input type="password" name="passwd" value="<?php if(isset($_COOKIE["remPwd"])) {echo $_COOKIE["remPwd"];} ?>" ><p>
  <input class="w3-btn w3-teal" type="submit" name="button" value="登入" >
  <input class="w3-check" type="checkbox" name="rememberme" value="true" id="rememberme" checked ><label class"w3-validate">記住我帳號密碼</label><p>
  </h2>
  </body>
  </form>
</html>
