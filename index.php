<?php
include_once('header.php');
if(isset($_SESSION['status']))
{
  if($_SESSION['status']=='passiv')
    {
    echo "Du bist gesperrt";
    session_unset();
    session_destroy();
    }


  elseif($_SESSION['status']=='aktiv')
      {
        if(isset($_SESSION['benutzername']))
          {
          echo "hallo " . $_SESSION['benutzername'];
          }
      }
}
exit();
?>



  </body>
</html>
