<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','On');
require_once('db_config.php');
if(isset($_POST['absenden']))
{
  $benutzername = mysqli_real_escape_string($db, trim($_POST['benutzername']));
  $passwort = mysqli_real_escape_string($db, trim($_POST['passwort']));
        $sql="SELECT id, benutzername, rang FROM users WHERE benutzername ='$benutzername' &&     passwort = md5('$passwort')";
        $data = mysqli_query($db, $sql);
  if(mysqli_num_rows($data) == 1){
     $zeile= mysqli_fetch_array($data);
     $_SESSION['id'] = $zeile['id'];
     $_SESSION['benutzername'] = $zeile['benutzername'];
     $_SESSION['rang'] = $zeile['rang'];
     $_SESSION['angemeldet'] = true;
        }
    }
mysqli_close($db);
header('Location: ' . $start);?>
