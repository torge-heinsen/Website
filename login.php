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
        $sql="SELECT id, benutzername FROM users WHERE benutzername ='$benutzername' &&     passwort = md5('$passwort')";
        $data = mysqli_query($db, $sql);
  if(mysqli_num_rows($data) == 1){
     $zeile= mysqli_fetch_array($data);
     $_SESSION ['id'] = $zeile['id'];
     $_SESSION ['user'] = $_POST['user'];
     $_SESSION['angemeldet'] = true;
      }
  }
  mysqli_close($db);

if($_SESSION['angemeldet'] = true){
  echo "du bis angemeldet";
}

?>
<form action="" method="post">
    Benutzername:<br>
    <input type="text" name="benutzername" placeholder="Benutzername"><br>
    Passwort:<br>
    <input type="password" name="passwort" placeholder="Passwort"><br>
    <input type="submit" name="absenden" value="Anmelden">
</form>
<?php
if($_SESSION['angemeldet'] = true){
  echo "du bist angemeldet";
