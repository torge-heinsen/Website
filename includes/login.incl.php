<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','On');
require_once('db_config.php');
//Nach Absenden des Formulars werden die eingebenen Daten mit denen aus der Datebank verglichen,
//sofern diese übereinstimmen ist der Nutzer eingeloggt
if(isset($_POST['absenden']))
{
  $benutzername = mysqli_real_escape_string($db, trim($_POST['benutzername']));
  $passwort = mysqli_real_escape_string($db, trim($_POST['passwort']));
        $sql="SELECT id, benutzername, rang FROM users WHERE benutzername ='$benutzername' &&     passwort = md5('$passwort')";
        $data = mysqli_query($db, $sql);
      if(mysqli_num_rows($data) == 1)
          {
          $zeile= mysqli_fetch_array($data);
          //Daten werden der aktuellen Session hizugefügt
          $_SESSION['id'] = $zeile[0];
          $_SESSION['benutzername'] = $zeile[1];
          $_SESSION['rang'] = $zeile[2];
          $_SESSION['status'] = $zeile[3];
          }
}
mysqli_close($db);
//Nach erfolgreichem einloggen wird der Nutzer auf die Startseite weitergeleitet
header('Location: ' . $start);
