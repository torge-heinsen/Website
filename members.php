<?php
ob_start();
include_once('header.php');
require_once('includes/db_config.php');
require_once('includes/functions.php');
if(isset($_SESSION['benutzername']) && $_SESSION['rang'] == 'admin')
  {
  user_query($db);
  }
  else{
      header('Location: ' . $start);
      exit;
  }
ob_flush();
