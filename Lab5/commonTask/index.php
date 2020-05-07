<?php
    const Host = 'localhost'; 
    const Database = 'common_task'; 
    const User = 'root'; 
    const Password = 'thvjkjdbx'; 

    function getTablesListQuery(string $databaseName) {
        return "SHOW TABLES FROM ".$databaseName;
    }

    function getShowColumnsQuery(string $tableName) {
        return "SHOW COLUMNS FROM ".$tableName;
    }

    function getTableSelectQuery(string $tableName) {
        return "SELECT * FROM ".$tableName;
    }

    function getErrorString() {
        return "Ошибка: ".mysqli_error($databasedatabaseLink);
    }

    function getDatabaseTablesList(mysqli $databasedatabaseLink, string $databaseName) {
        $query = getTablesListQuery($databaseName);
        $buffer = mysqli_query($databasedatabaseLink, $query) or die(getErrorString());
        $result = array();
        while ($row = mysqli_fetch_row($buffer)) {
            array_push($result, $row[0]);
        }
        return $result;
    }

    function showDatabaseTable($tableName, $databaseLink) {
        $query = getShowColumnsQuery($tableName);
        $columnsResult = mysqli_query($databaseLink, $query) or die(getErrorString()); 
        $query = getTableSelectQuery($tableName);
        $recordsResult = mysqli_query($databaseLink, $query) or die(getErrorString()); 
        if ($recordsResult && $columnsResult) {
            echo "<table>
            <h2>".$tableName."</h2>";
            $tableColumnsList = array();
            while($i = $columnsResult->fetch_assoc()) {
                array_push($tableColumnsList, $i["Field"]);
                echo '<th>'.$i["Field"].'</th>';
            }
            while($row = mysqli_fetch_array($recordsResult)) {
                echo "<tr>";
                foreach ($tableColumnsList as $tableColumn) {
                    echo "<td>".$row[$tableColumn]."</td>";
                }
                echo "</tr>";
            }
        }
    }

    require 'database_connect.php';

    $tablesList = getDatabaseTablesList($databaseLink, Database);
    foreach ($tablesList as $tableName) {
        showDatabaseTable($tableName, $databaseLink);
    }

    require 'database_close.php';
?>
<DOCTYPE! html> 
<html>
<head>
    <title>
        Лабораторная 5. Вариант 1.
    </title>
    <link rel="stylesheet" href="css/style.css">
</head>
</html>
