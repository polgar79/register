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

if(isset($_POST['keres']))
{
    $_SESSION['van'] = $_POST['keresnev'];
}

$db = new Db();
if (isset($_GET['page']))
{
        $page = $_GET['page'];

         if ($page =="" || $page =='1') {
        
             $page1 = 0;
         }

         else {
         $page1 = ($page*15)-15;
         }
}else $page1 = 0;
 
    ?>
<div class = "tarolo">
    <div class = "kereses">
    <h4>Keresés</h4>
    <form name = "kereso" action ="" method ="post" >
    
    <input type="text" name ="keresnev">
    <input type="submit" name = "keres" value ="keres">
    
    
    </form>
    <br>
    </div>
 <div class ="userlist">                
                <table align ="center">
                 
                 <tr>
    
    <th>Id</th>
    <th>Név</th>
    <th>Születési év</th>
    <th>Helyiség</th>
    <th>Utca</th>
    <th>Házszám</th>
    <th>Szerkeszt</th>
    </tr> 
<?php 

if(!empty($_SESSION['van']))  {
     
    $name1 = $_SESSION['van'];
     
$query = "SELECT * FROM USERDATA WHERE name LIKE '{$name1}%' ORDER BY name LIMIT $page1,15";

$result = mysqli_query($db->conn, $query);
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
    echo $id;
    echo "</td>";
    
    echo "<td>";
    echo $name;
    echo "</td>";
    
    echo "<td>";
    echo $birthdate;
    echo "</td>";
    
   echo "<td>";
    echo $city;
    echo "</td>";
    
    
    
    echo "<td>";
    echo $street;
    echo "</td>";
    
    echo "<td>";
    echo $hnumber;?>
    
    
    </td>
    <td> 
    <a href="edit.php?edit=<?php echo $row['id'];?>" style ="text-decoration:none">Módosít</a>
    </td>
     <td> 
    <a href="delete.php?delete=<?php echo $row['id'];?>" style ="text-decoration:none">Törlés</a>
    </td>
     <td> 
    <a href="inactive.php?inactive=<?php echo $row['id'];?>" style ="text-decoration:none">Inaktív</a>
    </td>
    </tr>
    

    
<?php

}
?>

<?php 
}else 
{

    
    $query = "SELECT * FROM USERDATA ORDER BY name LIMIT $page1,15";
    
    $result = mysqli_query($db->conn, $query);
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
        echo $id;
        echo "</td>";
        
        echo "<td>";
        echo $name;
        echo "</td>";
        
        echo "<td>";
        echo $birthdate;
        echo "</td>";
        
        echo "<td>";
        echo $city;
        echo "</td>";
        
        
        
        echo "<td>";
        echo $street;
        echo "</td>";
        
        echo "<td>";
        echo $hnumber;?>
    
    
    </td>
    <td> 
    <a href="edit.php?edit=<?php echo $row['id'];?>" style ="text-decoration:none">Módosít</a>
    </td>
     <td> 
    <a href="delete.php?delete=<?php echo $row['id'];?>" style ="text-decoration:none">Törlés</a>
    </td>
     <td> 
    <a href="inactive.php?inactive=<?php echo $row['id'];?>" style ="text-decoration:none">Inaktív</a>
    </td>
    </tr>
    
    
    </table>
    
    
<?php     
    
    }
}
?>

   <!-- Lapozás -->
  <div class= "pagenav">
   <table>
   		
    
    
</table>
</div>
</div>
<div class ="navi">
<?php 

if(!empty($_SESSION['van'])){

 $name2 = $_SESSION['van'];
$query2 = "SELECT * FROM userdata WHERE NAME LIKE '{$name2}%'";
$result2 = mysqli_query($db->conn, $query2);

$count = mysqli_num_rows($result2);
$a = $count/15;
$a = ceil($a);
for ($i = 1; $i < $a; $i++) {
    
    ?> <a href ="userlist.php?page=<?php echo $i;?>"style ="text-decoration:none"><?php echo $i." "; ?></a> <?php
            

     
  
  }
}
   ?>
</div>
</div>
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
</body>

</html>

