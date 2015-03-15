<?php

include 'connect.php';

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

if(isset($_POST['deleteDetails']))
{ 	
	$checkbox = $_POST['checkbox'];   
	foreach($checkbox as $value)
	{
		$stid = oci_parse($conn,"DELETE FROM users WHERE matricNo='$value'");
		oci_execute($stid);	
	}

}
else if(isset($_POST['addUsers']))
{    	
	$varMatric= $_POST['matric'];
	$varAdmin = $_POST['adminStudent'];
	$varName = $_POST['name'];
	$varPass = $_POST['password'];
	$varRePass = $_POST['rePassword'];
	if($varPass==$varRePass){
		if($varAdmin=="0")
			$stid = oci_parse($conn,"INSERT INTO users values('$varMatric','0','$varName','1000','0','$varPass')");
		else if($varAdmin=="1")
			$stid = oci_parse($conn,"INSERT INTO users values('$varMatric','1','$varName','0','0','$varPass')");
		oci_execute($stid);
	}
}
else if(isset($_POST['updateUserPoints']))
{    	
	$varMatric = $_POST['matric'];
	$varPoints = $_POST['points'];

	$stid = oci_parse($conn,"UPDATE users SET POINTS='$varPoints' where matricNo='$varMatric'");
	oci_execute($stid);	
}

else if(isset($_POST['updateAllUserPoints']))
{    	
	$varPoints = $_POST['points'];

	$stid = oci_parse($conn,"UPDATE users SET POINTS='$varPoints'");
	oci_execute($stid);	
}

header ( "Location: adminStudents.php" );


?>