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
<meta http-equiv=REFRESH CONTENT='0; URL=http://localhost/projekt/show.php?id= <?php echo "".$_POST['id']; ?>' />
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
					<li><a href="login.php">Konto</a></li>
					<li><a href="view.php">Zadania</a></li>
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
		
		
		try {
      $pdo = new PDO('mysql:host='.$host.';dbname='.$database.
	  	  ';port='.$port, $username, $password);
			} catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
			}
			
			$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$id_zad=$_POST['id'];
			
			
			$stmt = $pdo -> prepare('INSERT INTO komentarz 
				(id_zadanie, autor, komentarz, data_komentarz, usun, ukryj, czy_przeczytany) VALUES(
				:id_zadanie, :autor, :komentarz, :data_komentarz, :usun, :ukryj, :czy_przeczytany)');     // 1
			
			$stmt -> bindValue(':id_zadanie', $_POST['id'], PDO::PARAM_STR); // 2
			$stmt -> bindValue(':autor', $_POST['autor'], PDO::PARAM_STR);
			$stmt -> bindValue(':komentarz', $_POST['koment'], PDO::PARAM_STR);
			$stmt -> bindValue(':data_komentarz', date("Y/m/d") , PDO::PARAM_INT);
			$stmt -> bindValue(':usun', $_POST['usun'], PDO::PARAM_INT);
			$stmt -> bindValue(':ukryj', $_POST['ukryj'], PDO::PARAM_INT);
			$stmt -> bindValue(':czy_przeczytany', $_POST['czy_przeczytany'], PDO::PARAM_INT);
			
			
			
			$ilosc = $stmt -> execute(); // 3
	
	
	
	
        
?>
	
	
	<a href="show.php?id=<?php echo $_POST['id']?>">Powrot</a>
        	  
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
