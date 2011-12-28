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
			
		//$stmt = $pdo -> prepare('UPDATE zadanie SET (tresc, rozwiazanie, poziom_trudnosci) INTO zadanie

		$stmt = $pdo -> query("UPDATE zadanie SET tresc='$tresc', rozwiazanie='$rozwiazanie', data_modyfikacji='$dataMod', 
								poziom_trudnosci='$poziom_trudnosci' WHERE id_zadanie='$id'");
	
	$komunikat = "Zadanie zostalo zmodyfikowane";
?>
	
	<p id="commit" ><?php echo $komunikat?></p>
	<a href="view.php" >Powrót</a>		


