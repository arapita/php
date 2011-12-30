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
	
	$id_zad=$_GET['id'];
	
	$stmt = $pdo -> query("SELECT * FROM zadanie WHERE id_zadanie=$id_zad");
	
	
?>
		
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
	
	
	echo '
	
		<form method="post" action="koment.php">
		<input type="hidden" name="id" value="'.$id_z; echo '" />
		<b>Komentarz: </b>
		<p></br><textarea name="koment" rows="7" cols="50"></textarea></p>
		
		<p>Autor: <input type="text" name="autor"/></p>
		<input type="hidden" name="usun" value="0"/>
		<input type="hidden" name="ukryj" value="0"/>
		<input type="hidden" name="czy_przeczytany" value="0"/>
	
		<input type="submit" value="Dodaj"/>
		</form>
	';

	
    echo '</ul>';
	
	
	$stmt = $pdo -> query("SELECT * FROM komentarz a, zadanie b WHERE a.id_zadanie=$id_z AND b.id_zadanie=a.id_zadanie ORDER BY data_komentarz DESC");
	
	echo "<font size=4><b>Komentarze:</b></font>";
	
	foreach($stmt as $row)
    {
     echo "
		
	  <tr>
			
			<b></b> <table width=\"400\" height=\"50\" border=\"1\"> <td width=\"7%\">".$row['komentarz']."</td></table>
			<b>Autor:</b> <td width=\"2%\">".$row['autor']."</td>,  
			<b>Data dodania:</b> <td width=\"2%\">".$row['data_komentarz']."</td><br />
			
			</tr><br />";
	}
	
    $stmt -> closeCursor(); // zamkni?cie zbioru wynik?w 
	
	
?>			
        	  
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
