<?php
ob_start();
include_once('header.php');
require_once('includes/db_config.php');
if(isset($_SESSION['benutzername']) && $_SESSION['rang'] == 'admin')
  {
  $sql="SELECT id, benutzername, rang FROM users";
  $data = mysqli_query($db, $sql) or exit("sql-error: $sql");
  echo '<table border="1">';
    while ($zeile = mysqli_fetch_row($data))
    {
    echo "<tr>";
      foreach ($zeile as $item)
        echo "<td>$item</td>";
        echo "<td><a href=\"includes/member_edit_form.incl.php?id=$zeile[0]\">bearbeiten</td>";
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
