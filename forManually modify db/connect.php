<?php


$dbUser = 'a0112084';
$dbPassword = 'crse1420';
$dbDescription = '(DESCRIPTION=
(ADDRESS_LIST=
(ADDRESS=(PROTOCOL=TCP)(HOST=sid3.comp.nus.edu.sg)(PORT=1521))
)
(CONNECT_DATA=
(SERVICE_NAME=sid3.comp.nus.edu.sg)
)
)';
putenv('ORACLE_HOME=/oraclient');
$dbh=ocilogon($dbUser,$dbPassword,$dbDescription);

error_reporting(E_ALL);


?>