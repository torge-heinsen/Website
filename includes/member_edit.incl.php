<?php
include_once('../header.php');
require_once('includes/db_config.php');
require_once('includes/functions.php');
if(isset($_SESSION['benutzername']) && $_SESSION['rang'] == 'admin')
  {
    if(isset($_POST['do_edit']))
      {
      $benutzername = mysqli_real_escape_string($db, trim($_POST['benutzername']));
      $rang = mysqli_real_escape_string($db, trim($_POST['rang']));
      if (!empty($benutzername) && !empty($rang))
        {
        $sql="UPDATE users SET benutzername='$_POST[benutzername]', rang='$_POST[rang]' WHERE id=$_POST[id]";
        mysqli_query($db, $sql) or exit("sql-error: $sql");
        }
      }
    elseif(isset($_POST['deactivate']))
      {
      $sql="UPDATE users SET status='passiv' WHERE id=$_POST[id]";
      mysqli_query($db, $sql) or exit("sql-error: $sql");
      }
    elseif(isset($_POST['activate']))
      {
      $sql="UPDATE users SET status='aktiv' WHERE id=$_POST[id]";
      mysqli_query($db, $sql) or exit("sql-error: $sql");
      }
    elseif($_POST['delete'])
      {
      $sql="DELETE FROM users WHERE users . id = $_POST[id]";
      mysqli_query($db, $sql) or exit("sql-error: $sql");
      }

  user_query($db);
  }
  else
    {
    header('Location: ' . $start);
    exit;
    }
