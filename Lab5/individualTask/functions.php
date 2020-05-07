<?php 

    /* ******** ПОЛУЧЕНИЕ РАЗЛИЧНЫХ СТРОК ******** */

    function getErrorString($databaseLink) {
        return "Ошибка: ".mysqli_error($databaseLink);
    }

    function getTablesQueryString(string $databaseName) {
        return "SHOW TABLES FROM $databaseName";
    }

    function getUpdateQueryFirstSubstring($columnsNamesList, $parametersArray) {
        $firstSubstring = '';
        for ($i = 0; $i < count($columnsNamesList); $i++) {
            if ($i != count($columnsNamesList) - 1) {
                $firstSubstring = $firstSubstring.$columnsNamesList[$i]." = '".$parametersArray[$i]."', ";
            }
            else {
                $firstSubstring = $firstSubstring.$columnsNamesList[$i]." = '".$parametersArray[$i]."' ";
            }
        }
        return $firstSubstring;
    }

    function getUpdateQuerySecondSubstring($columnsNamesList, $oldParametersArray) {
        $secondSubstring = '';
        for ($i = 0; $i < count($columnsNamesList); $i++) {
            if ($i != count($columnsNamesList) - 1) {
                $secondSubstring = $secondSubstring.$columnsNamesList[$i]." = '".$oldParametersArray[$i]."' AND ";
            }
            else {
                $secondSubstring = $secondSubstring.$columnsNamesList[$i]." = '".$oldParametersArray[$i]."' ";
            }
        }
        return $secondSubstring;
    }

    function getUpdateQueryString(string $table, array $columnsNamesList, array $parametersArray, array $oldParametersArray) {
        $updateQueryFirstSubstring = getUpdateQueryFirstSubstring($columnsNamesList, $parametersArray);
        $updateQuerySecondSubstring = getUpdateQuerySecondSubstring($columnsNamesList, $oldParametersArray);
        return "UPDATE $table SET $updateQueryFirstSubstring WHERE $updateQuerySecondSubstring;";
    }

    function getDeleteQueryString(string $tableName, string $atributeName, string $atributeValue) {
        return "DELETE FROM $tableName WHERE $atributeName = '$atributeValue';";
    }

    function getSelectQueryString(string $table, string $selectAtribute, string $atributeValue) {
        return "SELECT * FROM $table WHERE $selectAtribute = '$atributeValue';";
    }

    function getAtributesNamesString(array $atributesNamesArray) {
        $atributesNamesString = "(";
        foreach ($atributesNamesArray as $index => $atributeName) {
            if ($index != count($atributesNamesArray) - 1) {
                $atributesNamesString = $atributesNamesString.$atributeName.", ";
            }
            else {
                $atributesNamesString = $atributesNamesString.$atributeName.")";                
            }
        }
        return $atributesNamesString;
    }

    function getAtributesValueString(array $atributesValueArray) {
        $atributesValueString = "(";
        foreach ($atributesValueArray as $index => $atributeValue) {
            if ($index != count($atributesValueArray) - 1) {
                $atributesValueString = $atributesValueString."'$atributeValue', ";
            }
            else {
                $atributesValueString = $atributesValueString."'$atributeValue')";                
            }
        }
        return $atributesValueString;
    }

    function getInsertQueryString(string $tableName, array $atributesNameArray, array $atributesValueArray) {
        $atributesNamesString = getAtributesNamesString($atributesNameArray);
        $atributesValuesString = getAtributesValueString($atributesValueArray);
        return "INSERT INTO `$tableName` $atributesNamesString VALUES $atributesValuesString;";
    }

    function getColumnNamesQueryString(string $tableName) {
        return "SHOW COLUMNS FROM $tableName";
    }

    function getTableSelectQueryString(string $tableName) {
        return "SELECT * FROM $tableName";
    }

    /* ******** ПОЛУЧЕНИЕ РАЗЛИЧНЫХ МАССИВОВ ******** */

    function getTablesNamesArray(mysqli $databaseLink, string $databaseName) {
        $tableNamesQueryString = getTablesQueryString($databaseName);
        $tableNamesQueryResult = mysqli_query($databaseLink, $tableNamesQueryString) or die(getErrorString($databaseLink));
        $tableNamesArray = array();
        while ($row = mysqli_fetch_row($tableNamesQueryResult)) {
            array_push($tableNamesArray, $row[0]);
        }
        return $tableNamesArray;
    }

    function getColumnNamesArray(string $tableName, mysqli $databaseLink) {
        $columnNamesQueryString = getColumnNamesQueryString($tableName);
        $columnsQueryResult = mysqli_query($databaseLink, $columnNamesQueryString) or die(getErrorString($databaseLink));
        $columnNamesArray = array();
        while ($i = $columnsQueryResult->fetch_assoc()) {
            array_push($columnNamesArray, $i["Field"]);
        }
        return $columnNamesArray;
    }

    function getRecordParametersValueArray($parametersNames) {
        $recordParametersValueArray = array();
        foreach ($parametersNames as $parameterName) {
            if (isset($_POST[$parameterName])) {
                array_push($recordParametersValueArray, $_POST[$parameterName]);
            }
        }
        return $recordParametersValueArray;
    }

    function getColumnTypesArray(string $tableName, array $columnsNamesList, mysqli $databaseLink) {
        $columnTypesArray = array();
        foreach ($columnsNamesList as $columnName) {
            $columnTypesQueryString = "SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$tableName' AND column_name = '$columnName';";
            $columnsQueryResult = mysqli_query($databaseLink, $columnTypesQueryString);
            $row = mysqli_fetch_row($columnsQueryResult);
            array_push($columnTypesArray, $row[0]);
        }
        return $columnTypesArray;
    }

    /* ******** ПРОЧИЕ ФУНКЦИИ ******** */

    function showArrayElementsAsSelect(array $array, string $selectName) {
        echo "<select name=\"$selectName\">";
        foreach ($array as $value) {
            echo "<option value=\"$value\"> $value </option>";
        }
        echo "</select>";
    }

    function selectTableAndAction(array $tablesList, bool $tablesListCheck) {
        if ($tablesListCheck)
        {
            echo "<h2> Выберите таблицу и соответствующее действие: </h2>";
            showArrayElementsAsSelect($tablesList, "tableSelect");
            showArrayElementsAsSelect(ActionList, "actionSelect");
        }
        else {
            echo "База данных не имеет таблиц!";
        }
    }

    function showDatabaseTable($tableName, $databaseLink) {
        $query = getColumnNamesQueryString($tableName);
        $columnsQueryResult = mysqli_query($databaseLink, $query) or die(getErrorString($databaseLink)); 
        $query = getTableSelectQueryString($tableName);
        $recordsQueryResult = mysqli_query($databaseLink, $query) or die(getErrorString($databaseLink)); 
        if ($recordsQueryResult && $columnsQueryResult) {
            echo "<table> <h2>$tableName</h2>";
            $tableColumnsList = array();
            while ($i = $columnsQueryResult->fetch_assoc()) {
                array_push($tableColumnsList, $i["Field"]);
                echo '<th>'.$i["Field"].'</th>';
            }
            while ($row = mysqli_fetch_array($recordsQueryResult)) {
                echo "<tr>";
                foreach ($tableColumnsList as $tableColumn) {
                    echo "<td>$row[$tableColumn]</td>";
                }
                echo "</tr>";
            }
        }
    }

    function showAddRecordForm($columnsNamesList, $columnTypesList) {
        $i = 0;
        foreach ($columnsNamesList as $columnName)  {
            $columnType = $columnTypesList[$i];
            switch ($columnType) {
                case "date":
                    echo $columnName."<input type=\"date\" name=\"$columnName\">".NewLine;
                break;
                case "int":
                    echo $columnName."<input type=\"number\" name=\"$columnName\">".NewLine;
                break;
                default:
                    echo $columnName."<input type=\"text\" name=\"$columnName\">".NewLine;
            }
            $i++;
        }
    }

    function showSelectAtributeForm($columnsNamesList) {
        if (!isset($_POST['selectAtribute'])) {
            echo "<select name=\"selectAtribute\">";
            foreach ($columnsNamesList as $columnName)  {
                    echo "<option value=\"$columnName\"> $columnName </option>";
            }
            echo "</select>".NewLine;
        } 
        else {
            $selectAtribute = $_POST['selectAtribute'];
            echo "<select name=\"selectAtribute\">";
            echo "<option value=\"".$selectAtribute."\"> $selectAtribute </option>";
            echo "</select>".NewLine;
        }
    }

    function getAtributeType(array $columnsNamesArray, array $columnsTypesArray, string $selectAtribute) {
        $atributeType = '';
        for ($i = 0; $i < count($columnsNamesArray); $i++) {
            if ($columnsNamesArray[$i] == $selectAtribute) {
                $atributeType = $columnsTypesArray[$i];
                break;
            }
        }
        return $atributeType;
    }

    function showAtributeValueForm(string $selectAtribute, string $atributeType) {
        echo "Выбранный атрибут: $selectAtribute; Тип: $atributeType;".NewLine;
        echo "<h2> Введите значение атрибута: </h2>".NewLine;
        if (!isset($_POST['atributeValue'])) {
            switch ($atributeType) {
                case 'int':
                    echo '<input type="number" name="atributeValue">'.NewLine;
                break;
                case 'date':
                    echo '<input type="date" name="atributeValue">'.NewLine;
                break;
                default:
                    echo '<input type="text" name="atributeValue">'.NewLine;
            }
        }
        else {
            switch ($atributeType) {
                case 'int':
                    echo '<input type="number" name="atributeValue" value="'.$_POST['atributeValue'].'" readonly>'.NewLine;
                break;
                case 'date':
                    echo '<input type="date" name="atributeValue" value="'.$_POST['atributeValue'].'" readonly>'.NewLine;
                break;
                default:
                    echo '<input type="text" name="atributeValue" value="'.$_POST['atributeValue'].'" readonly>'.NewLine;
            }
        }
    }

    function checkPostParametersByArray($parametersArray) {
        $check = true;
        foreach ($parametersArray as $parameter) {
            if (!isset($_POST[$parameter])) {
                $check = false;
                break;
            }
        }
        return $check;
    }

    function getOldParametersValueArray(array $columnsNamesList, $recordsQueryResult) {
        $oldParametersValueArray = array();
        $row = mysqli_fetch_array($recordsQueryResult);
        foreach ($columnsNamesList as $columnName)  {
            array_push($oldParametersValueArray, $row[$columnName]);
        }
        return $oldParametersValueArray;
    }

    function showEditRecordForm(array $columnsNamesList, array $columnsTypesList, array $oldParametersValueArray) {
        $i = 0;
        echo "<h2> Изменение: </h2>".NewLine;
        foreach ($columnsNamesList as $columnName)  {
            $columnType = $columnsTypesList[$i];
            switch ($columnType) {
                case "date":
                    echo $columnName."<input type=\"date\" name=\"$columnName\" value=\"".$oldParametersValueArray[$i]."\">".NewLine;
                break;
                case "int":
                    echo $columnName."<input type=\"number\" name=\"$columnName\" value=\"".$oldParametersValueArray[$i]."\">".NewLine;
                break;
                default:
                    echo $columnName."<input type=\"text\" name=\"$columnName\" value=\"".$oldParametersValueArray[$i]."\">".NewLine;
            }
            $i++;
        }
    }

    function sendQueryAndShowState(string $query, mysqli $databaseLink) {
        echo "Запрос: $query".NewLine;
        if (mysqli_query($databaseLink, $query)) {
            echo "Успех".NewLine;
        }
        else {
            echo "Провал".NewLine;
            die(getErrorString($databaseLink));
        }
    }
?>