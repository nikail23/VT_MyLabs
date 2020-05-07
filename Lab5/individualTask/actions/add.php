<?php    
    $columnsNamesArray = getColumnNamesArray($tableName, $databaseLink);
    $columnsTypesArray = getColumnTypesArray($tableName, $columnsNamesArray, $databaseLink);
?>
<!DOCTYPE html>
<html>
    <body>
        <h2>
            Добавление записи в таблицу <?=$tableName?>
        </h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <?php showAddRecordForm($columnsNamesArray, $columnsTypesArray); ?>
            <input type="hidden" name="actionSelect" value="<?=htmlspecialchars(ActionList[0])?>">
            <input type="hidden" name="tableSelect" value="<?=htmlspecialchars($tableName)?>">
            <p><input type="submit"></p>
        </form>
    </body>
</html>
<?php
    if (checkPostParametersByArray($columnsNamesArray)) {
        $parametersList = getRecordParametersValueArray($columnsNamesArray);
        $query = getInsertQueryString($tableName, $columnsNamesArray, $parametersList);
        sendQueryAndShowState($query, $databaseLink);
    }
?>