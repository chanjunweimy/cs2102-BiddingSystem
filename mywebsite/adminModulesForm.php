<?php
include 'connect.php';

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

if(isset($_POST['deleteModule']))
{    
	$checkbox = $_POST['checkbox'];
	foreach($checkbox as $value)
	{
		$stid = oci_parse($conn,"DELETE FROM modules WHERE moduleCode='$value'");
		oci_execute($stid);	
	}

}


else if(isset($_POST['addModule']))
{    	
	
	$varmoduleCode = $_POST['moduleCode'];
	$varmoduleName = $_POST['moduleName'];	
	$stid = oci_parse($conn,"INSERT INTO modules values('$varmoduleCode','$varmoduleName')");
	oci_execute($stid);

}

else if(isset($_POST['deleteModuleTimeSlot']))
{    	
	$checkbox = $_POST['checkbox'];
	
	foreach($checkbox as $value){
	
	$pieces = explode(" ", $value);
		
	$stid = oci_parse($conn,"DELETE FROM modulesTime 
				where moduleCode='$pieces[0]'and startTime='$pieces[1]'
					and endTime='$pieces[2]' and day='$pieces[3]'");
	oci_execute($stid);
	}
}

else if(isset($_POST['addModuleTimeSlot']))
{    	
	$varModuleCode = $_POST['moduleCode'];
	$varStartTime = $_POST['startTime'];
	$varEndTime = $_POST['endTime'];
	$varDay = $_POST['day'];
	$varMaxVac = $_POST['maxVac'];
	
	$stid = oci_parse($conn,"INSERT INTO modulesTime values('$varModuleCode','$varStartTime','$varEndTime','$varDay','$varMaxVac')");
	oci_execute($stid);

}

else if(isset($_POST['deleteSelectedModule']))
{    	
	
	$checkbox = $_POST['checkbox'];
	
	foreach($checkbox as $value){
	
	$pieces = explode(" ", $value);
	
	$stid = oci_parse($conn,"DELETE FROM selected 
				where matricNo='$pieces[0]'and moduleCode='$pieces[1]'
					and startTime='$pieces[2]' and endTime='$pieces[3]' and day='$pieces[4]'");
	oci_execute($stid);
	}
}

else if(isset($_POST['deletePreclusionModule']))
{    	
	
	$checkbox = $_POST['checkbox'];
	
	foreach($checkbox as $value){
	
	$pieces = explode(" ", $value);
	
	$stid = oci_parse($conn,"DELETE FROM Preclusion 
				where module='$pieces[0]'and excludedModule='$pieces[1]'");
	oci_execute($stid);
	}
}

else if(isset($_POST['addPreclusionModule']))
{    	
	$varModuleCode = $_POST['moduleCode'];
	$varmoduleExcluded = $_POST['moduleExcluded'];
	
	$stid = oci_parse($conn,"INSERT INTO Preclusion values('$varModuleCode','$varmoduleExcluded')");
	oci_execute($stid);
}

else if(isset($_POST['deletePrerequisiteModule']))
{    	
	
	$checkbox = $_POST['checkbox'];
	
	foreach($checkbox as $value){
	
	$pieces = explode(" ", $value);
	
	$stid = oci_parse($conn,"DELETE FROM Prerequisite 
				where ANDID='$pieces[0]'and module='$pieces[1]'and requiredModule='$pieces[2]'");
	oci_execute($stid);
	}
}

else if(isset($_POST['addPrerequisite']))
{    	
	$varModuleCode = $_POST['moduleCode'];
	$varRequiredModule = $_POST['requiredModule'];
	$varANDID = $_POST['ANDID'];
	
	$stid = oci_parse($conn,"INSERT INTO Prerequisite values('$varANDID','$varModuleCode','$varRequiredModule')");
	oci_execute($stid);
}

header ( "Location: adminModules.php" );

?>