
<?php
session_start();
if(isset($_SESSION['OID'])) {
    
include 'includes/header.php';
$db = new Db();

?>

<form name ="payment" action="" method="post">

<div class ="payment">
		
		
		<label> Befizető neve</label>
		<select id="cmbUser" name="user">
   				 <?php 
   				 if(isset($_POST['user'])) 
   				 {
                     $result = $db->userlist();
                    
                     while ($row = mysqli_fetch_array($result))
                     {
                         
                            if ($row['id'] == $_POST['user'])
                             $selected = "selected=\"selected\"";
                             else
                                 $selected = "";
                                 echo "<option value=\"".$row['id']."\" $selected>".$row['name']."</option>\n ";
                   
                      }
                      echo '  </select>';
   				 }else 
   				 {
   				     $result = $db->userlist();
   				     while ($row = mysqli_fetch_array($result))
   				     {
   				         echo "<option value=\"".$row['id']."\" >".$row['name']."</option>\n ";
   				     }
   				     
   				 }
                     ?>
                    

   <input type ="submit" name="ellenoriz" value="Ellenőriz">
</div>

<div class ="payment">
<!-- Befizetés adatbázis művelet -->
<?php 

switch(true)
{
    
    case isset($_POST['send']):
      
        
        $date = $_POST['paydate'];
        $userdata_id =$_POST['user'];
        $amount = $_POST['amount'];
        $db->add_new_amount($date, $userdata_id, $amount);
        
        
     break;
        
    case isset($_POST['ellenoriz']):
       
         $val = $_POST['user'];
         $query = "SELECT * FROM USERDATA WHERE id = '{$val}%'";
         $result = mysqli_query($db->conn, $query);
       
        while ($row = mysqli_fetch_array($result))
        {
            $id =  $row['id'];
            $name   = $row['name'];
            $hnumber    =$row['hnumber'];
            $street      =$row['street'];
            ?>
    
    <div  class ="payment" id ="ellenoriz">  
        <!--   <input type ="text" name="id" value="<?php echo $val; ?>" disabled style="background-color:yellow"> -->   
  		 <label>Név:</label>
  		  <input type ="text" name="1" value="<?php echo $name; ?>" disabled style="background-color:yellow">    
  	     <label>Utca:</label>
           <input type ="text" name="2" value="<?php echo $street; ?>"disabled style="background-color:yellow"> 
    	 <label>Házszám:</label> 
    		<input type ="text" name="3" value="<?php echo $hnumber; ?>"disabled style="background-color:yellow">  
     </div> 
 
            
            <?php 
                  
        }

        break;
  
}


    

 
 
 
 
 




?>
<div class ="payment" id ="save">

<label> Dátum:</label>
		<input type ="date" name ="paydate" data-date-format="DD MMMM YYYY" value="<?php echo date('Y-m-d')?>" >
<label>Összeg: </label>
  <input type ="text" name="amount" maxlength="5" size="5" >
  <input type ="submit" name="send" value="Ment">
</div>
</form>
</div>


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