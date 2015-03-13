<?php
// Create connection to Oracle

$TSDB="//sid3.comp.nus.edu.sg/sid3.comp.nus.edu.sg";
$conn = oci_connect("A0111770", "crse1420", $TSDB);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT * FROM student");

oci_execute($stid);

//$stid2= oci_parse($conn, "Insert into staff (name,pass) values ('testing2','testing2')");
//oci_execute($stid2);


echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" .($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

?>
