<?php
require_once 'connection.php';
//////////////////////////////
$sql1="DROP PROCEDURE IF EXISTS GetFlori";
$sql2="CREATE PROCEDURE GetFlori()
    BEGIN
    SELECT * FROM flori;
    END;";
$stm1=$con->prepare($sql1);
$stm2=$con->prepare($sql2);
$stm1->execute();
$stm2->execute();
//////////////////////////////
$sql='CALL GetFlori()';
$q=$con->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
?>
<table>
    <tr>
        <th>Nume</th>
        <th>Culoare</th>
        <th>Marime</th>
        <th>Pret</th>
    </tr>
    <?php while ($res=$q->fetch()): ?>
    <tr>
        <td><?php echo $res['nume']; ?></td>
        <td><?php echo $res['culoare']; ?></td>
        <td><?php echo $res['marime']; ?></td>
        <td><?php echo $res['pret']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>
<br/><br/>
<a href="insert.php">Insert data</a>
<br/><br/>
<a href="update.php">Update data</a>
<br/><br/>
<a href="delete.php">Delete data</a>
<br/><br/>
<a href="view.php">View data</a>