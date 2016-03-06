<?php
  session_start();
  require_once("connectDB.php");

  if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
    unset($_SESSION["loginmenber"]);
    Header("location:index.php");
  }


  if(isset($_SESSION["loginmenber"]) && ($_SESSION["loginmenber"]!="")) {
    if(isset($_SESSION["memberlevel"]) || ($_SESSION["memberlevel"]=="teacher")) {
      Header("location:teacher.php");
    }
    else {
      Header("location:student.php");
    }
  }

 
  if(isset($_POST["username"]) && isset($_POST["passwd"])) {
    $yes = "Authenticated\n";
    $command = './chkpasswd ' . $_POST["username"] . ' ' . ($_POST["passwd"]);
    $check = shell_exec ($command);
    if ($check == $yes) {
      $DB_Login = "SELECT * FROM `member` WHERE `member_name`='".$_POST["username"]."'";
      $Login = mysql_query($DB_Login);
      $DB_data = mysql_fetch_assoc($Login);
      $_SESSION["memberlevel"] = $DB_data["member_level"];
      $_SESSION["loginmenber"] = $_POST["username"];
      if(isset($_POST["rememberme"]) && $_POST["rememberme"]=="true" ) {
      } else {
        if(isset($_COOKIE["remId"])) {
        }
      }
      if ($_SESSION["memberlevel"] == 'teacher') {
        Header("location:teacher.php");
      }
      else {
        Header("location:student.php");
      }
    }
    else {
      Header("location:index.php?errMsg=1");
    }
  }

?>




<!DOCTYPE html>
<html>
<title>e-Learn NPTU</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<style>
/* Set the height of the grid so that left and right col can be 100% (adjust as needed) */
.w3-row {height: 700px}
    
/* Set a 100% height to left and right col */
.w3-col.m2, w3-col.m2 {height: 100%;}
    
/* On small screens, set grid height to 'auto' */
@media screen and (max-width: 601px) {
  .w3-row {height:auto;} 
}
</style>
<body>

<header class="w3-container w3-theme w3-padding w3-teal" id="myHeader">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-opennav"></i>
  <div class="w3-center">
  <h1 class="w3-jumbo">e-Learn NPTU</h1>
  <h4>Welcom</h4>
  </div>
</header>



    
<div class="w3-center">    
  <div class="w3-row">
    <div class="w3-col m2 w3-light-grey">
      <li class="error w3-red w3-xlarge" style="list-style-type:none;">
      <?php
        if(isset($_GET["errMsg"]) && ($_GET["errMsg"] == "1"))
          echo "帳號或密碼錯誤！";
      ?>
      </li><p>
      <button class="w3-btn w3-xlarge w3-theme-dark" onclick="document.getElementById('login').style.display='block'" style="font-weight:900;">Log in</button>

</div>
    
    
    <div class="w3-col m8 w3-container"> 
      <h1>Welcome</h1>
      <p class="w3-justify">test.</p>
      <hr>

      <h3>Test</h3>
      <p>test...</p>

    </div>


  </div>
</div>

<footer class="w3-container w3-green">
  <h5>測試中....</h5>
  <p>0(:3　)～ ('､3_ヽ)_</p>
</footer>





<!-- Modal -->
<div id="login" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-top">
    <header class="w3-container w3-theme w3-teal">
      <span onclick="document.getElementById('login').style.display='none'" class="w3-closebtn">×</span>
    </header>
    <footer class="w3-container w3-teal">
      <h3>Lon In</h3>
      <h5><p>please input your id(s+學號) and password</p></h5>
    </footer>
    <form name="form" method="post" action="">
      <body class="loginbody">
        <h4>
          &nbsp;&nbsp;&nbsp;帳號：<input type="text" name="username" value="<?php if(isset($_COOKIE["remId"])) {echo $_COOKIE["remId"];} ?>" > <p>
          &nbsp;&nbsp;&nbsp;密碼：<input type="password" name="passwd" value="<?php if(isset($_COOKIE["remPwd"])) {echo $_COOKIE["remPwd"];} ?>" ><p>
          &nbsp;&nbsp;&nbsp;&nbsp;<input class="w3-btn w3-teal" type="submit" name="button" value="登入" >
          <input class="w3-check" type="checkbox" name="rememberme" value="true" id="rememberme" checked ><label class"w3-validate">記住我帳號密碼</label>

        </h4>
      </body>
    </form>
    <br>
  </div>
</div>




</body>
</html> 
