<?php
function user_query($db){
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
