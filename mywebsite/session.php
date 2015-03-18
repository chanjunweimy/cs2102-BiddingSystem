<?php
if(isset($_POST['startSession'])) {
	header ( "Location: adminHome.php" );	

}
else if(isset($_POST['endSession'])) {    
	header ( "Location: showBidHistory.php" );
} else {
	header ( "Location: adminHome.php" );	
}

?>