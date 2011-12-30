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
	

	if($_GET['sort']==1){
		$stmt = $pdo -> query("SELECT * FROM zadanie WHERE ukryj=0 AND usun=0 ORDER BY tresc ASC");
		}
	else if($_GET['sort']==0){
		$stmt = $pdo -> query("SELECT * FROM zadanie WHERE ukryj=0 AND usun=0 ORDER BY tresc DESC");
	}
	else
	$stmt = $pdo -> query("SELECT * FROM zadanieWHERE ukryj=0 AND usun=0");
	
	if($_GET['kategoria']=='mat'){
		$stmt = $pdo -> query("SELECT * FROM zadanie a, zadanie_kategoria zk WHERE zk.id_kategoria=1 AND zk.id_zadanie=a.id_zadanie;");
	}
	if($_GET['kategoria']=='jp'){
		$stmt = $pdo -> query("SELECT * FROM zadanie a, zadanie_kategoria zk WHERE zk.id_kategoria=2 AND zk.id_zadanie=a.id_zadanie;");
	}
	if($_GET['kategoria']=='his'){
		$stmt = $pdo -> query("SELECT * FROM zadanie a, zadanie_kategoria zk WHERE zk.id_kategoria=3 AND zk.id_zadanie=a.id_zadanie;");
	}
	if($_GET['kategoria']=='bio'){
		$stmt = $pdo -> query("SELECT * FROM zadanie a, zadanie_kategoria zk WHERE zk.id_kategoria=4 AND zk.id_zadanie=a.id_zadanie;");
	}
	if($_GET['kategoria']=='inf'){
		$stmt = $pdo -> query("SELECT * FROM zadanie a, zadanie_kategoria zk WHERE zk.id_kategoria=5 AND zk.id_zadanie=a.id_zadanie;");
	}
	if($_GET['kategoria']=='geo'){
		$stmt = $pdo -> query("SELECT * FROM zadanie a, zadanie_kategoria zk WHERE zk.id_kategoria=6 AND zk.id_zadanie=a.id_zadanie;");
	}
	
	
?>
		<a href="view.php?sort=1">Sortuj A-Z</a>
		<a href="view.php?sort=0">Sortuj A-Z</a>
	<br /> <br /><br />
<?php	
    echo '<ul>';
	
	
    foreach($stmt as $row)
    {
     echo "

	  <tr>
			
			<b>Tresc zadania:</b> <table width=\"300\" border=\"1\"> <td width=\"6%\">".$row['tresc']."</td></table>
			<b>Rozwiazanie:</b>  <table width=\"300\" border=\"1\"> <td width=\"6%\">".$row['rozwiazanie']."</td></br> </table>
			<b>Poziom trudnosci:</b> <td width=\"2%\">".$row['poziom_trudnosci']."</td><br /> ";
		
		$id_z=$row['id_zadanie']; 
	
		$stm = $pdo -> query("SELECT a.nazwa FROM kategoria a,  zadanie_kategoria zk WHERE a.id_kategoria=zk.id_kategoria AND zk.id_zadanie=$id_z");
		
			echo "<b>Kategoria:</b> ";
			
			foreach($stm as $ro){
			echo "<tr> <td width=\"2%\">".$ro['nazwa'].",</td>";
			
			}
			echo '<br />';
			
	  echo "
			Data dodania: <td width=\"2%\">".$row['data_dodania']."</td> 
			Data modyfikacji: <td width=\"2%\">".$row['data_modyfikacji']."</td>			
			
			</tr><br />";
?>			
			
<?php 
	}
    $stmt -> closeCursor(); // zamkni?cie zbioru wynik?w 
		
    echo '</ul>';
?>		

	<a href="add.php">Dodaj nowe zadanie</a> <br />
	<a href="TaskManager.php">Menadzer zadan</a>
	
	<a href="view.php?kategoria=mat">Matematyka</a>
	<a href="view.php?kategoria=jp">Jezyk Polski</a>
	<a href="view.php?kategoria=his">Historia</a>
	<a href="view.php?kategoria=bio">Biologia</a>
	<a href="view.php?kategoria=inf">Informatyka</a>
	<a href="view.php?kategoria=geo">Geografia</a>
	
	<br>Wyszukiwanie:
	<form method="post" action="search.php">
	<input type="text" name="SzukanaNazwa"/>
	</form>
	
        	  
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
