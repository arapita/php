<?php
require("db.php");

$id = $_GET['id'];
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

echo '<form action="edit.php?id='.$id; echo '" method="post">';
$stmt = $pdo -> query("SELECT * FROM zadanie WHERE id_zadanie='$id';");
WHILE ($field= $stmt->fetch(PDO::FETCH_OBJ)){
$tresc=$field->tresc;
$rozwiazanie=$field->rozwiazanie;


echo '<p>Tresc zadania: <input type="text" name="tresc" value='.$tresc; echo ' /></p>';
echo '<p>Rozwiazanie zadania: </br><textarea name="rozwiazanie" rows="13" cols="50">'.$rozwiazanie; echo ' </textarea></p>';

echo '<p>Poziom trudnosci: <select name="poziom_trudnosci">

		<option value="1">1</option>

		<option value="2">2</option>

		<option value="3">3</option>
		
		<option value="4">4</option>
		
		<option value="5">5</option>

	</select></p>
	
	Wybierze kategorie:<br />
	<select name="kategoria[]" multiple="multiple">
	<option value="Matematyka">Matematyka</option>
	<option value="Jezyk Polski">Jezyk Polski</option>
	<option value="Historia">Historia</option>
	<option value="Biologia">Biologia</option>
	<option value="Informatyka">Informatyka</option>
	<option value="Geografia">Geografia</option>
	</select> <br />';

}
 
		echo '<input type="submit" value="Zmien">';
		echo '</form>';



/*
if ($ukryj == 0 ) {
if ($ilosc ) $komunikat = "Zadanie bedzie juz widoczne"; 
else $komunikat = "<span class='error'>To zadanie bylo juz widoczne</span>";
} elseif ($ukryj == 1 && $ilosc ) $komunikat = "Ukryto zadanie"; 
else $komunikat = "<span class='error'>To zadanie jest juz ukryte</span>";
*/
?>



