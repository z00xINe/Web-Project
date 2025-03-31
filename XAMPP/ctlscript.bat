@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist C:\Materials\Web_Project\XAMPP\hypersonic\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\server\hsql-sample-database\scripts\ctl.bat START)
if exist C:\Materials\Web_Project\XAMPP\ingres\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\ingres\scripts\ctl.bat START)
if exist C:\Materials\Web_Project\XAMPP\mysql\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\mysql\scripts\ctl.bat START)
if exist C:\Materials\Web_Project\XAMPP\postgresql\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\postgresql\scripts\ctl.bat START)
if exist C:\Materials\Web_Project\XAMPP\apache\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\apache\scripts\ctl.bat START)
if exist C:\Materials\Web_Project\XAMPP\openoffice\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\openoffice\scripts\ctl.bat START)
if exist C:\Materials\Web_Project\XAMPP\apache-tomcat\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\apache-tomcat\scripts\ctl.bat START)
if exist C:\Materials\Web_Project\XAMPP\resin\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\resin\scripts\ctl.bat START)
if exist C:\Materials\Web_Project\XAMPP\jetty\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\jetty\scripts\ctl.bat START)
if exist C:\Materials\Web_Project\XAMPP\subversion\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist C:\Materials\Web_Project\XAMPP\lucene\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\lucene\scripts\ctl.bat START)
if exist C:\Materials\Web_Project\XAMPP\third_application\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist C:\Materials\Web_Project\XAMPP\third_application\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\third_application\scripts\ctl.bat STOP)
if exist C:\Materials\Web_Project\XAMPP\lucene\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist C:\Materials\Web_Project\XAMPP\subversion\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\subversion\scripts\ctl.bat STOP)
if exist C:\Materials\Web_Project\XAMPP\jetty\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\jetty\scripts\ctl.bat STOP)
if exist C:\Materials\Web_Project\XAMPP\hypersonic\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist C:\Materials\Web_Project\XAMPP\resin\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\resin\scripts\ctl.bat STOP)
if exist C:\Materials\Web_Project\XAMPP\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT C:\Materials\Web_Project\XAMPP\apache-tomcat\scripts\ctl.bat STOP)
if exist C:\Materials\Web_Project\XAMPP\openoffice\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\openoffice\scripts\ctl.bat STOP)
if exist C:\Materials\Web_Project\XAMPP\apache\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\apache\scripts\ctl.bat STOP)
if exist C:\Materials\Web_Project\XAMPP\ingres\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\ingres\scripts\ctl.bat STOP)
if exist C:\Materials\Web_Project\XAMPP\mysql\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\mysql\scripts\ctl.bat STOP)
if exist C:\Materials\Web_Project\XAMPP\postgresql\scripts\ctl.bat (start /MIN /B C:\Materials\Web_Project\XAMPP\postgresql\scripts\ctl.bat STOP)

:end

