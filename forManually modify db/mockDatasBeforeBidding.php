<?php
include 'connect.php';

#these are the datas that already have before session open

#insert into modules
$sql = "INSERT INTO modules 
(moduleCode, moduleName)
VALUES
('cs1000', 'Introduction to computing')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO modules 
(moduleCode, moduleName)
VALUES
('ma1311', 'Introduction to logic')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO modules 
(moduleCode, moduleName)
VALUES
('cs1001s', 'Introduction to advanced computing')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO modules 
(moduleCode, moduleName)
VALUES
('pc1219', 'Introduction to Newton Laws')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO modules 
(moduleCode, moduleName)
VALUES
('cs2003', 'Introduction to Java')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO modules 
(moduleCode, moduleName)
VALUES
('cs2013', 'Introduction to Cpp')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);




#insert into prerequisite
$sql = "INSERT INTO prerequisite
(andId, module, requiredModule)
VALUES
(0, 'cs2003', 'cs1000')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO prerequisite
(andId, module, requiredModule)
VALUES
(0, 'cs2003', 'ma1311')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO prerequisite
(andId, module, requiredModule)
VALUES
(1, 'cs2003', 'cs1001s')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO prerequisite
(andId, module, requiredModule)
VALUES
(1, 'cs2003', 'ma1311')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);




#insert into preclusion
$sql = "INSERT INTO preclusion
(module, excludedModule)
VALUES
('cs1000', 'cs1001s')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO preclusion
(module, excludedModule)
VALUES
('cs1001s', 'cs1000')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO preclusion
(module, excludedModule)
VALUES
('cs2003', 'cs2013')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO preclusion
(module, excludedModule)
VALUES
('cs2013', 'cs2003')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);





#insert into modulesTime
$sql = "INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('cs1000', '12:00', '14:00', 'tue', 1)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('cs1000', '10:00', '12:00', 'tue', 2)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('ma1311', '09:00', '11:00', 'mon', 3)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('cs1001s', '10:00', '12:00', 'mon', 1)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('cs1001s', '10:00', '12:00', 'wed', 1)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('pc1219', '13:00', '15:00', 'tue', 3)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('pc1219', '13:00', '15:00', 'thu', 3)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('cs2003', '13:00', '15:00', 'fri', 2)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('cs2013', '13:00', '15:00', 'fri', 1)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);






#insert into users
$sql = "INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0112084', 1, 'chan jun wei', 1000, 1, 'a0112084u')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000001a', 0, 'tang xiao ping', 50, 0, 'a0000001a')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000002a', 0, 'kan kan ni', 50, 0, 'a0000002a')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000003a', 0, 'leow ah beng', 50, 0, 'a0000003a')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000004a', 0, 'ng mei mei', 50, 0, 'a0000004a')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000005a', 0, 'eng ah yan', 50, 0, 'a0000005a')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000006a', 0, 'wong big fong', 50, 0, 'a0000006a')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000007a', 0, 'chen the boss', 50, 0, 'a0000007a')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000008a', 0, 'funny yew', 50, 0, 'a0000008a')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000009a', 0, 'stary liu', 50, 0, 'a0000009a')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000001b', 0, 'johny dept', 50, 0, 'a0000001b')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);






#insert into passed
$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000001a', 'cs1000')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000002a', 'ma1311')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000003a', 'cs1001s')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000003a', 'ma1311')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000004a', 'pc1219')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000005a', 'cs1001s')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000005a', 'ma1311')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000005a', 'cs2013')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000006a', 'cs1000')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000006a', 'ma1311')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000007a', 'cs1000')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000007a', 'ma1311')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000008a', 'cs1001s')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

$sql = "INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000008a', 'pc1219')";
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);


echo 'done mock data before bidding!! ';

?>