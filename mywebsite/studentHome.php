﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Module Bidding</title>
<!-- InstanceEndEditable -->
<link href="portalJ.css" rel="stylesheet" type="text/css" />
<script src="../	Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript" src="chrome.js">
</script>
<!-- html2xhtml.js //-->
	<script language="JavaScript" type="text/javascript" src="../cbrte/html2xhtml.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="../cbrte/richtext_compressed.js"></script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>

<div class="container">

<div class="logo">
<a href="studentHome.php"><img src="images/logo.JPG" alt="Insert Logo Here" name="Insert_logo" width="318" height="160" id="Insert_logo" style="background: #FFF; display:block;" /></a> 
</div>

<div class="navbar">  

<div class="chromestyle" id="chromemenu">
<ul>
<li><a href="studentHome.php">Home</a></li>
<li><a href="studentSelection.php">Modules Selection</a></li>
<li><a href="studentBidding.php">Modules Bidding</a></li>
<li><a href="logout.php">Logout</a></li>

</ul>
</div>
</div>

<!-- InstanceBeginEditable name="content" -->
<div class="content">
<font size="-1">
<?php $matric = $_COOKIE["username"]; ?>

<h1>Welcome <?php echo $matric?> </h1>
<?php
include 'connect.php';

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$stid = oci_parse($conn, "SELECT points FROM users WHERE matricNo='$matric'");
oci_execute($stid);
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
foreach($row as $item){
	echo "You have ".$item." points";
}
}
?>
<h1><br>Time Table</br></h1>
 
<?php

$stid = oci_parse($conn, "SELECT s.modulecode, m.modulename, s.starttime, s.endtime, s.success,
DECODE(LOWER(s.day),'mon',0,'tue',1,'wed',2,'thu',3,'fri',4,9) AS weekday
FROM selected s, modules m 
WHERE s.matricno = '$matric'
AND s.modulecode = m.modulecode
ORDER BY s.starttime, weekday");

oci_execute($stid);

$headers = array('Time','Monday','Tuesday','Wednesday','Thursday', 'Friday');
?>
<table border='1'>
	
	<tr>
	<?php foreach ($headers as $header): ?>
                <th><?php echo $header;?></th>
	<?php endforeach; ?>
	</tr>

<?php
$endtime = array(-1, -1, -1, -1, -1);

$nextrow = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
for ($time = 800; $time < 2200; $time += 100) {
	$nextTime = $time + 100;
	echo "<tr><td>$time - $nextTime</td>";
	for ($day = 0; $day < 5; $day++) {
		if ($endtime[$day] == $time)
			$endtime[$day] = -1;
		if ($endtime[$day] == -1) {
			if (($nextrow != null) && ($nextrow['WEEKDAY'] == $day) && ($nextrow['STARTTIME'] == $time)) {
				$endtime[$day] = $nextrow['ENDTIME'];
				$rowspan = ($nextrow['ENDTIME'] - $nextrow['STARTTIME'])/100;
				echo "<td rowspan='$rowspan'>";
				echo "$nextrow[MODULECODE]<br />$nextrow[MODULENAME]";
				if ($nextrow['SUCCESS'] == 0)
					echo "<br />(Not Allocated Yet)";
				echo "</td>";
				$nextrow = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
			}
			else {
				echo "<td></td>";
			}
		}
	}
	echo "</tr>";
}
?>
</table>
<br>



 
<!-- end .content --></font></div>
<!-- InstanceEndEditable -->
<div class="footer"><center><font size="-2">
    <p>Database ~~ Copyright 2015 ~~ Wallpaper & Logo by Jamal Azizi@ jmalandme.clanteam.com ~~ All Rights Reserved.</p>
</font>
</center>
    <!-- end .footer --></div>
  <!-- end .container --></div>
<!-- InstanceBeginEditable name="flash" --> 
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
<!-- InstanceEndEditable -->
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
<!-- InstanceEnd --></html>
