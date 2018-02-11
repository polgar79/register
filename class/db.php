<?php

include 'includes/config.php';
class Db {
    public $conn;
    function __construct()
    
    {
        $this->conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die (mysqli_error($this->conn));
       
        mysqli_set_charset($this->conn,"utf8");
      // print  mysqli_character_set_name($this->conn);
      // echo "Kapcsolódva";
        
    }
    
    public function add_new_user($name,$birthdate,$active,$city,$street,$hnumber)
    
    {
        $query = "INSERT INTO USERDATA (name,birthdate,active,city,street,hnumber) VALUES('$name','$birthdate','$active','$city','$street','$hnumber')";
        
        $result = mysqli_query($this->conn, $query);
       
        if (!$result) {
           echo  mysqli_error($this->conn);
        }
        
        else echo " Mentve";
        return $result;
        
    }
    
    public function streetlist()
    
    {
      $query = "SELECT * FROM STREETS ORDER BY 	streetname";
      $result = mysqli_query($this->conn, $query)  ;
      return $result;
         
    }
    
    public function userlist()
    
    {
        $query = "SELECT * FROM USERDATA where active = 1 ORDER by name";
        $result = mysqli_query($this->conn, $query)  ;
        
        return $result;
    }
    

    function add_new_amount($date,$userdata_id,$amount) {
        
        $query = "INSERT INTO despoit (date,userdata_id,amount) VALUES('$date','$userdata_id','$amount')";
        
        $result = mysqli_query($this->conn, $query);
        
        if (!$result) {
            echo  mysqli_error($this->conn);
        }
        
        else echo " Mentve";
        return $result;
        
        
    }
    
    
    
    
}


?>

