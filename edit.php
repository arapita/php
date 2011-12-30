<?php
require("db.php");

$id = $_GET['id'];
$tresc = $_POST['tresc'];
$rozwiazanie = $_POST['rozwiazanie'];
$dataMod = date("Y/m/d");
$poziom = $_POST['poziom_trudnosci'];

if (!$id) {
echo $komunikat = "<span class='error'>Z³e parametry<span>";
exit;
}

try {
      $pdo = new PDO('mysql:host='.$host.';dbname='.$database.
	  	  ';port='.$port, $username, $password);
			} catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
			}
			
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			
			
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
			//nie przyjmuje id_kategorii w zapytaniu sql
			$stmt = $pdo -> query("SELECT id_zadanie_kat FROM zadanie_kategoria WHERE id_kategoria=$id_kat AND id_zadanie=64");
			
			foreach($stmt as $row){
			//echo "$id_kat ,";
			
			$id_zad_kat=$row['id_zadanie_kat'];
			}
			
			echo "".$id_zad_kat;
			
			
			//$stmt = $pdo -> query("UPDATE zadanie_kategoria SET id_kategoria='$id_kat', id_zadanie='$id_zad' WHERE id_zadanie_kat='$id_zad_kat'");
			}
		}

			$stmt = $pdo -> query("UPDATE zadanie SET tresc='$tresc', rozwiazanie='$rozwiazanie', data_modyfikacji='$dataMod', 
								poziom_trudnosci='$poziom_trudnosci' WHERE id_zadanie='$id'");
								
	
	$komunikat = "Zadanie zostalo zmodyfikowane";
?>
	
	<p id="commit" ><?php echo $komunikat?></p>
	<a href="view.php" >Powrót</a>		


