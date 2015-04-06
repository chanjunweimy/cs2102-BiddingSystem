<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

  <h1>Modules Bidding</h1>

<?php
include 'connect.php';

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$session = oci_parse($conn, "SELECT * FROM SessionBit"); 
oci_execute($session);
$row3 =	oci_fetch_array($session, OCI_ASSOC+OCI_RETURN_NULLS);
foreach ($row3 as $item2){
if($item2=="0"){	
header("Location: studentHome.php");
}
}

$matric=$_COOKIE["username"];

$stid = oci_parse($conn, "SELECT points FROM users WHERE matricNo='$matric'");
oci_execute($stid);
if ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
	echo "You have ".$row['POINTS']." points";
}

$stid = oci_parse($conn, "select s.moduleCode, m.moduleName, s.startTime, s.endTime, s.day, s.bidpoints, s.bidTime, 
count(case when s2.bidpoints > 0 and s2.success = 0 then 1 end) as NoBidder, mt.maxvacancy, max(s2.bidpoints) as highestBidPts 
from selected s, selected s2, modules m, modulestime mt
where s.matricNo = '$matric'
and s2.moduleCode = s.moduleCode
and s2.startTime = s.startTime
and s2.endTime = s.endTime
and s2.day = s.day
and s.success = '0'
and s.moduleCode = m.moduleCode
and s.moduleCode = mt.moduleCode
and s.starttime = mt.starttime
and s.endtime = mt.endtime
and s.day = mt.day
group by s.moduleCode, m.moduleName, s.startTime, s.endTime, s.day, s.bidpoints, s.bidTime, mt.maxvacancy
order by s.moduleCode");

oci_execute($stid);

$headers = array('Module Code','Module Name','Start Time','End Time','Day', 'Bid Points', 'Bidders / Vacancy', 'Highest Bid Points', 'Next Winning');
?>
<table border='1'>
	
	<tr>
	<?php foreach ($headers as $header): ?>
                <th><?php echo $header;?></th>
	<?php endforeach; ?>
	</tr>

<?php
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
?>
	<form method="post" action="studentBiddingForm.php">
	<tr>
		<td>
		<?php 
			$item = $row['MODULECODE'];
			echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
			echo '<input type="hidden" name="modulecode" id="modulecode" value="'.$item.'" />';
		?>
		</td>
		<td>
		<?php 
			$item = $row['MODULENAME'];
			echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
		?>
		</td>
		<td>
		<?php 
			$item = $row['STARTTIME'];
			echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
			echo '<input type="hidden" name="starttime" id="starttime" value="'.$item.'" />';
		?>
		</td>
		<td>
		<?php 
			$item = $row['ENDTIME'];
			echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
			echo '<input type="hidden" name="endtime" id="endtime" value="'.$item.'" />';
		?>
		</td>
		<td>
		<?php 
			$item = $row['DAY'];
			echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
			echo '<input type="hidden" name="day" id="day" value="'.$item.'" />';
		?>
		</td>
		<td>
		<input type="text" name="bidpoints" id="bidpoints" value="<?php 
			$item = $row['BIDPOINTS'];
			echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
		?>" />
		</td>
		<td>
		<?php 
			$item = $row['NOBIDDER']."/".$row['MAXVACANCY'];
			echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
		?>
		</td>
		<td>
		<?php 
			$item = $row['HIGHESTBIDPTS'];
			echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
		?>
		</td>
		<td>
		<?php
			if ($row['NOBIDDER'] < $row['MAXVACANCY'])
				echo "1";
			else {
				$stid2 = oci_parse($conn, "select s.bidpoints
										   from selected s
										   where s.modulecode = '$row[MODULECODE]'
										   and s.starttime = '$row[STARTTIME]'
										   and s.endtime = '$row[ENDTIME]'
										   and s.day = '$row[DAY]'
										   and s.success = '0'
										   order by s.bidpoints desc");
				oci_execute($stid2);
				oci_fetch_all ($stid2, $bidPoints , $row['MAXVACANCY']-1, 1); 
				echo $bidPoints["BIDPOINTS"][0] + 1;
			}
		?>
		</td>
		<td>
			<input name="updateBidpoints" type="submit" value="Update" />
		</td?
	</tr>
	</form>
<?php
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
