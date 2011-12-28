<?php
require("db.php");

$find = $_POST['SzukanaNazwa'];
if (!$find) {
echo $komunikat = "<span class='error'>Nie podales zadnej nazwy do wyszukania<span>";
exit;
}

try {
      $pdo = new PDO('mysql:host='.$host.';dbname='.$database.
	  	  ';port='.$port, $username, $password);
			} catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
			}
			
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$stmt = $pdo -> query("SELECT * FROM zadanie WHERE tresc like '%$find%';");
		


foreach($stmt as $row){
      
	  if($row['tresc']!=NULL){
	  
	  echo "<tr>
			
			Tresc zadania: <table width=\"300\" border=\"1\"> <td width=\"6%\">".$row['tresc']."</td></br> </table>
			Rozwiazanie:  <table width=\"300\" border=\"1\"> <td width=\"6%\">".$row['rozwiazanie']."</td></br> </table>
			Poziom trudnosci: <td width=\"2%\">".$row['poziom_trudnosci']."</td> </br>
			Data dodania: <td width=\"2%\">".$row['data_dodania']."</td> 
			Data modyfikacji: <td width=\"2%\">".$row['data_modyfikacji']."</td>			
			
			</tr></br>";
			
		$cheker=1;
	}

}
if($cheker==1)
$komunikat = "Szukanie zakonczone sukcesem!";
else
$komunikat = "Szukanie nie powiodlo sie";



?>

<p id="commit" ><?php echo $komunikat?></p>
<a href="view.php" >Powrót</a>
