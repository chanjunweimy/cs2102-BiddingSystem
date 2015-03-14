<?php
include 'connect.php';

# 1
$sql = 'CREATE TABLE modules ( 
moduleCode VARCHAR (16),
moduleName VARCHAR (128),
PRIMARY KEY (moduleCode)
) ';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

# 2
$sql = 'CREATE TABLE prerequisite (
andId INT CHECK (andId = 0 OR andId = 1),
module VARCHAR (16),
requiredModule VARCHAR (16),
FOREIGN KEY (module) REFERENCES modules(moduleCode),
FOREIGN KEY (requiredModule) REFERENCES modules(moduleCode),
PRIMARY KEY (andId, module, requiredModule)
) ';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);


# 3
$sql = 'CREATE TABLE preclusion(
module VARCHAR (16),
excludedModule VARCHAR (16),
FOREIGN KEY (module) REFERENCES modules(moduleCode),
FOREIGN KEY (excludedModule) REFERENCES modules(moduleCode),
PRIMARY KEY (module, excludedModule)
) ';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);


# 4
$sql = 'CREATE TABLE modulesTime (
moduleCode VARCHAR (16),
startTime VARCHAR(10),
endTime VARCHAR(10),
day CHAR (3) 
CHECK (
lower(day) LIKE (\'mon\') OR
lower(day) LIKE (\'tue\') OR
lower(day) LIKE (\'wed\') OR
lower(day) LIKE (\'thu\') OR
lower(day) LIKE (\'fri\') OR
lower(day) LIKE (\'sat\') OR
lower(day) LIKE (\'sun\') ),
maxVacancy INT NOT NULL,
FOREIGN KEY (moduleCode) REFERENCES modules (moduleCode) ON DELETE CASCADE,
PRIMARY KEY (moduleCode, startTime, endTime, day)
)
 ';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);


# 5
$sql = ' CREATE TABLE users (
matricNo VARCHAR(10),
admin INT DEFAULT \'0\' CHECK (admin = 0 OR admin = 1),
name varchar(64) NOT NULL,
points INT NOT NULL,
openId INT DEFAULT \'1\' CHECK (openId = 0 OR openId = 1),
password CHAR (64),
PRIMARY KEY (matricNo)
)';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);

# 6
$sql = 'CREATE TABLE passed (
matricNo VARCHAR(10),
moduleCode VARCHAR(16),
FOREIGN KEY (matricNo) REFERENCES users(matricNo),
FOREIGN KEY (moduleCode) REFERENCES modules(moduleCode),
PRIMARY KEY (matricNo, moduleCode)
) ';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);


# 7
$sql = 'CREATE TABLE selected(
matricNo VARCHAR(10),
moduleCode VARCHAR(16),
startTime VARCHAR(10),
endTime VARCHAR(10),
day CHAR(3),
bidpoints INT NOT NULL,
bidTime TIMESTAMP NOT NULL,
success INT DEFAULT \'0\' NOT NULL CHECK (success = 0 OR success = 1),
FOREIGN KEY (matricNo) REFERENCES users(matricNo),
FOREIGN KEY (moduleCode, startTime, endTime, day) REFERENCES modulesTime(moduleCode, startTime, endTime, day),
PRIMARY KEY (matricNo, moduleCode, startTime, endTime, day)
)';
$stid=oci_parse($dbh,$sql);
oci_execute($stid,OCI_DEFAULT);
oci_free_statement($stid);
?>
