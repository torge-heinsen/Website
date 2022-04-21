<form action="" method="post">
  Benutzername:<br>
  <input type="text" name="benutzername" placeholder="Benutzername"><br>
  Passwort:<br>
  <input type="password" name="passwort" placeholder="Passwort"><br>
  Passwort wiederholen:<br>
  <input type="password" name="passwort_wiederholen" placeholder="Passwort"><br>
  <input type="submit" name="absenden" value="Absenden"><br>
</form>


<?php
require_once('db_config.php');
$db = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
if($db->connect_error)
{
  echo $db->connect_error;
}
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
