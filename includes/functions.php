<?php 
function dinamicPageTitle() {

    $parts = explode('/', $_SERVER["SCRIPT_NAME"]);
    $page = $parts[count($parts) - 1];
    
    switch ($page){
        case 'index1.php':
            return $title= HOMETITLE;
            //$description = 'index description here';
            break;
            
        case 'add_user.php':
            return $title= ADD_PA_USER;
           // $description = 'about description here';
            break;

             
    }
    
}


?>