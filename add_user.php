<?php
session_start();
if(isset($_SESSION['OID'])) {
include 'includes/config.php';
include 'includes/header.php';
include 'class/functions.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Befizető felvétele</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class ="adduser">
	<form name ="useradd" action ="" method = "post">
		<div class="cim">
		<?php echo _ADD_USER_TITLE;?>
		</div>
		<div class="adduser" id ="name">
		<label>Vezetéknév:</label>
		<input type="text" name="vname" maxlength="10" size="10">
		<label>Keresztnév:</label>
		<input type="text" name="kname" maxlength="10" size="10">
         </div>	
         
         <div class="adduser" id ="name">
         <label>Szültési év:</label>
        <input type="text" name="birthdate" maxlength="4" size="4">
         
  		<label>Település:</label>
  		<input type="text" name="city"  maxlength="8" size="8">
  		
  		</div>
         
         
		<div class="adduser" id ="cb">
    	<label>Utcanév:</label>
    	<select id="cmbMake" name="street" >
    	<?php 
            $db = new Db();
            $result = $db->streetlist();
             while ($row = mysqli_fetch_array($result))
             {
        ?> 
     		<option>
    		 <?php echo $row['streetname'];?>
    		</option>
     <?php }?>
  		</select>
  			<label>Házszám:</label>
  			<input type="text" name="hnumber" maxlength="4" size="4">
  		</div>
  		
  		<div class="adduser" id ="submituser">
  		  <input type="submit" value="Felvétel" name ="useradd">
  		</div>
  	
	
	</form>

</div>



<?php 
//USERDATA TABLE
//VORNAME,LASTNAME,BIRTHDATE,AKTIVE,CITY,STREET,HMUMBER
$db = new Db();

if(isset($_POST["useradd"]))
   {
     $vname = $_POST["vname"];  
     $kname = $_POST["kname"];
     
     $name = $vname." ".$kname;
     
     
     $birthdate = $_POST["birthdate"]; 
     
     
    
    
     $city = $_POST["city"];
     $street = $_POST["street"]; 
     $hnumber = $_POST["hnumber"]; 
     $active = "1";
      
  
     $db->add_new_user($name, $birthdate, $active, $city, $street, $hnumber);
       
   }

?>

<?php include 'includes/footer.php';
}
else {
    $domain = $_SERVER['SERVER_NAME'];
    if ($domain == "localhost")
    
    {
        header('Location: index.php');
    }
}
?>