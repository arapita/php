@ECHO OFF

ECHO #######  MySQL Server for AppServ  #######
ECHO ##  Please don't close Window while MySQL is running
ECHO ##  MySQL is Starting...
ECHO ###################################
ECHO. 
ECHO. 
ECHO ###################################
ECHO #######  ***** Stop MySQL Daemon please goto  #######
ECHO #######  Manual Control Server & MySQL Stop ***** #######
ECHO ###################################
ECHO. 
ECHO. 
ECHO. 
bin\mysqld --defaults-file=%WinDir%\my.ini --standalone