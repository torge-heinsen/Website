<?php
ob_start();
include_once('header.php');
require_once('includes/db_config.php');
if(isset($_SESSION['benutzername']) && $_SESSION['rang'] == 'admin') {
          $sql="SELECT id, benutzername, rang FROM users";
      $data = mysqli_query($db, $sql);
    echo '<table border="1">';
    while ($zeile = mysqli_fetch_array($data, MYSQLI_ASSOC))
    {
      echo "<tr>";
      echo "<td>". $zeile['id'] . "</td>";
      echo "<td>". $zeile['benutzername'] . "</td>";
      echo "<td>". $zeile['rang'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";

  mysqli_close($db);


}
else{
    header('Location: ' . $start);
    exit;
}
ob_flush();
