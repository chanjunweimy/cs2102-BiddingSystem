<?php
include 'connect.php';

# 7
$sql = 'DROP TABLE selected';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

# 6
$sql = 'DROP TABLE passed';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

# 5
$sql = 'DROP TABLE users';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

# 4
$sql = 'DROP TABLE modulesTime';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

# 3
$sql = 'DROP TABLE preclusion';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

# 2
$sql = 'DROP TABLE prerequisite';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);


# 1
$sql = 'DROP TABLE modules';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);


?>