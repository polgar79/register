<?php 
session_start();
if (isset($_SESSION['OID'])){
    
include 'includes/header.php';
?>
<h1>Adminisztráció</h1>

<?php 
include 'includes/footer.php';
    
}else{

     $domain = $_SERVER['SERVER_NAME'];
     if ($domain == "localhost"){
            header('Location: index.php');
         }
  }
?>

