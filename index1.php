<?php 
session_start();
echo $_SESSION['OID'];

if (isset($_SESSION['OID']))
  {
//include_once  'class/db.php';
include 'includes/header.php';
?>
<h1>London</h1>
<p>London is the capital city of England. It is the most populous city in the  United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
<p>Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.</p>
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

