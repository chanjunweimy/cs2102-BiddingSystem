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
<a href="adminHome.php"><img src="images/logo.JPG" alt="Insert Logo Here" name="Insert_logo" width="318" height="160" id="Insert_logo" style="background: #FFF; display:block;" /></a> 
</div>

<div class="navbar">  

<div class="chromestyle" id="chromemenu">
<ul>
<li><a href="adminHome.php">Home</a></li>
<li><a href="adminModules.php">Modules</a></li>
<li><a href="adminStudents.php">Students</a></li>
<li><a href="logout.php">Logout</a></li>

</ul>
</div>
</div>

<div class="header">
  <!--<h1><font color="#FFFFFF"> header</font></h1>-->  
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="920" height="120" id="FlashID" title="banner">
    <param name="movie" value="images/adminbanner.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="9.0.45.0" />
    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
    <param name="expressinstall" value="../Scripts/expressInstall.swf" />
    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="images/adminbanner.swf" width="920" height="120">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="9.0.45.0" />
      <param name="expressinstall" value="../Scripts/expressInstall.swf" />
      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
      <div>
        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
  <!-- end .header -->
</div>
<!-- InstanceBeginEditable name="content" -->
<div class="content">
<font size="-1">

  <h1>Admin/student details</h1>
<form id="form1" name="form1" method="post" action="test2.php">

<?php
$TSDB="//localhost/XE";
$conn = oci_connect("system", "Kuntong369", $TSDB);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT * FROM staff order by name");
$stid2 = oci_parse($conn, "SELECT name FROM staff order by name");
oci_execute($stid);
oci_execute($stid2);
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS) 
	and $row2=oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS)) {
?>
<table border='1'>
	<tr><td>
	<?php foreach($row2 as $item2)?>
	<input name="checkbox[]" type="checkbox" value="<?php echo "".($item2 !== null ? htmlentities($item2, ENT_QUOTES) : "&nbsp;").""; ?>">
	</td>
	<?php foreach($row as $item){?>
	<?php echo "<td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;")."</td>";
	}?>
	</tr>
</table>
<?php
}
?>
  <input name="deleteDetails" type="submit" value="Delete" />
</form>


<h1>Add admin/student</h1>

<form id="form1" name="form1" method="post" action="test2.php">
Name:<br>
<input type="text" name="name">
<br>
Password:<br>
<input type="text" name="password">
<br>
Re-type password:<br>
<input type="text" name="rePassword">
<br>
Choose admin or student:<br>
<select name="adminStudent">
  <option value="student">student</option>
  <option value="admin">admin</option>
</select><br>
  <input name="addStaff" type="submit" value="Add" />
</form>

<h1>Update points</h1>


<form id="form1" name="form1" method="post" action="test2.php">
Name:<br>
<input type="text" name="name">
<br>
Points:<br>
<input type="text" name="points">
<br>
  <input name="updateStaff" type="submit" value="Update" />
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
