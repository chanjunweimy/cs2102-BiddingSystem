<?php
include 'connect.php';
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

if(isset($_POST['startSession'])) {
	$stid = oci_parse($conn, "UPDATE SessionBit SET SessionB='1'");
	oci_execute($stid);
	header ( "Location: adminHome.php" );	
}
else if(isset($_POST['endSession'])) {    
	$stid = oci_parse($conn, "UPDATE SessionBit SET SessionB='0'");
	oci_execute($stid);
	header ( "Location: showBidHistory.php" );
} else {
	header ( "Location: adminHome.php" );	
}

?>