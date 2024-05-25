<?php
require_once 'connection.php';
////////////////////////////////
$sql1="DROP PROCEDURE IF EXISTS deleteFlori";
$sql2="CREATE PROCEDURE deleteFlori(
IN strNume varchar(30)
)
    BEGIN
    DELETE FROM flori WHERE nume=strNume;
    END;";
$stmt1=$con->prepare($sql1);
$stmt2=$con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();
////////////////////////////////
$sql3="DROP TRIGGER IF EXISTS after_delete";
$sql4="CREATE TRIGGER after_delete AFTER DELETE ON flori FOR EACH ROW
BEGIN
INSERT INTO flower_update(nume, status,edtime) VALUES(OLD.nume, 'DELETED', NOW());
END;";
$stmt3=$con->prepare($sql3);
$stmt4=$con->prepare($sql4);
$stmt3->execute();
$stmt4->execute();
////////////////////////////////
$nume='violete';
$sql="CALL deleteFLori('{$nume}')";
$q=$con->query($sql);
if($q)
    echo "Data was successfully deleted";
?>
<br/>
<a href="index.php">Back</a>
