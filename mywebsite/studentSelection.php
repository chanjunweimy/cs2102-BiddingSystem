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

<h1>Modules Selection</h1>
<form id="form1" name="form1" method="post" action="studentSelectionForm.php">
<?php
include 'connect.php';

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$stid = oci_parse($conn, "SELECT * FROM modules inner join modulesTime ON modules.moduleCode=modulesTime.moduleCode order by modulesTime.moduleCode,modulesTime.startTime,modulesTime.endTime,modulesTime.day");
$stid2 = oci_parse($conn, "SELECT * FROM modules inner join modulesTime ON modules.moduleCode=modulesTime.moduleCode order by modulesTime.moduleCode,modulesTime.startTime,modulesTime.endTime,modulesTime.day");
oci_execute($stid);
oci_execute($stid2);
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS) 
	and $row2=oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS)) {
?>
<table border='1'>
	<tr><td>
	<input name="checkbox[]" type="checkbox" value="<?php foreach($row2 as $item2)echo "".($item2 !== null ? htmlentities($item2, ENT_QUOTES) : "&nbsp;")." "; ?>">
	</td>
	<?php foreach($row as $item){?>
	<?php echo "<td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;")."</td>";
	}?>
	</tr>
</table>
<?php
}
?>
<input name="selectModule" type="submit" value="Select" />
</form>

  <h1>Selected Modules</h1>
  <form id="form1" name="form1" method="post" action="studentSelectionForm.php">

<?php
include 'connect.php';

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$matric=$_COOKIE["username"];
$stid = oci_parse($conn, "SELECT selected.moduleCode,modules.moduleName,selected.startTime,selected.endTime,selected.day FROM selected inner join modules on selected.moduleCode=modules.moduleCode
		 where selected.matricNo='$matric' order by selected.matricNo,selected.moduleCode,selected.startTime,selected.endTime,selected.day");
$stid2 = oci_parse($conn, "SELECT selected.moduleCode,modules.moduleName,selected.startTime,selected.endTime,selected.day FROM selected inner join modules on selected.moduleCode=modules.moduleCode
		where selected.matricNo='$matric' order by selected.matricNo,selected.moduleCode,selected.startTime,selected.endTime,selected.day");

oci_execute($stid);
oci_execute($stid2);

while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS) 
and $row2 = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS)) {
?>
<table border='1'>
	<tr><td>
	<input name="checkbox[]" type="checkbox" value="<?php foreach($row2 as $item2)echo "".($item2 !== null ? htmlentities($item2, ENT_QUOTES) : "&nbsp;")." "; ?>">
	</td>
	<?php foreach($row as $item){?>
	<?php echo "<td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;")."</td>";
	}?>
	</tr>
</table>
<?php
}
?>
  <input name="deleteModule" type="submit" value="Delete" />
</form>
	  
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
