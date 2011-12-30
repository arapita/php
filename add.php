<?php 
echo '
<form method="post" action="zad.php">

	<p>Tresc zadania: <input type="text" name="tresc"/></p>

	<p>Rozwiazanie zadania: </br><textarea name="rozwiazanie" rows="13" cols="50"></textarea></p>

	<p>Poziom trudnosci: <select name="poziom_trudnosci">

		<option value="1">1</option>

		<option value="2">2</option>

		<option value="3">3</option>
		
		<option value="4">4</option>
		
		<option value="5">5</option>

	</select></p>
	
	<input type="hidden" name="usun" value="0"/>
	
	<input type="radio" name="ukryj" value="0" /> Widoczne
	<input type="radio" name="ukryj" value="1" /> Niewidoczne<br />
	
	Wybierze kategorie:<br />
	<select name="kategoria[]" multiple="multiple">
	<option value="Matematyka">Matematyka</option>
	<option value="Jezyk Polski">Jezyk Polski</option>
	<option value="Historia">Historia</option>
	<option value="Biologia">Biologia</option>
	<option value="Informatyka">Informatyka</option>
	<option value="Geografia">Geografia</option>
	</select>


	<br /><input type="submit" value="Dodaj"/>

</form>'
?>