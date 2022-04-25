<?php
include_once('../header.php');
require_once('includes/db_config.php');
if(isset($_SESSION['benutzername']) && $_SESSION['rang'] == 'admin')
  {
    if (isset($_POST['do_edit']))
    {
      $sql="UPDATE users SET benutzername='$_POST[benutzername]', rang='$_POST[rang]' WHERE id=$_POST[id]";
      mysqli_query($db, $sql) or exit("sql-error: $sql");
    }

    $sql="SELECT id, benutzername, rang FROM users";
    $data = mysqli_query($db, $sql) or exit("sql-error: $sql");
    echo '<table border="1">';

      while ($zeile = mysqli_fetch_row($data))
      {
      echo "<tr>";
        foreach ($zeile as $item)
          echo "<td>$item</td>";
          echo "<td><a href=\"member_edit_form.incl.php?id=$zeile[0]\">bearbeiten</td>";
      echo "</tr>";
      }
    echo "</table>";
  }
    else{
        header('Location: ' . $start);
        exit;
    }
