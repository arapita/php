@ECHO OFF

ECHO.
ECHO #######  Starting MySQL Service Fixed  #######
ECHO.

if "%OS%" == "Windows_NT" goto WinNT

:Win9X
ECHO.
ECHO Sorry! MySQL can not run as Services under Win9x
ECHO Please use mysql_stop.bat instead
ECHO.
goto exit

:WinNT
ECHO.
ECHO Stopping MySQL when it runs...
ECHO.
net stop mysql

ECHO.
ECHO Uninstalling MySQL Service
ECHO.
bin\mysqld-nt --remove mysql
if not exist %windir%\my.ini GOTO exit
ECHO.
ECHO.
ECHO.

if "%OS%" == "Windows_NT" goto WinNTX

:Win9X 
ECHO.
ECHO Sorry! MySQL can not run as Services under Win9x 
ECHO Please use mysql_start.bat instead 
ECHO.
goto exit 

:WinNTX
ECHO.
ECHO Installing MySQL as an Service 
ECHO.
bin\mysqld-nt --install mysql --defaults-file=%WinDir%\my.ini

ECHO.
ECHO Try to start the MySQL deamon as service ... 
ECHO.
net start MySQL 

:exit 