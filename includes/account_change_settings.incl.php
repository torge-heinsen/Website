<?php
include_once('header.php');
require_once('db_config.php');
if(isset($_POST['confirm_change']))
{
  $old_pass = mysqli_real_escape_string($db, trim($_POST['old_pass']));
  $new_pass = mysqli_real_escape_string($db, trim($_POST['new_pass']));
  $new_pass_repeat = mysqli_real_escape_string($db, trim($_POST['new_pass_repeat']));

  if(!empty($old_pass) && !empty($new_pass) && !empty($new_pass_repeat) && ($new_pass == $new_pass_repeat))
  {
    $sql="SELECT * FROM users WHERE id ='$_SESSION[id]'";
    $data=mysqli_query($db, $sql);
    $zeile = mysqli_fetch_row($data);
    $old_pass=md5($old_pass);
    if($old_pass = $zeile[2])
    {
      echo "hallo";
      $new_pass=md5($new_pass);
      $sql="UPDATE users SET passwort='$new_pass' WHERE id='$_SESSION[id]'";
      mysqli_query($db, $sql) or exit("sql-error: $sql");
      mysqli_close($db);
      echo "hallo";
    }
  }
  else
    {
    echo "Angaben unvollständig, bitte erneut versuchen";
    }
}
