<?php
if(isset($_POST['startSession'])) {
	header ( "Location: showBidHistory.php" );
}
else if(isset($_POST['endSession'])) {    
;
}
header ( "Location: adminHome.php" );	

?>