<?php   session_start(); 
include('skrypty.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Captive Green 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20111225

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Strona z Zadaniami </title>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Marvel' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Marvel|Delius+Unicase' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="wrapper2">
		<div id="header" class="container">
        
			<div id="logo">
				<h1><a href="index.php">Strona z <span>Zadaniami </span></a></h1>
			</div>
			<div id="menu">
				<ul>
					<li class="current_page_item"></li>
					<li><a href="login_form">Konto</a></li>
					<li><a href="zad.php">Zadania</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</div>
		</div>
		<div id="banner"></div>
		<!-- end #header -->
		<div id="page">
       
			<div id="content">
	
 <?php
require("db.php");

$id = $_GET['id'];
$ukryj = $_GET['ukryj'];
if (!$id) {
echo $komunikat = "<span class='error'>Złe parametry<span>";
exit;
}

try {
      $pdo = new PDO('mysql:host='.$host.';dbname='.$database.
	  	  ';port='.$port, $username, $password);
			} catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
			}
			
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


if($ukryj==1){
$stmt = $pdo -> query("UPDATE zadanie SET ukryj='1' WHERE id_zadanie='$id';");
$ilosc = 0;
}
else{
$stmt = $pdo -> query("UPDATE zadanie SET ukryj='0' WHERE id_zadanie='$id';");
$ilosc = 1;
}

if ($ukryj == 0 ) {
if ($ilosc ) $komunikat = "Zadanie bedzie juz widoczne"; 
else $komunikat = "<span class='error'>To zadanie bylo juz widoczne</span>";
} elseif ($ukryj == 1 && $ilosc ) $komunikat = "Ukryto zadanie"; 
else $komunikat = "<span class='error'>To zadanie jest juz ukryte</span>";

?>

<p id="commit" ><?php echo $komunikat?></p>
<a href="view.php" >Powrót</a>

	
	
	
    
        


        	  
			  <div style="clear: both;">&nbsp;</div>
              
              
			</div>
			<!-- end #content -->
            
            
            
            
            <!-- end #sidebar -->
		  <div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #page -->
		<div id="footer">
			<p>Copyright (c) 2011 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
		</div>
	</div>
</div>
<!-- end #footer -->
</body>
</html>
