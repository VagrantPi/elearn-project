<?php
  session_start();

  if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
    unset($_SESSION["loginmenber"]);
    Header("location:index.php");
  }

  if(!isset($_SESSION["memberlevel"]) || ($_SESSION["memberlevel"]=="")) {
    iHeader("location:index.php");
  }

  if(!isset($_SESSION["loginmenber"]) || ($_SESSION["loginmenber"]=="")) {
    Header("location:index.php");
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
@media screen and (max-width: 701px) {
  .w3-row {height:auto;}
}
</style>
<body>

<!--教學漢堡-->
<!--<nav class="w3-sidenav w3-light-grey w3-card-8 w3-animate-left w3-xlarge" style="width:35%;display:none" >
  <header class="w3-container w3-dark-grey">
    <h1>Tutorial List<a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-closenav">&times;</a></h1>
  </header>
  <a href="student.php?tutorial=1">C++ tutorial</a>
</nav>-->


<header class="w3-container w3-theme w3-padding w3-teal" id="myHeader">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-opennav"></i>
  <div class="w3-center">
  <h1 class="w3-jumbo">e-Learn NPTU</h1>
  <h4>Welcom
  <?php
    session_start();
    echo  $_SESSION["loginmenber"] ;
  ?> teacher
  </h4>
  </div>
</header>

<div class="w3-topnav w3-large w3-green">
  <a href="#">Portfolio</a>
  <a href="student.php">Home</a>
</div>


<div class="w3-row-padding">
  <div class="w3-row">


    <div class="w3-col m2 w3-light-grey w3-xlarge">
      <p><a class="w3-btn w3-theme-dark" style="font-weight:900;" href="index.php?logout=true">Log out</a></p>
      <input class="w3-btn w3-teal" type=button onclick="window.open('<?php echo "http://ws.csie.nptu.edu.tw:3000/wetty/ssh/" . $_SESSION["loginmenber"]?>');" value="開啟WebTTY"><p>
      <p><a class="w3-btn w3-theme-dark" style="font-weight:900;" href="teacher.php?CourseManage=true">課程管理</a></p>
      <!--<span class="w3-opennav w3-btn w3-teal" onclick="w3_open()">&#9776;教學</span>-->
    </div>




    <div class="w3-row m8 w3-container" style="margin-left:25%">
    <?php
      /*if(isset($_GET["tutorial"]) && ($_GET["tutorial"]=="1")){
    ?>
        <iframe src="C++Tutorial.php" width="100%" height="100%" frameborder="0" scrolling="yes"></iframe>
    <?php
      }else {*/
    ?> 
    <?php
      if(isset($_GET["CourseManage"]) && ($_GET["CourseManage"]=="true")){
    ?>
        <iframe src="CourseManage.php" width="100%" height="100%" frameborder="0" scrolling="yes"></iframe>
    <?php
      } else {
    ?> 

      <h1>Welcome</h1>
      <p class="w3-justify">test.</p>
      <hr>

      <h3>Test</h3>
      <p>Lorem ipsum...</p>

    <?php
    }
    ?>
    </div>


  </div>
</div>

<footer class="w3-container w3-green">
  <h5>測試中....</h5>
  <p>0(:3　)～ ('､3_ヽ)_</p>
</footer>

<!--教學漢堡-->
<script>
  function w3_open() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
  }
  function w3_close() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
  }
</script>




</body>
</html>


