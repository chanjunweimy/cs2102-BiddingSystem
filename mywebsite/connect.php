<?php
ob_start();

//$TSDB="//localhost/XE";
//$conn = ocilogon("system", "Kuntong369", $TSDB);

$TSDB="//sid3.comp.nus.edu.sg/sid3.comp.nus.edu.sg";//connect to school
$conn = ocilogon("A0112084", "crse1420", $TSDB);
//use above code if you want login to school server


$dbh = $conn;

?>