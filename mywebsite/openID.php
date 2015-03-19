<?php

$dir = 'thirdpartylib/LightOpenID.php';

include_once $dir;
include_once 'connect.php';

use thirdpartylib\LightOpenId;


try {
	$domain = "http://cs2102-i.comp.nus.edu.sg/~a0112084/";
	$openid = new LightOpenID($domain);
	if(!$openid->mode) {
		if (isset($_POST['nusnet_id'])) {
			$openid->identity = "https://openid.nus.edu.sg/".$_POST['nusnet_id'];
		} else {
			$openid->identity = "https://openid.nus.edu.sg/";
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
        if (!$openid->validate()){
			header("Location: index.php");
		}
		
        foreach ($openid->getAttributes() as $key => $value) {
			if ($key == 'namePerson/friendly') {
				$matricNo = $value;
			}
        }
						
		$sql = 
		"SELECT u.admin as ADMIN
		 FROM users u
		 WHERE u.matricNo = '" . $matricNo . "'" ;
		$stid = oci_parse($dbh , $sql);
		oci_execute($stid);
		
		while ($row = oci_fetch_array($stid)) {
			if ($row['ADMIN'] == 1) {
				setcookie("matricNo", $matricNo, time()+3600);
				header ( "Location: adminHome.php" );
			} else if ($row['ADMIN'] == 0) {
				setcookie("matricNo", $matricNo, time()+3600);
				header ( "Location: studentHome.php" );
			} else {
			}
			echo $row['ADMIN'];
			echo 'aa';
		}
		echo 'error';

		oci_free_statement($stid);

    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}

?>
