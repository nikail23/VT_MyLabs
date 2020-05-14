<?php
    $columnsNamesArray = getColumnNamesArray($tableName, $databaseLink);
    $columnsTypesArray = getColumnTypesArray($tableName, $columnsNamesArray, $databaseLink);

    if (isset($_POST['selectAtribute'])) {
        $selectAtribute = $_POST['selectAtribute'];
        $atributeType = getAtributeType($columnsNamesArray, $columnsTypesArray, $selectAtribute); 
    }
?>
<!DOCTYPE html>
<html>
    <body>
        <h2>
            Удаление записи из таблицы <?=$tableName?>
        </h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <?php 
                showSelectAtributeForm($columnsNamesArray); 
                if (isset($selectAtribute) && isset($atributeType)) {
                    showAtributeValueForm($selectAtribute, $atributeType);  
                    if (isset($_POST['atributeValue']) && $_POST['atributeValue'] != '') {
                        $atributeValue = $_POST['atributeValue'];
                        $query = getDeleteQueryString($tableName, $selectAtribute, $atributeValue);
                        sendQueryAndShowState($query, $databaseLink);
                    }                 
                }
            ?>
            <input type="hidden" name="actionSelect" value="<?=htmlspecialchars(ActionList[1])?>">
            <input type="hidden" name="tableSelect" value="<?=htmlspecialchars($tableName)?>">
            <p><input type="submit"></p>
        </form>
    </body>
</html>