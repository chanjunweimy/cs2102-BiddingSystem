<?php

require_once (thirdpartylib\LightOpenID.php);

use thirdpartylib\LightOpenId;

try {
	$domain = "localhost";
	$openid = new LightOpenID($domain);
	if(!$openid->mode) {
		if (isset($_POST['nusnet_id'])) {
			$openid->identity = "https://openid.nus.edu.sg/".$_POST['nusnet_id'];
		}
		# The following two lines request email, full name, and a nickname
		# from the provider. Remove them if you don't need that data.
		//$openid->required = array('contact/email');
		$openid->optional = array('namePerson', 'namePerson/friendly', 'contact/email');
        header('Location: ' . $openid->authUrl());
    } elseif ($openid->mode == 'cancel') {
    	//echo 'User has canceled authentication!';
		header("Location: index.php");
    } else {
        //echo "<h1>OpenID Login Information</h1>\n";
        //echo "<fieldset>\n";
        //echo "<p>User <b>" . ($openid->validate() ? $openid->identity . "</b> has " : "has not ") . "logged in.<p>\n";
        //foreach ($openid->getAttributes() as $key => $value) {
        //	echo "$key => $value<br>";
        //}
        //echo "</fieldset>\n";
		
		$stid2 = oci_parse($conn, "SELECT admin FROM users where matricNo='$username' and password='$password' ");
		oci_execute($stid2);
		$row2 = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS);
		foreach ($row2 as $item) {
        	if ($item == "1") {
				setcookie("username", $_POST["username"], time()+3600);
				header ( "Location: adminHome.php" );
			} else if ($item == "0"){	
				setcookie("username", $_POST["username"], time()+3600);
				header ( "Location: studentHome.php" );
			}
    	}
    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}

?>
