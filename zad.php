<?php

	$conn = mysql_connect('localhost','root','dosome12');
    if (!$conn) { 
	    die('You cannot connect: '.mysql_error()); 
	 }
    echo 'You are connected!';
    mysql_close($conn);
		

$host = 'localhost';
$port = '3306';
$username = 'root';
$password = 'dosome12';
$database = 'mysql';
//$today = date("Y/m/d");

	try
	{
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{ 
		
			try {
      $pdo = new PDO('mysql:host='.$host.';dbname='.$database.
	  	  ';port='.$port, $username, $password);
			} catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
			}
			
			$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$stmt = $pdo -> prepare('INSERT INTO zadanie 
				(tresc, rozwiazanie, data_dodania, data_modyfikacji, poziom_trudnosci, usun, ukryj) VALUES(
				:tresc, :rozwiazanie, :data_dodania, :data_modyfikacji, :poziom_trudnosci, :usun, :ukryj)');     // 1
			
			$stmt -> bindValue(':tresc', $_POST['tresc'], PDO::PARAM_STR); // 2
			$stmt -> bindValue(':rozwiazanie', $_POST['rozwiazanie'], PDO::PARAM_STR);
			$stmt -> bindValue(':data_dodania', date("Y/m/d") , PDO::PARAM_INT);
			$stmt -> bindValue(':data_modyfikacji', date("Y/m/d") , PDO::PARAM_INT);
			$stmt -> bindValue(':poziom_trudnosci', $_POST['poziom_trudnosci'], PDO::PARAM_INT);
			$stmt -> bindValue(':usun', $_POST['usun'], PDO::PARAM_INT);
			$stmt -> bindValue(':ukryj', $_POST['ukryj'], PDO::PARAM_INT);
			
			
			
			$ilosc = $stmt -> execute(); // 3

			if($ilosc > 0){
							echo 'Dodano: '.$ilosc.' rekordow<br />';
			}
			else{
							echo 'Wystapil blad podczas dodawania rekordow!';
			}
		
			$tresc=$_POST['tresc'];
			
			$stmt = $pdo -> query("SELECT id_zadanie FROM zadanie WHERE tresc='$tresc'");
			
			foreach($stmt as $row){
	  
			$id_zad=$row['id_zadanie'];
	
		}
		
			$kat=$_POST['kategoria'];
			if ($kat){
			foreach ($kat as $t){
		
			$stmt = $pdo -> query("SELECT id_kategoria FROM kategoria WHERE nazwa='$t'");
			
			foreach($stmt as $row){
	  
			$id_kat=$row['id_kategoria'];
	  
		}
			$stmt = $pdo -> query("INSERT INTO zadanie_kategoria (id_kategoria, id_zadanie) VALUES ($id_kat, $id_zad)");
			}
		}	
	
		}
			
		
		else{
			echo 'Nie przeslano danych metod? POST';      
		}
	}
	catch(PDOException $e)
	{
					echo 'Wystapil blad biblioteki PDO: ' . $e->getMessage();
	}
		
		
?>

<a href="view.php" >Powrót</a>