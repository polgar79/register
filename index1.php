<?php 
session_start();
//echo $_SESSION['OID'];

if (isset($_SESSION['OID']))
  {
//include_once  'class/db.php';
include 'includes/header.php';
?>
<h1>Adminisztráció</h1>

<?php 

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

