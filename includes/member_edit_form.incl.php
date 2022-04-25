<?php
include_once('../header.php');
require_once('db_config.php');
if(isset($_SESSION['benutzername']) && $_SESSION['rang'] == 'admin')
  {
    $sql="SELECT id, benutzername, rang FROM users WHERE id=$_GET[id]";
    $data = mysqli_query($db, $sql) or exit("sql-error: $sql");
    if ($zeile=mysqli_fetch_row($data))
        {
        echo "<form action=\"member_edit.incl.php\" method=\"post\">";
        echo "<br>ID: <input type=\"text\" name=\"id\" readonly value=\"$zeile[0]\">";
        echo "<br>Benutzername: <input type=\"text\" name=\"benutzername\" value=\"$zeile[1]\">";
        echo "<br>Rang: <input type=\"text\" name=\"rang\" value=\"$zeile[2]\">";
        echo "<br><input type=\"submit\" name=\"do_edit\" value=\"Ändern\">";
        echo "</form>";
        }
        else{
        echo "$_GET[id] nicht vorhanden";
        }
      mysqli_close($db);
    }
  else{
    header('Location: ' . $start);
    exit;
    }
