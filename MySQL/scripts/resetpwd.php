<?
echo "Welcome to AppServ MySQL Root Password Reset Program\n\n";

AppServCMD();

function AppServCMD() {
	define('STDIN',fopen("php://stdin","r"));
	echo " Enter New Password : ";
	$input = trim(fgets(STDIN,256));
	$input = ereg_replace('\"', "\\\"", $input);
	$input = ereg_replace('\'', "\'", $input); 
	echo "\n   Please wait ...................................\n\n";
	exec ("net stop mysql");
	exec ('start /b C:\AppServ\MySQL\bin\mysqld-nt.exe --skip-grant-tables --user=root');
	exec ("C:\AppServ\MySQL\bin\mysql -e \"update mysql.user set PASSWORD=PASSWORD('$input') where user = 'root';\"");
	exec ("C:\AppServ\MySQL\bin\mysqladmin -u root shutdown");
	sleep(3);
	exec ("net start mysql");
} // end function

?>