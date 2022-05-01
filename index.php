<?php
include_once('header.php');
if(isset($_SESSION['benutzername']))
    {
    echo "hallo " . $_SESSION['benutzername'];
    }
exit();
?>



  </body>
</html>
