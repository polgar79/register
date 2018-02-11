
<?php
session_start();
if(isset($_SESSION['OID'])) {
include 'includes/header.php';
$db = new Db(); 
  ?>
<div class ="searchcont">
    <div class="keresobox">
    	<div class ="utcasz">
        		<!-- Utca szerinti keresés -->
        		<form name ="utcaszerint" method ="post" action="">
        			<label>Utca szerint</label>
        			<input type="text" name ="utca">
        			<input type="submit" name ="utcasz" value ="Keresés">
				</form>
    	</div>
    	<div class ="fszerint">
       			<!-- Fizetés szerinti keresés -->
       			<form>
       			    <label>Fizetés szerint</label>
        			<input type="text" name ="fizetsz">
        			<input type="submit" name ="fizet" value ="Keresés">
				</form> 
    	</div>
    </div>
   <div class ="keresobox1">
   		<div class ="utcasz1">
        	<!-- Dátum szerinti keresés -->
        	<form>
        			<label>Dátum szerint</label>
        			<input type="text" name ="datum">
        			<input type="submit" name ="datum" value ="Keresés">
				</form>
        	
    	</div>
    	<div class ="fszerint1">
        	<form name ="nevszerint" method ="post" action="">
        			<label>Név szerint</label>
        			
        			<select id="cmbUser" name="nev"">
   				 <?php 
                     
                     $result = $db->userlist();
                    
                     while ($row = mysqli_fetch_array($result))
                     {
                         
                            if ($row['id'] == $_POST['nev'])
                             $selected = "selected=\"selected\"";
                             else
                                 $selected = "";
                                 echo "<option value=\"".$row['id']."\" $selected>".$row['name']."</option>\n ";
                   
                      }
                      echo '  </select>';
                     ?>
        			
        			
        			
        			<input type="submit" name ="submitname" value ="Keresés">
				</form>
    	</div>
  </div>
     <div class="talalat">
             
  <?php 
 
  
  
  
      switch (true) {
            case isset ($_POST['submitname']):
                
                if((!$_POST['nev']) ==""){
                    
          
                     
               echo '<table align ="center"> ';
                
               $name = $_POST['nev'];
              // print_r( $_POST);
               echo '<div class="talalat" id ="talaltnev" >';
               $query1 = "SELECT *  FROM USERDATA where userdata.id  = '{$name}' and active=1";
               $result1 = mysqli_query($db->conn, $query1);
               while ($row = mysqli_fetch_array($result1)){
                
                   $name1   = $row['name'];
                   echo "$name1";
                   
               }
               
              echo' </div>';
               
               $query = "SELECT * FROM USERDATA inner JOIN despoit ON (userdata.id = despoit.userdata_id) AND userdata.id  = '{$name}' and active =1 ";
               $result = mysqli_query($db->conn, $query)  ;
              // $result = $db->get_user_payment($name);
               
               while ($row = mysqli_fetch_array($result))
               {
                   $id        = $row['id'];
                   $name   = $row['name'];
                   $birthdate =$row['birthdate'];
                   $city      =$row['city'];
                   $street     =$row['street'];
                   $hnumber    =$row['hnumber'];
                   $date    =$row['date'];
                   $amount = $row['amount'];
                   echo '<tr>';
                   echo '<td>';
                  // echo $name;
                   echo '</td>';
                   echo '<td>';
                   echo $date;
                   echo '</td>';
                   echo '<td>';
                   echo $amount." Ft";
                   echo '</td>';
                   echo '</tr>';
                   
               }
                
               echo '</table>';
                
                
                
                
                }
                else 
                    echo "Nincs kitöltve a név!!";
      
      
      break;
      
      case isset ($_POST['utcasz']):
          
          echo "Utca szerint";
          
          
          ;
      break;
              } 
?>    
    
   </div> 
    <div class="lapozo">
    Lapozó
    </div>
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