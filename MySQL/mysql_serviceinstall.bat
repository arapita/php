@ECHO OFF 

if "%OS%" == "Windows_NT" goto WinNT 

:Win9X 
ECHO.
ECHO Sorry! MySQL can not run as Services under Win9x 
ECHO Please use mysql_start.bat instead 
ECHO.
goto exit 

:WinNT 
ECHO.
ECHO Installing MySQL as an Service 
ECHO.
bin\mysqld-nt --install mysql --defaults-file=C:\AppServ\MySQL\my.ini

ECHO.
ECHO Try to start the MySQL deamon as service ... 
ECHO.
net start MySQL 

:exit 
pause