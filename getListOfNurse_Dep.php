<?php
include("connect.php");

$departmentName = $_GET["departmentName"];

    try 
    {

        $sqlSelect = "SELECT name, department, shift, date FROM nurse WHERE department =:departmentName";
       
        $sth = $dbh->prepare($sqlSelect);
        $sth->bindValue(":departmentName",$departmentName);
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_NUM);
        
        echo "<table border = '1'>";
        echo "<thead><tr><th>Name</th><th>Department</th><th>Shift</th><th>Date</th></tr></thead>";
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