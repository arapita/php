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
		$stmt = $pdo -> query("SELECT * FROM zadanie  WHERE ukryj='0' AND usun='0' ORDER BY tresc  ASC;");
		}
	else if($_GET['sort']==0){
		$stmt = $pdo -> query("SELECT * FROM zadanie  WHERE ukryj='0' AND usun='0' ORDER BY tresc  DESC;");
	}
	else
		$stmt = $pdo -> query("SELECT * FROM zadanie WHERE ukryj='0' AND usun='0';");
		
?>
		<a href="view.php?sort=1">Sortuj A-Z</a>
		<a href="view.php?sort=0">Sortuj Z-A</a>
	
<?php	
    echo '<ul>';
	
	
    foreach($stmt as $row)
    {
      echo "<tr>
			
			Tresc zadania: <table width=\"300\" border=\"1\"> <td width=\"6%\">".$row['tresc']."</td></br> </table>
			Rozwiazanie:  <table width=\"300\" border=\"1\"> <td width=\"6%\">".$row['rozwiazanie']."</td></br> </table>
			Poziom trudnosci: <td width=\"2%\">".$row['poziom_trudnosci']."</td> ";
		
		/*$stm = $pdo -> query("SELECT a.nazwa, b.tresc FROM kategoria a, zadanie b, zadanie_kategoria ak WHERE a.id_kategoria=ak.id_kategoria AND ak.id_zadanie=59;");
		//$id_cos=$row['id_zadanie'];
		//$stm = pdo -> query("SELECT a.nazwa FROM kategoria a, zadanie b, zadanie_kategoria ak WHERE a.id_kategoria=ak.id_kategoria AND ak.id_zadanie='$id_cos'");
			echo "Kategoria: <br />";
			
			foreach($stm as $ro){
			echo "<tr> <td width=\"2%\">".$ro['nazwa']."</td> <br />";
			
			}*/
			
			
	  echo "
			Data dodania: <td width=\"2%\">".$row['data_dodania']."</td> 
			Data modyfikacji: <td width=\"2%\">".$row['data_modyfikacji']."</td>			
			
			</tr></br>";
?>	

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
		<a href="delete.php?usun=1&id=<?php echo $row['id_zadanie']?>">Usun</a>
		
		<?php } ?>

		</span>
		
		
			
<?php 
	}
    $stmt -> closeCursor(); // zamkni?cie zbioru wynik?w 
		
    echo '</ul>';
?>		

	<a href="add.php">Dodaj nowe zadanie</a>
	
	<br>Wyszukiwanie:
	<form method="post" action="search.php">
	<input type="text" name="SzukanaNazwa"/>
	</form>
	
	
	
	
	
	