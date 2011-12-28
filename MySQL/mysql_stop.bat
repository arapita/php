@ECHO OFF

ECHO.
ECHO #######  Stop MySQL Daemon  #######
ECHO.

bin\mysqladmin --no-defaults -u root shutdown

ECHO.
pause