<?php 
include 'class/db.php'; 
include 'lang/lang.php';
include 'includes/functions.php';






?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
<title><?php echo $title = dinamicPageTitle(); ?></title> 
</head>

<body>
<div class="container">

<div id ="header">
   <h3><?php echo PROJECTNAME ;?></h3>
</div>
<div class ="nav2">
  		<ul id="menu">
  			<li><a href="index1.php"><?php echo HOME;?></a></li>
  			<li>
  			<a href=""><?php echo U_MANAGER;?></a>
  				<div>
  				<a href="add_user.php"><?php echo ADD_PA_USER;?></a>
  				<a href="userlist.php"><?php echo EDIT_U_DATA;?></a>

  			
  				</div>
  			</li>
  			<li>
  			<a href=""><?php echo MANAGE_Y_PAYM;?></a>
  			<div>
  				<a href="payment.php"><?php echo ADD_P;?></a>
  				<a href="#"><?php echo STATEMENTS;?></a>

  			
  				</div>
  			
  			
  			</li>
  		
  			<li><a href="search.php"><?php echo SEARCH;?></a></li>
  			
  			<li><a href="#"><?php echo SETTINGS;?></a></li>
  			
  			<li><a href="logout.php"><?php echo LOGOUT;?></a></li>
  		
  		</ul>
	  </div>
	  <div style = "clear:both"></div> 
  
 	

 
<div id="content">


