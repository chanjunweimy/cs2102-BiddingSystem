<?php


$username=$_POST["username"];
$password=$_POST["password"];

include 'connect.php';
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}


$stid = oci_parse($conn, "SELECT * FROM users where matricNo='$username' and password='$password' ");
oci_execute($stid);

if($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)){
$stid2 = oci_parse($conn, "SELECT admin FROM users where matricNo='$username' and password='$password' ");
oci_execute($stid2);
	$row2 = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS);
	
		
			foreach ($row2 as $item) {
        		if($item=="1"){
				header ( "Location: adminHome.php" );
				setcookie("username", $_POST["username"], time()+3600);
			}else if($item=="0"){
				setcookie("username", $_POST["username"], time()+3600);
				header ( "Location: studentHome.php" );
				
			}
    		}
	
}
else
header ( "Location: index.php" );

?>