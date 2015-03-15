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
	$stid = oci_parse($conn,"INSERT INTO selected
	values('$matric', '$pieces[0]', '$pieces[2]', '$pieces[3]', '$pieces[4]','0',CURRENT_TIMESTAMP,'0') ");
	oci_execute($stid);	
	}
}

else if(isset($_POST['deleteModule']))
{
	$matric=$_COOKIE["username"];    
	$checkbox = $_POST['checkbox'];
	foreach($checkbox as $value){
	$pieces = explode(" ", $value);	
	
	$stid = oci_parse($conn,"DELETE FROM selected WHERE matricNo='$matric' and moduleCode='$pieces[0]' and startTime='$pieces[2]'and endTime='$pieces[3]' and day='$pieces[4]' ");
	oci_execute($stid);	
	}

}

header ( "Location: studentSelection.php" );

?>