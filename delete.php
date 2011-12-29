<?php
require("db.php");

$id = $_GET['id'];
$usun = $_GET['usun'];
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


if($usun==1){
$stmt = $pdo -> query("UPDATE zadanie SET usun='1' WHERE id_zadanie='$id';");
}

$komunikat = "Zadanie zostalo oznaczone do usuniecia";

/*
if ($ukryj == 0 ) {
if ($ilosc ) $komunikat = "Zadanie bedzie juz widoczne"; 
else $komunikat = "<span class='error'>To zadanie bylo juz widoczne</span>";
} elseif ($ukryj == 1 && $ilosc ) $komunikat = "Ukryto zadanie"; 
else $komunikat = "<span class='error'>To zadanie jest juz ukryte</span>";
*/
?>

<p id="commit" ><?php echo $komunikat?></p>
<a href="view.php" >Powrót</a>
