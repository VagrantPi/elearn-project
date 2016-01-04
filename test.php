<?
  $username = 'aa';
  $password = 'aaaaaa';
  $command = './chkpasswd ' .$username . ' ' . $password;
  $out = shell_exec ($command);
  echo $out;
  #$output = shell_exec('ls -lart');
  #echo "<pre>$output</pre>";
?>
