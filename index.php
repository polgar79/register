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
	<table>
		<!-- Első sor -->
		<tr>
			<td>Felhasználói név</td>
			<td><input type="text" name="login_name"></td>
		</tr>
		<tr>
			<td>Jelszó</td>
			<td><input type="text" name="user_password"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name = "submit" value="Bejelentkezés"></td>
		</tr>
		<tr>
			<td>
			<?php 
			/*if(isset($error)) echo ($error);*/
			
			?>
			</td>
		</tr>
	</table>
		
		
		
	</form>
</div>
</body>

</html>
<?php
$db = new Db();
if(isset($_POST['login_name']))
{
   /*Munkamenet indítása*/
   
    session_start();
   
    $login_name = $_POST['login_name'];
    $user_password = $_POST['user_password'];
   // $_SESSION['login_name'] = $login_name;
    /*test kiirtás*/
   // print_r($_SESSION);
    
     $query = "SELECT * FROM OPERATOR WHERE username = '$login_name' and password = '$user_password' ";
     $result = mysqli_query($db->conn, $query);
     
     while($row = $result->fetch_array())
     {
         //echo $row['USERNAME'] . " " . $row['OID'];
         //  echo "<br />";
         $_SESSION['OID'] = $row['oid'];
     }
     
     if(mysqli_num_rows($result) !=0)
     {
         echo ("Van találat");
         echo $_SESSION['OID'];
         echo "<br>";
         header('Location: index1.php');
     }
     else
     {
         
        //header('Location: index.php');
       
         $error = "Rossz bejelentkezési adatok";
         print ($error);
        // echo ("Rossz bejelentkezési adatok");
        // header('Location: ('$_SERVER['SERVER_NAME']')');
         //session_destroy();
     }
    
}
//else echo ('Nincs submit');
?>