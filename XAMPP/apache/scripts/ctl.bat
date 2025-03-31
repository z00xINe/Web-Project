@echo off

if not ""%1"" == ""START"" goto stop

cmd.exe /C start /B /MIN "" "C:\Materials\Web_Project\XAMPP\apache\bin\httpd.exe"

if errorlevel 255 goto finish
if errorlevel 1 goto error
goto finish

:stop
cmd.exe /C start "" /MIN call "C:\Materials\Web_Project\XAMPP\killprocess.bat" "httpd.exe"

if not exist "C:\Materials\Web_Project\XAMPP\apache\logs\httpd.pid" GOTO finish
del "C:\Materials\Web_Project\XAMPP\apache\logs\httpd.pid"
goto finish

:error
echo Error starting Apache

:finish
exit
