<?php

include 'connect.php';

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

if(isset($_POST['selectModule']))
{	
	$matric=$_COOKIE["username"];    
	$checkbox = $_POST['checkbox'];
	foreach($checkbox as $value){
		$pieces = explode(" ", $value);

		$arraySize = count($pieces);

		$moduleCode = $pieces[0];
		$startTime = $pieces[$arraySize - 5];
		$endTime = $pieces[$arraySize - 4];
		$day = $pieces[$arraySize - 3];
		$bidpoints = 0;

		$stid = oci_parse($conn, "SELECT 'True' 
								  FROM selected s1
								  WHERE EXISTS (
								  	SELECT s2.moduleCode
								  	FROM selected s2
								  	WHERE s2.moduleCode = '$moduleCode'
								  	AND s2.matricNo = '$matric'
								  	) ");

		oci_execute($stid);
		$isModuleSelected = oci_fetch_array($stid, OCI_RETURN_NULLS)[0];

		$stid = oci_parse($conn, "SELECT 'True'
								  FROM selected s1
								  WHERE EXISTS (
								  	SELECT s2.moduleCode
								  	FROM selected s2
								  	WHERE s2.matricNo = '$matric'
								  	AND s2.day = '$day'
								  	AND ((s2.startTime >= '$startTime' AND s2.startTime < '$endTime')
								  	OR (s2.endTime > '$startTime' AND s2.endTime <= '$endTime'))
								  	) ");

		oci_execute($stid);	
		$isTimeClashed = oci_fetch_array($stid, OCI_RETURN_NULLS)[0];

		$stid = oci_parse($conn, "SELECT 'True'
								  FROM preclusion p, passed ps
								  WHERE p.excludedmodule = ps.moduleCode
								  AND ps.matricNo = '$matric'
								  AND p.module = '$moduleCode'");

		oci_execute($stid);	
		$isPrecluded = oci_fetch_array($stid, OCI_RETURN_NULLS)[0];
		
		$stid = oci_parse($conn, "SELECT 'True'
								  FROM prerequisite p
								  WHERE p.module = '$moduleCode'");

		oci_execute($stid);	
		$isModulesRequired = oci_fetch_array($stid, OCI_RETURN_NULLS)[0];
		
		$stid = oci_parse($conn, "SELECT 'True'
								  FROM prerequisite p
								  WHERE EXISTS(
									SELECT p2.andId
									FROM prerequisite p2
									WHERE p2.module = p.module
									AND p2.andId = p.andId
									AND p2.requiredModule IN (
										SELECT ps.moduleCode
										FROM passed ps
										WHERE ps.matricNo = '$matric'
									)
									GROUP BY p2.andId
									HAVING COUNT(p2.requiredModule) = (
										SELECT COUNT(p3.requiredModule)
										FROM prerequisite p3
										WHERE p3.module = p.module
										AND p3.andId = p.andId
									)
								  )
								  AND p.module = '$moduleCode'");

		oci_execute($stid);	
		$isRequirementMet = oci_fetch_array($stid, OCI_RETURN_NULLS)[0];

		if (!$isModuleSelected && !$isTimeClashed && !$isPrecluded && (!$isModulesRequired || $isRequirementMet)) {
			$stid = oci_parse($conn,"INSERT INTO selected (matricNo, moduleCode, startTime, endTime, day, bidpoints, bidTime)
								     values('$matric', '$moduleCode', '$startTime', '$endTime', '$day', '$bidpoints', CURRENT_TIMESTAMP) ");
			oci_execute($stid);	
		}

	}
}

else if(isset($_POST['deleteModule']))
{
	$matric=$_COOKIE["username"];    
	$checkbox = $_POST['checkbox'];
	foreach($checkbox as $value){
		$pieces = explode(" ", $value);	
	
		$arraySize = count($pieces);

		$moduleCode = $pieces[0];
		$startTime = $pieces[$arraySize - 4];
		$endTime = $pieces[$arraySize - 3];
		$day = $pieces[$arraySize - 2];

		$stid = oci_parse($conn,"DELETE FROM selected 
								WHERE matricNo ='$matric' 
								AND moduleCode ='$moduleCode' 
								AND startTime ='$startTime'
								AND endTime ='$endTime' 
								AND day ='$day' ");
		oci_execute($stid);	
	}


}

header ( "Location: studentSelection.php" );

?>