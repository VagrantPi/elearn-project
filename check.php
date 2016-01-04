<?php
$username =  $_POST['id'];
$password =  $_POST['pw'];
$command = './chkpasswd ' .$username . ' ' . $password;
$check = shell_exec ($command);
$yes = "Authenticated\n";
#  echo $check;
if ($check == $yes) {
  $_SESSION['ssnUSERNAME']  = $loginname;
  Header("location:welcom.php");
} else {
  Header("location:err.php");
}
?>
