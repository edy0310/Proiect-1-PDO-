<?php
require_once 'connection.php';
///////////////////////////////
$sql1="DROP PROCEDURE IF EXISTS insertFlori";
$sql2="CREATE PROCEDURE insertFlori(
IN strNume varchar(30),
IN strCuloare varchar(30),
IN strMarime varchar(30),
IN intPret int
)
    BEGIN
    INSERT INTO flori
    (nume, culoare, marime, pret)
    VALUES (strNume, strCuloare, strMarime, intPret);
    END;";
$stmt1=$con->prepare($sql1);
$stmt2=$con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();
///////////////////////////////
$sql3="DROP TRIGGER IF EXISTS BInsertTrigger";
$sql4="CREATE TRIGGER BInsertTrigger BEFORE INSERT ON flori FOR EACH ROW
BEGIN
INSERT INTO flower_update(nume, status,edtime) VALUES(NEW.nume, 'INSERTED', NOW());
END;";
$stmt3=$con->prepare($sql3);
$stmt4=$con->prepare($sql4);
$stmt3->execute();
$stmt4->execute();
///////////////////////////////
$nume='violete';
$culoare='violet';
$marime='mici';
$pret='1';
$sql="CALL insertFlori('{$nume}', '{$culoare}','{$marime}','{$pret}')";
$q=$con->query($sql);
if($q)
    echo "Data was successfully inserted!";
?>
<br/>
<a href="index.php">Back</a>