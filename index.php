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
<style>                      	 //RWD
/* Set the height of the grid so that left and right col can be 100% (adjust as needed) */
.w3-row {height: 800px}
    
/* Set a 100% height to left and right col */
.w3-col.m2, w3-col.m2 {height: 100%;}
    
/* On small screens, set grid height to 'auto' */
@media screen and (max-width: 601px) {
  .w3-row {height:auto;} 
}
</style>


<style type="text/css">         //補充的CSS
  /*#Footer {
    width:100%;
    position:absolute;
    bottom:0;
  }*/
  .loginbody {
    text-align: center;
  }
  .error {
    color:red;
  }
  .list {
    !text-align:left; 
  }
</style>

<script>			//FB api
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '476401455878165',
    cookie     : true,  // enable cookies to allow the server to access
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.5' // use graph api version 2.5
  });

  // Now that we've initialized the JavaScript SDK, we call
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
  function logout() {
    FB.logout(function(response) {
      // user is now logged out
    });
  }
</script>



<!-- Header -->
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

    
    
<!-- Body -->
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '476401455878165',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div class="w3-center">    
  <div class="w3-row">
    <div class="w3-col m2 w3-light-grey">
      <h3><p class="error">
      <?php
        if(isset($_GET["errMsg"]) && ($_GET["errMsg"] == "1"))
          echo "帳號或密碼錯誤！";
      
        if(!isset($_SESSION["loginmenber"]) || ($_SESSION["loginmenber"]=="")) {
      ?></p></h3>
          <button class="w3-btn w3-xlarge w3-theme-dark" onclick="document.getElementById('login').style.display='block'" style="font-weight:900;">Log in</button>
	  <!--<div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" onlogin="checkLoginState();"></div>-->
      <?php
        } else {
      ?>
          <p><a class="w3-btn w3-xlarge w3-theme-dark" style="font-weight:900;" href="index.php?logout=true">Log out</a></p>
          <input class="w3-btn w3-teal" type=button onclick="window.open('<?php echo "http://ws.csie.nptu.edu.tw:3000/wetty/ssh/" . $_SESSION["loginmenber"]?>');" value="開啟WebTTY">  
      <?php
        }
      ?>
      <!--<p><a href="#">Link</a></p>-->
      <!--<p><a class="w3-btn w3-teal" href="index.php?tutorial=true">教學</a></p>--><p>
      <span class="w3-opennav w3-xlarge w3-btn w3-teal" onclick="w3_open()">&#9776;教學</span>
    </div>

<!--教學漢堡-->
<nav class="w3-sidenav w3-light-grey w3-card-8 w3-animate-left w3-large" style="width:25%;display:none">
  <h3>
  <a href="javascript:void(0)" onclick="w3_close()" 
  class="w3-closenav w3-large">Close &times;</a>
  <a class="w3-green w3-padding-16" href="#">list</a>
  <a href="index.php?tutorial=1">test1</a>		
  <a Target="_new" href="wetty.php">test2</a>
  <a href="index.php?tutorial=3">test3</a>
  <a href="index.php?tutorial=4">test4</a>
  </h3>
</nav>


<script>
function w3_open() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
}
function w3_close() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
}
</script>



    <?php 
      if(isset($_GET["tutorial"]) && ($_GET["tutorial"]=="1")){
    ?>
      <iframe src="tutorial/demo/index.html" width="80%" height="100%" frameborder="0" ></iframe>
    <?php
      } 
      else if (isset($_GET["tutorial"]) && ($_GET["tutorial"]=="3")) {
    ?>
        <iframe src="http://junwu.nptu.edu.tw/dokuwiki/doku.php?id=c:ifcase" width="80%" height="100%" frameborder="0" ></iframe>
    <?php
      }
      else if (isset($_GET["tutorial"]) && ($_GET["tutorial"]=="4")) {
    ?>
	<iframe src="list.html" width="80%" height="100%" frameborder="0" ></iframe>
    <?php
      }else {
    ?>
    <div class="w3-col m8 w3-container">
      <h1>Message</h1>
      <p class="w3-justify">test.</p>
      <!--<hr>
      <h3>Message test</h3>
      <p>測試中.......</p>-->
    </div>
    <!--<div class="w3-col m2 w3-light-grey w3-padding">
      <div class="w3-card-2 w3-padding">
        <p>ADS</p>
      </div><br>
      <div class="w3-card-2 w3-padding">
        <p>ADS</p>
      </div>
    </div>-->
    <?php
    }
    ?>
  </div>
</div>

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
          帳號：<input type="text" name="username" value="<?php if(isset($_COOKIE["remId"])) {echo $_COOKIE["remId"];} ?>" > <p>
          密碼：<input type="password" name="passwd" value="<?php if(isset($_COOKIE["remPwd"])) {echo $_COOKIE["remPwd"];} ?>" ><p>
          <input class="w3-btn w3-teal" type="submit" name="button" value="登入" >
          <input class="w3-check" type="checkbox" name="rememberme" value="true" id="rememberme" checked ><label class"w3-validate">記住我帳號密碼</label><p>
        </h4>
      </body>
    </form>
    <br>
  </div>
</div>


<!--
<footer id="Footer" class="w3-container w3-teal">
  <h5>測試中.........</h5>
  <p>有BUG請回報:xup6u06m4@gmail.com</p>
</footer>
-->
</body>
</html> 
