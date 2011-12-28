<?php

require("db.php");
		
			try {
      $pdo = new PDO('mysql:host='.$host.';dbname='.$database.
	  	  ';port='.$port, $username, $password);
			} catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
			}
			
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		
		
		$stmt = $pdo -> query("SELECT * FROM zadanie WHERE ukryj='0';");
		
		
    echo '<ul>';
		
    foreach($stmt as $row)
    {
      echo "<tr>
			
			Tresc zadania: <table width=\"300\" border=\"1\"> <td width=\"6%\">".$row['tresc']."</td></br> </table>
			Rozwiazanie:  <table width=\"300\" border=\"1\"> <td width=\"6%\">".$row['rozwiazanie']."</td></br> </table>
			Poziom trudnosci: <td width=\"2%\">".$row['poziom_trudnosci']."</td> </br>
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
		<a href="delete.php?id=<?php echo $row['id_zadanie']?>">Usun</a>
		
		<?php } ?>

		</span>
		
		
			
<?php 
	}
    $stmt -> closeCursor(); // zamkni?cie zbioru wynik?w 
		
    echo '</ul>';
?>		

	<a href="add.html">Dodaj nowe zadanie</a>
	
	<br>Wyszukiwanie:
	<form method="post" action="search.php">
	<input type="text" name="SzukanaNazwa"/>
	
	</form>
	
	