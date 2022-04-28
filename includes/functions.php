<?php
//Abfrage aller Nutzer der Seite mit der Möglichkeit diese zu bearbeiten, zu de-/aktivieren oder zu löschen(nur admin)
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

        switch ($zeile[3])
          {
          case 'aktiv':
            echo "<td><form action=\"../includes/member_edit.incl.php\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"id\" value=\"$zeile[0]\"/>";
            echo "<input type=\"submit\" name=\"deactivate\" value=\"deaktivieren\">";
            echo "</form></td>";
            break;
          case 'passiv':
            echo "<td><form action=\"../includes/member_edit.incl.php\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"id\" value=\"$zeile[0]\"/>";
            echo "<input type=\"submit\" name=\"activate\" value=\"aktivieren\">";
            echo "</form></td>";
            break;
          }

        echo "<td><form action=\"../includes/member_edit.incl.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"$zeile[0]\"/>";
        echo "<input type=\"submit\" name=\"delete\" value=\"löschen\">";
        echo "</form></td>";
        echo "</tr>";
    }
  echo "</table>";
  mysqli_close($db);
}
