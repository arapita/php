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
<title>Strona z Zadaniami</title>
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
			  <div class="post">
				<h2 class="title"><a href="#">
                
                <?php
				if (!empty($_SESSION['login'])) echo "zalogowany";
				else {
				if (login()==0 )echo "Nie ma takiego konta <a href='login_form.html'> powrot</a>" ;
				if (login()==1 )echo "Błędne hasło! <a href='login_form.html'> zaloguj</a>" ;
				if (login()==2 )
				{
							echo "Witaj! <a href='login_form.html'> zaloguj</a>" ;
							$_SESSION['login']=$user['login'];
							$_SESSION['kategoria']=$user['kategoria'];
				
				}
							
				if (login()==3 )echo "Musisz się zalogować! <a href='login_form.html'> zaloguj</a>" ;
				}
				?>
                </a></h2>
					<p class="meta">&nbsp;
                    
  
                  
                    </p>
</div>
			  <div style="clear: both;">&nbsp;</div>
			</div>
			<!-- end #content --><!-- end #sidebar -->
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
