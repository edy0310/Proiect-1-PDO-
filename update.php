<?php
require_once 'connection.php';

$nume = 'violete';
$culoare = 'roz';
$marime = 'medii';
$pret = '2';
$sql = "CALL updateFlori('{$nume}', '{$culoare}', '{$marime}', '{$pret}')";
$q = $con->query($sql);
if ($q) {
    echo "Data was successfully updated!";
}
?>
<br/>
<a href="index.php">Back</a>
