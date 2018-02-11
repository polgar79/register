<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Főoldal</title>
    </head>

<body>
	


<?php 
session_start();
//echo $_SESSION['OID'];

if (isset($_SESSION['OID']))
  {
include 'includes/header.php';
if(isset($_GET['edit']))
    echo "van";
else echo "nincs";



include 'includes/footer.php';
    
  }
  
  else 
  {
      
     // print_r($_SERVER);
     $domain = $_SERVER['SERVER_NAME'];
     if ($domain == "localhost") 
     
        {
            header('Location: index.php');
         }
     
  }
?>
</body>

</html>
