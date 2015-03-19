<?php
include 'connect.php';


$sql = 	
'SELECT s.moduleCode as MODULE_CODE, s.startTime as START_TIME, s.endTime as END_TIME, s.day as DAY
FROM selected s
GROUP BY s.moduleCode, s.startTime, s.endTime, s.day';

$stid=oci_parse($dbh,$sql);
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);  // For oci_execute errors pass the statement handle
    print htmlentities($e['message']);
    print "\n<pre>\n";
    print htmlentities($e['sqltext']);
    printf("\n%".($e['offset']+1)."s", "^");
    print  "\n</pre>\n";
}

while ($row = oci_fetch_array($stid)) {
	$mc = $row['MODULE_CODE'];
	$st = $row['START_TIME'];
	$et = $row['END_TIME'];
	$d = $row['DAY'];
	
	$sql = 	
	"
	SELECT s2.matricNo as MN2, s2.moduleCode as MC2, s2.startTime as ST2, s2.endTime as ET2, s2.day as D2 
	FROM ( 
		SELECT *
		FROM selected sTemp
		WHERE sTemp.bidpoints > 0 
		AND sTemp.moduleCode = '" . $mc . "'
		AND sTemp.startTime = '" . $st . "'
		AND sTemp.endTime = '" . $et . "'
		AND sTemp.day = '" . $d . "'
		ORDER BY sTemp.bidpoints DESC, sTemp.bidTime) s2
	WHERE ROWNUM <= (
		SELECT mt.maxVacancy
		FROM modulesTime mt
		WHERE mt.moduleCode = s2.moduleCode 
		AND mt.startTime = s2.startTime
		AND mt.endTime = s2.endTime
		AND mt.day = s2.day
	)";

	$stid2=oci_parse($dbh,$sql);
	$r = oci_execute($stid2);
	if (!$r) {
		$e = oci_error($stid2);  // For oci_execute errors pass the statement handle
		print htmlentities($e['message']);
		print "\n<pre>\n";
		print htmlentities($e['sqltext']);
		printf("\n%".($e['offset']+1)."s", "^");
		print  "\n</pre>\n";
	}

	while ($row2 = oci_fetch_array($stid2)) {
		$mn2 = $row2['MN2'];
		$mc2 = $row2['MC2'];
		$st2 = $row2['ST2'];
		$et2 = $row2['ET2'];
		$d2 = $row2['D2'];
		
		$sql2 = 
		"UPDATE selected
		SET success = 1 
		WHERE matricNo = '" . $mn2 . "'
		AND moduleCode = '" . $mc2 . "'
		AND startTime = '" . $st2 . "'
		AND endTime = '" . $et2 . "'
		AND day = '" . $d2 . "'";
		
		$stid3=oci_parse($dbh,$sql2);
		$r2 = oci_execute($stid3);
	}
}

oci_free_statement($stid);

?>

