<?php
session_start();
if(isset($_SESSION['OID'])) {
    
//echo $_SERVER['SERVER_NAME'];
include 'includes/header.php';
//include 'includes/functions.php';
$db = new Db();

if(isset($_POST['send']))
    {
   
    $pass = $_POST['password'];
   echo  $hashadpass = passwordHash($pass);
   passwordChange($hashadpass);
    }

?>
<div class ="sett">

	<div class ="sett" id ="pass">

	<form name="passchange" action="" method="post">
	<label>Új Jelszó:</label>
	<input type="text" name="password">
	</div>
	<div class ="sett" id ="pass">
	<input type="submit" name="send" value="Ment">
	
	</form>
	</div>
</div>

<?php include '/includes/footer.php';
}
else {
    $domain = $_SERVER['SERVER_NAME'];
    if ($domain == "localhost")
    
    {
        header('Location: index.php');
    }
}
?>