<?php
include_once('header.php');
if(isset($_SESSION['benutzername']))
  {
    //Nach absenden des Formulares(Button) erscheint ein neues Formular in das man sein altes Passwort,
    //sowie sein neues Passwort eingeben bzw das neue Passwort wiederholen muss danach zum ändern auf
    // den Button: Passwort ändern klicken
    if(isset($_POST['change_pass']))
    {
      echo "<form action=\"includes/account_change_settings.incl.php\" method=\"post\">";
      echo "<br>Altes Passwort: <input type=\"password\" name=\"old_pass\" value=\"\">";
      echo "<br>Neues Passwort: <input type=\"password\" name=\"new_pass\" value=\"\">";
      echo "<br>Neues Passwort wiederholen: <input type=\"password\" name=\"new_pass_repeat\" value=\"\">";
      echo "<br><input type=\"submit\" name=\"confirm_change\" value=\"Passwort ändern\">";
      echo "</form>";
    }
  }
  else
    {
      echo "Bitte anmelden";
    }
    exit;
?>
