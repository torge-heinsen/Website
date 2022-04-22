<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','On');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<nav>
  <div class="">
    <ul>
    <a href="index.php">Startseite</a>
    <?php
      if(isset($_SESSION['benutzername'])){
        echo "<a href='includes/logout.incl.php'>Abmelden</a>";
      }
      else{
        echo " <a href='login.php'>Anmelden</a>";
        echo " <a href='registrieren.php'>Registrieren</a>";
      }
      ?>
    </ul>
  </div>
</nav>
