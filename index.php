<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Startseite</title>
  </head>
  <body>
<?php
//   session_start();
if($_GET['page']!=='')
  $page = $_GET['page'];

if(isset($_SESSION['user'])):
require_once('ui.php');
else:
  if($page == 'login'):
    echo 'Zum <a href="index.php?page=registrieren2">registrieren</a> hier entlang';
    require_once('login.php');
  elseif($page == 'registrieren'):
    echo 'Zum <a href="index.php?page=login2">login</a> hier entlang';
    require_once('registrieren.php');
  else:
    echo '<a href="index.php?page=registrieren2">registrieren</a> oder <a href="index.php?page=login">einloggen</a>';
  endif;

endif;
?>
  </body>
</html>
