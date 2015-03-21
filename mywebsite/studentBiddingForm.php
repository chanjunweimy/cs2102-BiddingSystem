<?php

include 'connect.php';

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$matric=$_COOKIE["username"];    
$bidpoints = $_POST['bidpoints'];
$modulecode = $_POST['modulecode'];
$starttime = $_POST['starttime'];
$endtime = $_POST['endtime'];
$day = $_POST['day'];

if ($bidpoints != null && $bidpoints >= 0) {
	$stid = oci_parse($conn,"SELECT u.points, s.bidpoints
	FROM users u, selected s
	WHERE u.matricno = '$matric'
	AND s.matricno = u.matricno
	AND s.modulecode = '$modulecode'
	AND s.starttime = '$starttime'
	AND s.endtime = '$endtime'
	AND s.day = '$day'");
	oci_execute($stid);
	if ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
		$oldPts = $row['POINTS'];
		$oldBPts = $row['BIDPOINTS'];
		$newPts = $oldPts + $oldBPts - $bidpoints;
		if ($newPts >= 0) {
			$stid = oci_parse($conn,"UPDATE selected
			SET bidpoints = '$bidpoints', bidtime = CURRENT_TIMESTAMP
			WHERE matricno = '$matric'
			AND modulecode = '$modulecode'
			AND starttime = '$starttime'
			AND endtime = '$endtime'
			AND day = '$day'");
			oci_execute($stid);	
			$stid = oci_parse($conn, "UPDATE users
			SET points = '$newPts'
			WHERE matricno = '$matric'");
			oci_execute($stid);	
		}
		
	}
}
header ( "Location: studentBidding.php" );

?>