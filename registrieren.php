<?php
include_once('header.php');
?>
<form action="includes/registrieren.incl.php" method="post">
  Benutzername:<br>
  <input type="text" name="benutzername" placeholder="Benutzername"><br>
  Passwort:<br>
  <input type="password" name="passwort" placeholder="Passwort"><br>
  Passwort wiederholen:<br>
  <input type="password" name="passwort_wiederholen" placeholder="Passwort"><br>
  <input type="submit" name="absenden" value="Absenden"><br>
</form>
