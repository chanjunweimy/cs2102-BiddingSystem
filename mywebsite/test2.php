<?php

$TSDB="//localhost/XE";
$conn = oci_connect("system", "Kuntong369", $TSDB);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

if(isset($_POST['deleteDetails']))
{ 	
	$checkbox = $_POST['checkbox'];   
	foreach($checkbox as $value)
	{
		$stid = oci_parse($conn,"DELETE FROM staff WHERE name='$value'");
		oci_execute($stid);	
	}

header ( "Location: adminStudents.php" );
}
else if(isset($_POST['addStaff']))
{    	
	$varAdminStudent = $_POST['adminStudent'];
	$varName = $_POST['name'];
	$varPass = $_POST['password'];
	$varRePass = $_POST['rePassword'];
	if($varPass==$varRePass){
		if($varAdminStudent=="student")
			$stid = oci_parse($conn,"INSERT INTO staff values('$varName','$varPass','$varAdminStudent','1000')");
		else if($varAdminStudent=="admin")
			$stid = oci_parse($conn,"INSERT INTO staff values('$varName','$varPass','$varAdminStudent','0')");
		oci_execute($stid);
	}
header ( "Location: adminStudents.php" );
}
else if(isset($_POST['updateStaff']))
{    	
	$varName = $_POST['name'];
	$varPoints = $_POST['points'];

	$stid = oci_parse($conn,"UPDATE staff SET POINTS='$varPoints' where name='$varName'");
	oci_execute($stid);	
header ( "Location: adminStudents.php" );
}
else if(isset($_POST['addModule']))
{    	
	$varmoduleName = $_POST['moduleName'];
	$varmoduleCode = $_POST['moduleCode'];
	$varmoduleTimeSlot = $_POST['moduleTimeSlot'];	
	$stid = oci_parse($conn,"INSERT INTO availableModules values('$varmoduleName','$varmoduleCode','$varmoduleTimeSlot')");
	oci_execute($stid);

header ( "Location: adminModules.php" );
}
else if(isset($_POST['deleteModuleAdmin']))
{    
	$checkbox = $_POST['checkbox'];
	foreach($checkbox as $value)
	{
		$stid = oci_parse($conn,"DELETE FROM availableModules WHERE moduleName='$value'");
		oci_execute($stid);	
	}

header ( "Location: adminModules.php" );
}
else if(isset($_POST['deleteModule']))
{
	$name=$_COOKIE["username"];    
	$checkbox = $_POST['checkbox'];
	foreach($checkbox as $value)
	{
		$stid = oci_parse($conn,"DELETE FROM selected_Modules WHERE selectedModule='$value' and name='$name'");
		oci_execute($stid);	
	}

header ( "Location: studentSelection.php" );
}
else if(isset($_POST['selectModule']))
{
	$name=$_COOKIE["username"];    
	$checkbox = $_POST['checkbox'];
	foreach($checkbox as $value)
	{
		$stid = oci_parse($conn,"INSERT INTO selected_Modules values('$name', '$value') ");
		oci_execute($stid);	
	}

header ( "Location: studentSelection.php" );
}

?>