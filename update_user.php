<?php
session_start();
if(isset($_SESSION['OID'])) 
{
    include 'includes/header.php';?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Adatmódosítás</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Adatmódosítás</h1>

<form name ="fkeres" action ="" method = "post">
	<table align ="center">
		<!-- Első sor -->
		<tr>
			<td>Felhasználói név</td>
			<td>
			<select id="cmbUser" name="user" >
   				 <?php 
                     $db = new Db();
                     $result = $db->userlist();
                    
                     while ($row = mysqli_fetch_array($result))
                     {
                         
                   ?>
                          <option>
    							 <?php echo $row['name'];?>
     					  </option> 
     					         
                  <?php 
                      }
                     ?>
                    
 
 
  </select>
			</td>
			<td colspan="2"><input type="submit" name ="submit" value="Keresés"></td>
		</tr>
	</table>
	<br>
		
		
		
	</form>
	


		<?php 
            if(isset($_POST['submit']))
    {
               
                $db = new Db();
                $search_name =$_POST['user'];
                 $query = "SELECT * FROM USERDATA WHERE name = '$search_name' ";
                 $result = mysqli_query($db->conn, $query);
        ?>
                 
                <table align ="center">
                 
                 <tr>
    <th>Id</th>
    <th>Név</th>
    <th>Születési év</th>
    <th>Helyiség</th>
    <th>Utca</th>
    <th>Házszám</th>
    </tr> 
                 
                
                 <form name ="userupdate" action ="" method = "post">
                  <?php 
                         while ($row = mysqli_fetch_array($result))
                             {
                                 $id        = $row['id'];
                                 $name   = $row['name'];
                                 $birthdate =$row['birthdate'];
                                 $city      =$row['city'];
                                 $street     =$row['street'];
                                 $hnumber    =$row['hnumber'];
                              
                                    
                                 
                                    echo "<tr>";
                                    
                                    echo "<td>";
                                    echo "<a href='edit.php?edit=$row[ID]'>Edit</a>";
                                    echo "</td>";
                                        echo "<td>";
                                          echo "<input type='text' name='name' value = '$name'>";
                                        echo "</td>";
                                
                                        echo "<td>";
                                            echo "<input type='text' name='birthdate' value = '$birthdate'>";
                                        echo "</td>";
                                    
                               
                                    
                                        echo "<td>";
                                            echo "<input type='text' name='city' value = '$city'>";
                                        echo "</td>";
                                    
                                    
                                    
                                        echo "<td>";
                                             echo "<input type='text' name='street' value = '$street'>";
                                        echo "</td>";
                                     
                                        echo "<td>";
                                            echo "<input type='text' name='hnumber' value = '$hnumber'>";
                                            
                                            
                                        echo "</td>";
                                     echo "</tr>";
                             }
                ?>             
                		
                		<table align="center"><br>
                			<tr >
               				 <td colspan ="5" align="center">
               				 <input type ="submit" value ="Frissit" name ="update" >
              				  </td>
                			</tr>
                       </table>
                
                </form>
                
                </table>
                
                <?php 
      }
          
                

if(isset($_POST['update']))
   {
    // print_r($_POST) ;
     $id = $_POST["id"];
    // $name = $_POST["name"];   
     $birthdate = $_POST["birthdate"]; 
     $city = $_POST["city"];
     $street = $_POST["street"]; 
     $hnumber = $_POST["hnumber"]; 

     $qupdate = "UPDATE USERDATA SET birthdate='$birthdate', city='$city' ,street='$street' , hnumber='$hnumber'  WHERE id='$id'";
 
 if ((mysqli_query($db->conn, $qupdate) == true))
 
 {
     echo ("Frissítve");
    // header('Location: update_user.php');
     
 }
     
     


}
else(mysql_error());


   ?>
</body>
</html>
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