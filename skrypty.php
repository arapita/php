<?php





function index() {




	
	
if(!isset($_SESSION['login']) )
        {
                
            
				
					echo "Użytkownik niezalogowany Zaloguj sie<br /><a href='login_form.html'> Zaloguj</a>";
        }


	
	
 	else
	{
		echo "Zalogowany jako ".$_SESSION['login']."";
		echo " &nbsp&nbsp&nbsp&nbsp <a href='wyloguj.php'>Wyloguj </a>";
		
	}

}


function login(){

require("db.php");
		
			try {
      $pdo = new PDO('mysql:host='.$host.';dbname='.$database.
	  	  ';port='.$port, $username, $password);
			} catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
			}
			
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		

		
		if (!empty($_POST['login']) && !empty($_POST['haslo'])) 
		
		
		{
		
			$stmt = $pdo -> query('SELECT * FROM uzytkownik ');
		
 

$pyt=0;


			foreach($stmt as $row)
			 {
				
	
	
				if ($row['mail']==$_POST['login'])  
					{
						 $pyt=1;
						 if($row['haslo']==md5($_POST['haslo']))
						 {
						  $pyt=2;
						 $user = array('login'=>$row['mail'],'kategoria'=>$row['id_grupa']);
					
						 }
				
					}
				
			
				 

				}
		
			 
			 
			 if ($pyt==0)
			 {
				return 0;
			 }
			 
			 if ($pyt==1) 
			 {
				 return 1;
			 }
			 
			 if ($pyt==2) 
			 {
				 
			 	return 2;
			 }
			 
		 
}
	else
	{
		
		 return 3;
	}
	
	
function check_login($pyt){
	
		if ($pyt==0)
			 {
				  echo "Nie ma takiego konta";
				  echo "  <br /><a href='login_form.html'> Powrót</a>";
			 }
			 
			 if ($pyt==1) 
			 {
				 echo "Błędne hasło";
				 echo "  <br /><a href='login_form.html'> Powrót</a>";
			 }
			 
			 if ($pyt==2) 
			 {
				 echo "Zalogowano  ";
				
				 $_SESSION['login']=$user['login'];
				 $_SESSION['kategoria']=$user['kategoria'];
			 	//echo $_SESSION['login'];
				//echo "&nbsp&nbsp&nbsp <a href='index.php'>Strona Główna </a>";
			 	return true;
			 }
			 if ($pyt==3)
			 {
	 			echo "Brak danych";
		 		echo "  <br /><a href='login_form.html'> Powrót</a>";
			 }
}
	
	
	//echo "<br> ".date('Y-n-d'); 











}

	function wyloguj()
	{
		session_destroy();	
	}


?>









