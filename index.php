<!-- "Варіант 3" -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurses</title>
</head>
<body>
    <h2>Перелік палат, у яких чергує обрана медсестра</h2>
    <form action="getListOfWards.php" metod="get">
        <select name="nurseName" id="nurseName">
    <?php
    include("connect.php");

    try {
         foreach($dbh->query("SELECT DISTINCT name FROM nurse") as $row){
            echo "<option value=$row[0]>$row[0]</option>";
        }
    }
    catch(PDOException $ex){
        echo $ex->GetMessage();
    }
    ?>
    </select>
        <input type="submit" value="Результат">
    </form> 
    
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------->
   
    <h2>Mедсестри обраного відділення</h2>
    <form action="getListOfNurse_Dep.php" metod="get">
        <select name="departmentName" id="departmentName">
    <?php
    include("connect.php");

    try {
         foreach($dbh->query("SELECT DISTINCT department FROM nurse") as $row){
            echo "<option value=$row[0]>$row[0]</option>";
        }
    }
    catch(PDOException $ex){
        echo $ex->GetMessage();
    }
    ?>
    </select>
        <input type="submit" value="Результат">
    </form>


<!---------------------------------------------------------------------------------------------------------------------------->

<h2>Чергування (у будь-яких палатах) у зазначену зміну</h2>
    <form action="getListOfShift.php" metod="get">
        <select name="shiftWard" id="shiftWard">
    <?php
    include("connect.php");

    try {
         foreach($dbh->query("SELECT DISTINCT shift FROM nurse") as $row){
            echo "<option value=$row[0]>$row[0]</option>";
        }
    }
    catch(PDOException $ex){
        echo $ex->GetMessage();
    }
    ?>
    </select>
        <input type="submit" value="Результат">
    </form>
</body>
</html>