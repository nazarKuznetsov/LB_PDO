<?php
include("connect.php");
$shiftWard = $_GET["shiftWard"];

    try 
    {

        $sqlSelect = "SELECT shift, ward.name, nurse.name,  date FROM nurse, ward, nurse_ward 
        WHERE shift =:shiftWard AND id_nurse=fid_nurse AND id_ward=fid_ward";
       
        $sth = $dbh->prepare($sqlSelect);
        $sth->bindValue(":shiftWard",$shiftWard);
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_NUM);
        
        echo "<table border = '1'>";
        echo "<thead><tr><th>Shift</th><th>Ward</th><th>Name</th><th>Date</th></tr></thead>";
        echo "<tbody>";
        foreach($res as $row)
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";



    }
    catch(PDOException $ex)
    {
        echo $ex->GetMessage();
    }
    $dbh = null;
?>