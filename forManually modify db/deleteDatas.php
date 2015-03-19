<?php
include 'connect.php';

# 7
$sql = 'DELETE FROM selected';
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

# 6
$sql = 'DELETE FROM passed';
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

# 5
$sql = 'DELETE FROM users';
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

# 4
$sql = 'DELETE FROM modulesTime';
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

# 3
$sql = 'DELETE FROM preclusion';
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

# 2
$sql = 'DELETE FROM prerequisite';
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


# 1
$sql = 'DELETE FROM modules';
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

echo 'done deleting!';

?>