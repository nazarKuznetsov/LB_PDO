<?php
include("connect.php");
$nurseName = $_GET["nurseName"];

    try 
    {

        $sqlSelect = "SELECT nurse.name, ward.name, department, shift FROM nurse, ward, nurse_ward 
        WHERE nurse.name =:nurseName AND id_nurse=fid_nurse AND id_ward=fid_ward";
       
        $sth = $dbh->prepare($sqlSelect);
        $sth->bindValue(":nurseName",$nurseName);
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_NUM);
        
        echo "<table border = '1'>";
        echo "<thead><tr><th>Name</th><th>Ward</th><th>Department</th><th>Shift</th></tr></thead>";
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