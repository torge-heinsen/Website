<?php
session_start();
require_once('db_config.php');
if(isset($_POST['absenden']))
{
  $benutzername = mysqli_real_escape_string($db, trim($_POST['benutzername']));
  $passwort = mysqli_real_escape_string($db, trim($_POST['passwort']));
  $passwort_wiederholen = mysqli_real_escape_string($db, trim($_POST['passwort_wiederholen']));
  if (!empty($benutzername) && !empty($passwort) && !empty($passwort_wiederholen) && ($passwort==$passwort_wiederholen))
  {
    $sql="SELECT * FROM users WHERE benutzername ='$benutzername'";
    $data=mysqli_query($db, $sql);
    if(mysqli_num_rows($data) == 0)
    {
      $sql="INSERT INTO users (benutzername,passwort) VALUES ('$benutzername', md5('$passwort'))";
      mysqli_query($db, $sql);
      echo 'konto erstellt';
      echo'<form action="../index.php">
      <input type="submit" value="Zur Startseite" />
      </form>';

      mysqli_close ($db);
      exit();
    }
    else
    {
      echo 'benutzername schon vergeben bitte neuen waehlen';
      $benutzername="";
    }
  }
  else
    {
    echo 'bitte alle daten richtig angeben';
    }
}
mysqli_close($db);
?>
<form action="../index.php">
<input type="submit" value="Zur Startseite" />
</form>
