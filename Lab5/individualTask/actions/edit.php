<?php
    $columnsNamesArray = getColumnNamesArray($tableName, $databaseLink);
    $columnsTypesArray = getColumnTypesArray($tableName, $columnsNamesArray, $databaseLink);

    if (isset($_POST['selectAtribute'])) {
        $selectAtribute = $_POST['selectAtribute'];
        $atributeType = getAtributeType($columnsNamesArray, $columnsTypesArray, $selectAtribute); 
    }
?>
<html>
    <body>
        <h2>
            Ихменение записи в таблице <?=$tableName?>
        </h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <?php 
                showSelectAtributeForm($columnsNamesArray); 

                if (isset($selectAtribute) && isset($atributeType)) {
                    showAtributeValueForm($selectAtribute, $atributeType); 

                    if (isset($_POST['atributeValue']) && $_POST['atributeValue'] != '') {
                        $atributeValue = $_POST['atributeValue'];
                        $selectRecordsQuery = getSelectQueryString($tableName, $selectAtribute, $atributeValue);
                        $selectRecordsResults = mysqli_query($databaseLink, $selectRecordsQuery);

                        if (mysqli_num_rows($selectRecordsResults)) {
                            $oldParametersValueArray = getOldParametersValueArray($columnsNamesArray, $selectRecordsResults);
                            showEditRecordForm($columnsNamesArray, $columnsTypesArray, $oldParametersValueArray);
                            
                            if (checkPostParametersByArray($columnsNamesArray)) {
                                $parametersValueArray = getRecordParametersValueArray($columnsNamesArray);
                                $updateRecordQuery = getUpdateQueryString($tableName, $columnsNamesArray, $parametersValueArray, $oldParametersValueArray);
                                sendQueryAndShowState($updateRecordQuery, $databaseLink);
                            } 
                        }
                    }
                }
            ?>        
            <input type="hidden" name="actionSelect" value="<?=htmlspecialchars(ActionList[2])?>">
            <input type="hidden" name="tableSelect" value="<?=htmlspecialchars($tableName)?>">
            <p><input type="submit"></p>
        </form>
    </body>
</html>