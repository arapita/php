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
		
			try {
      $pdo = new PDO('mysql:host='.$host.';dbname='.$database.
	  	  ';port='.$port, $username, $password);
			} catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
			}
			
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		
		
	
	if($_GET['sort']==1){
		$stmt = $pdo -> query("SELECT * FROM zadanie ");
		}
	else if($_GET['sort']==0){
		$stmt = $pdo -> query("SELECT * FROM zadanie");
	}
	else
		$stmt = $pdo -> query("SELECT * FROM zadanie");
		
?>
		<a href="view.php?sort=1">Sortuj A-Z</a>
		<a href="view.php?sort=0">Sortuj A-Z</a>
	
    
        
<?php

foreach($stmt as $row)
    {
echo "



  <div class='zadania'>
				<h2 class='title'><a href='index.php'>".$row['tresc']."</a></h2>
					<p class='meta'>&nbsp;
                    
   <tr>
			
			</td></br> </table>
			Rozwiazanie:  ".$row['rozwiazanie']."</td></br> </table>
			Poziom trudnosci: <td width=\"2%\">".$row['poziom_trudnosci']."</td> </br>
			
			Data dodania: <td width=\"2%\">".$row['data_dodania']."</td> <br /> 
			Data modyfikacji: <td width=\"2%\">".$row['data_modyfikacji']."</td>			
			
			</tr></br>
                    </p>
</div>



";

<p class="label" >Widoczny:
			
		<span class="zwykly">

		<?php if ($row['ukryj']) echo "NIE"; else echo "TAK";?>

		<?php if (!$row['ukryj']) { ?>

		<a href="ukryj.php?ukryj=1&id=<?php echo $row['id_zadanie']?>">Ukryj</a> 

		<?php } else {?>

		<a href="ukryj.php?ukryj=0&id=<?php echo $row['id_zadanie']?>">Pokaz</a>

		<?php } if(!$row['usun']) { ?>
		
		</br>
	    <a href="editForm.php?id=<?php echo $row['id_zadanie']?>">Edytuj</a>
		<a href="delete.php?id=<?php echo $row['id_zadanie']?>">Usun</a>
		
		<?php } ?>

		</span>
		
		
			
<?php 
	}
    $stmt -> closeCursor(); // zamkni?cie zbioru wynik?w 
		
	}
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
