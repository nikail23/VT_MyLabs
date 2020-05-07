<?php
    include 'consts.php';
    include 'functions.php';
    
    require 'database_connect.php';

    $tablesList = getTablesNamesArray($databaseLink, Database);
    $tablesListCheck = count($tablesList) != 0 ? true : false;

    require 'database_close.php';
?>
<!DOCTYPE html>
<html>  
    <head>
        <title>
            Лабораторная 5. Индивидуальное задание. Вариант 1.
        </title>
    </head>
    <body>
        <form action="actions_handlers.php" method="post">
            <?php selectTableAndAction($tablesList, $tablesListCheck); ?>
            <p><input type="submit"></p>
        </form>
    </body>
</html>