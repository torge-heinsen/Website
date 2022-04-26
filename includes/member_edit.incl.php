<?php
include_once('../header.php');
require_once('includes/db_config.php');
require_once('includes/functions.php');
if(isset($_SESSION['benutzername']) && $_SESSION['rang'] == 'admin')
  {
    if (isset($_POST['do_edit']))
    {
      $sql="UPDATE users SET benutzername='$_POST[benutzername]', rang='$_POST[rang]' WHERE id=$_POST[id]";
      mysqli_query($db, $sql) or exit("sql-error: $sql");
    }
  user_query($db);
  }
    else
      {
      header('Location: ' . $start);
      exit;
      }
