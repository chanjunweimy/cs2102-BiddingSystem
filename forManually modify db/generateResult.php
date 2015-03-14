<?php
include 'connect.php';

$sql = 
'UPDATE (
	SELECT s1.success as bidSuccess
	FROM selected s1 
	WHERE EXISTS (
		SELECT s2.matricNo 
		FROM selected s2
		ROWNUM <= (
			SELECT mt.maxVacancy
			FROM modulesTime mt
			WHERE mt.moduleCode = s2.moduleCode 
			AND mt.startTime = s2.startTime
			AND mt.endTime = s2.endTime
			AND mt.day = s2.day
		)
		ORDER BY s2.bidpoints DESC, s2.bidTime 
		HAVING s1.matricNo = s2.matricNo
		AND s1.moduleCode = s2.moduleCode 
		AND s1.startTime = s2.startTime
		AND s1.endTime = s2.endTime
		AND s1.day = s2.day
	)
) T
SET T.bidSuccess = 1';

$stid=oci_parse($dbh,$sql);
$r = oci_execute($stid,OCI_DEFAULT);

if (!$r) {
    $e = oci_error($stid);  // For oci_execute errors pass the statement handle
    print htmlentities($e['message']);
    print "\n<pre>\n";
    print htmlentities($e['sqltext']);
    printf("\n%".($e['offset']+1)."s", "^");
    print  "\n</pre>\n";
}

oci_free_statement($stid);

?>