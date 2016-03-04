<?php
  session_start();
  if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
    unset($_SESSION["loginmenber"]);
    Header("location:index.php");
  }

  /*if(isset($_SESSION["loginmenber"]) && ($_SESSION["loginmenber"]!="")) {
    Header("location:index.php");
  } */
  if(isset($_POST["username"]) && isset($_POST["passwd"])) {
    $yes = "Authenticated\n";
    $command = 'elearn-project/chkpasswd ' . $_POST["username"] . ' ' . ($_POST["passwd"]);
    $check = shell_exec ($command);
    if ($check == $yes) {
      $_SESSION["loginmenber"] = $_POST["username"];
      if(isset($_POST["rememberme"]) && $_POST["rememberme"]=="true" ) {
      } else {
        if(isset($_COOKIE["remId"])) {
        }
      }
      //Header("location:elearn-project/index.php");
      Header("location:index.php");
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
  <h4>Welcom
  <?php
    session_start();
    echo  $_SESSION["loginmenber"] ;
  ?>
  </h4>
  </div>
</header>

<?php if(isset($_SESSION["loginmenber"]) || ($_SESSION["loginmenber"]!="")) 
{  ?>
<div class="w3-topnav w3-large w3-green">
  <a href="#">Portfolio</a>
  <a href="#">Home</a>
</div>
<?php  
}  ?>
    
<div class="w3-center">    
  <div class="w3-row">
    <div class="w3-col m2 w3-light-grey">
      <h3><p class="error">
      <?php
        if(isset($_GET["errMsg"]) && ($_GET["errMsg"] == "1"))
          echo "帳號或密碼錯誤！";

        if(!isset($_SESSION["loginmenber"]) || ($_SESSION["loginmenber"]=="")) {    
      ?>
      </p></h3>

      <button class="w3-btn w3-xlarge w3-theme-dark" onclick="document.getElementById('login').style.display='block'" style="font-weight:900;">Log in</button>
      <?php
        } else {
      ?>
      <p><a class="w3-btn w3-xlarge w3-theme-dark" style="font-weight:900;" href="index.php?logout=true">Log out</a></p>
      <input class="w3-btn w3-teal" type=button onclick="window.open('<?php echo "http://ws.csie.nptu.edu.tw:3000/wetty/ssh/" . $_SESSION["loginmenber"]?>');" value="開啟WebTTY">
      <!--<p><a href="#">Link</a></p>-->
      <!--<p><a class="w3-btn w3-teal" href="index.php?tutorial=true">教學</a></p>--><p>
      <span class="w3-opennav w3-xlarge w3-btn w3-teal" onclick="w3_open()">&#9776;教學</span>
      <?php
        }
      ?>
</div>
<!--教學漢堡-->
      <p>
        <nav class="w3-sidenav w3-light-grey w3-card-8 w3-animate-left w3-large" style="width:35%;display:none" >
        <h3>
        <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-closenav w3-large">Close &times;</a>
        <a class="w3-green w3-padding-16" href="#">list</a>
        <a href="index.php?tutorial=1">C++ tutorial</a>
        </h3>
        </nav>
      </p>
      <script>
        function w3_open() {
          document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
        }
        function w3_close() {
          document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
        } 
      </script>


    
    
    
    
    <div class="w3-col m8 w3-container"> 
    <?php
      /*if(isset($_GET["tutorial"]) && ($_GET["tutorial"]=="1")){
    ?>
        <iframe src="list.html" width="80%" height="100%" frameborder="0" ></iframe>
    <?php
      }else {*/
    ?>
      <h1>Welcome</h1>
      <p class="w3-justify">test.</p>
      <hr>

      <h3>Test</h3>
      <p>Lorem ipsum...</p>

    <?php
    //}
    ?>

  </div>
</div>

<footer class="w3-container w3-green">
  <h5>Footer</h5>
  <p>Footer information goes here</p>
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
