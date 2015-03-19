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

		echo "module code: ".$moduleCode."<br>";
		echo "start time: ".$startTime."<br>";
		echo "end time: ".$endTime."<br>";
		echo "day: ".$day."<br>";

		$stid = oci_parse($conn,"INSERT INTO selected (matricNo, moduleCode, startTime, endTime, day, bidpoints, bidTime)
								values('$matric', '$moduleCode', '$startTime', '$endTime', '$day', '$bidpoints', CURRENT_TIMESTAMP) ");
		oci_execute($stid);	
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