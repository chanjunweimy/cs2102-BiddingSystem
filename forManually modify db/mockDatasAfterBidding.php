<?php
include_once 'mockDatasBeforeBidding.php';

#these are the datas that already have before session open

# set timestamp format
$sql = "alter SESSION set NLS_TIMESTAMP_FORMAT = 'YYYY-MM-DD HH24:MI:SS.FF'";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


#insert into selected
$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('cs1000', 1200, 1400, 'tue', 
'a0000004a', 1, '2015-03-15 12:00:10.0000', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', 1300, 1500, 'tue', 
'a0000001a', 10, '2015-03-15 13:00:10.0000', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', 1300, 1500, 'tue', 
'a0000002a', 30, '2015-03-15 13:01:10.0000', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', 1300, 1500, 'tue', 
'a0000003a', 40, '2015-03-15 13:10:10.0000', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', 1300, 1500, 'tue', 
'a0000005a', 50, '2015-03-15 15:00:10.0000', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', 1300, 1500, 'tue', 
'a0000006a', 35, '2015-03-15 13:02:10.0000', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', 1300, 1500, 'tue', 
'a0000007a', 37, '2015-03-15 13:03:15.0000', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', 1300, 1500, 'tue', 
'a0000009a', 40, '2015-03-15 13:04:11.0001', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', 1300, 1500, 'tue', 
'a0000001b', 35, '2015-03-15 13:04:11.0100', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('ma1311', 0900, 1100, 'mon', 
'a0000001a', 40, '2015-03-15 14:04:11.0100', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('ma1311', 0900, 1100, 'mon', 
'a0000004a', 49, '2015-03-15 14:05:11.0100', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('ma1311', 0900, 1100, 'mon', 
'a0000008a', 50, '2015-03-15 14:04:12.0100', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('ma1311', 0900, 1100, 'mon', 
'a0000009a', 10, '2015-03-15 11:04:12.0100', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('cs1001s', 1000, 1200, 'wed', 
'a0000002a', 10, '2015-03-15 15:04:12.0100', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('cs1001s', 1000, 1200, 'wed', 
'a0000001b', 10, '2015-03-15 15:04:11.0100', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('cs2003', 1300, 1500, 'fri', 
'a0000003a', 10, '2015-03-15 16:04:11.0100', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);


$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('cs2003', 1300, 1500, 'fri', 
'a0000006a', 15, '2015-03-15 16:03:11.0100', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

$sql = "INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('cs2013', 1300, 1500, 'fri', 
'a0000007a', 1, '2015-03-15 17:03:11.0100', 0)";
$stid=oci_parse($dbh,$sql);
oci_execute($stid);
oci_free_statement($stid);

echo 'done inserting mock datas after bidding';

?>