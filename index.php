<?php 
include 'class/db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

<body>
<div class="login">
	<form name ="flogin" action ="" method = "post">
	
	
	  <div class="login" id ="box">
	  <label>Felhasználói név:</label>
	  <input type="text" name="login_name" required="required">
	 </div>
	 
	 <div class="login" id ="box">
	 <label>Jelszó:</label>
	 <input type="password" name="user_password" required="required">
	 </div>
	 <div class="login" id ="box">
	 <br>
	 <input type="submit" name = "submit" value="Bejelentkezés">
	 </div>
</form>
<div>

<?php
$db = new Db();
if(isset($_POST['submit']))
{
    session_start();
   
    $login_name = $_POST['login_name'];
    $user_password = $_POST['user_password'];
    
    $query = "SELECT * FROM operator WHERE username='{$login_name}' ";
    $result = mysqli_query($db->conn, $query);

    
     while($row = mysqli_fetch_array($result)){
       
       $userFromDb =$row['username'];
       $hashedPasswordFromDB = $row['password'];
       $oid = $row['oid'];
        
        if (password_verify($user_password , $hashedPasswordFromDB) and ($userFromDb ==  $login_name)) {
           
            $_SESSION['OID'] = $oid;
            header('Location: index1.php');
            }

         }
}
?>

</div>

</div>
</body>

</html>
