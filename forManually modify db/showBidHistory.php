<?php
include 'connect.php';

$sql = 
'(SELECT m.moduleName, mt.moduleCode, mt.startTime, mt.endTime, 
mt.day, mt.maxVacancy, COUNT (s.matricNo), MAX(s.bidpoints), MIN(s.bidpoints)
FROM modules m, modulesTime mt, selected s
WHERE m.moduleCode = mt.moduleCode
AND mt.moduleCode = s.moduleCode
AND mt.startTime = s.startTime
AND mt.endTime = s.endTime
AND mt.day = s.day
GROUP BY m.moduleName, mt.moduleCode, mt.startTime, mt.endTime, mt.day, mt.maxVacancy)
UNION
(SELECT m2.moduleName, mt2.moduleCode, mt2.startTime, 
mt2.endTime, mt2.day, mt2.maxVacancy, 0, 0, 0
FROM modules m2, modulesTime mt2
WHERE m2.moduleCode = mt2.moduleCode
AND NOT EXISTS (
SELECT *
FROM selected s2
WHERE s2.moduleCode = mt2.moduleCode
AND s2.startTime = mt2.startTime
AND s2.endTime = mt2.endTime
AND s2.day = mt2.day
))';

$stid=oci_parse($dbh,$sql);
$r = oci_execute($stid,OCI_DEFAULT);

if (!$r) {
    $e = oci_error($stid);  // For oci_execute errors pass the statement handle
    print htmlentities($e['message']);
    print "\n<pre>\n";
    print htmlentities($e['sqltext']);
    printf("\n%".($e['offset']+1)."s", "^");
    print  "\n</pre>\n";
}

$headers = array('Module Name',
				 'Module Code',
				 'Start Time',
				 'End Time',
				 'Day',
				 'Max Vacancy',
				 'Number Of Bidders',
				 'Max Bid Points',
				 'Min Bid Points');
$datas = array();
$index = 0;
while ($row = oci_fetch_array($stid)) {
	$datas[index] = $row;
	$index++;
}


oci_free_statement($stid);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>HTML Table With PHP</title>
    </head>
    <body>
        <table border="1">
            <tr>
            <?php foreach ($headers as $header): ?>
                <th><?php echo $header; ?></th>
            <?php endforeach; ?>
            </tr>
        <?php foreach ($datas as $data): ?>
            <tr>
            <?php for ($k = 0; $k < count($headers); $k++): ?>
                <td><?php echo $data[$k]; ?></td>
            <?php endfor; ?>
            </tr>
        <?php endforeach; ?>
        </table>
    </body>
</html>