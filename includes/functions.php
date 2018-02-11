<?php 
include 'class/db.php';
function dinamicPageTitle() {

    $parts = explode('/', $_SERVER["SCRIPT_NAME"]);
    $page = $parts[count($parts) - 1];
    
    switch ($page){
        case 'index1.php':
            return $title= HOMETITLE;
            break;
            
        case 'add_user.php':
            return $title= ADD_PA_USER;
            break;
            
        case 'userlist.php':
            return $title= EDIT_U_DATA;
            break;
            
        case 'payment.php':
            return $title= ADD_P;
            break;
            
        case 'search.php':
            return $title= SEARCH;
            break;

    }
    

    
}
function passwordChange($password) {
   
    $db = new Db();
    $query = "UPDATE operator SET password='{$password}' WHERE id=1";
   
    $result = mysqli_query($db->conn, $query);
    
    if (!$result) {
        echo  mysqli_error($db->conn);
    }
    
    else echo " Mentve";
    return $result;
}

function passwordHash($pass) {
    
    $hashadpass = password_hash($pass, PASSWORD_DEFAULT);
    return $hashadpass;
   
}


?>