<?php

$TSDB="//localhost/XE";
$conn = oci_connect("system", "Kuntong369", $TSDB);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

header ( "Location: studentBidding.php" );

?>