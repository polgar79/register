<?php 
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


?>